<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $student = auth()->user()->student;

        return view('dashboard.profile.edit', compact('user', 'student')); 
    }

    public function update(Request $request)
    {
        $user = User::firstWhere('id', auth()->user()->id);
        $student = Student::firstWhere('id', auth()->user()->student->id);

        $rules = [
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:800',
            'destroy_photo' => 'nullable',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users,username';
        }

        if ($request->email != $student->email) {
            $rules['email'] = 'required|email:rfc,dns|unique:students,email';
        }

        if ($request->phone_number != $student->phone_number) {
            $rules['phone_number'] = 'required|unique:students,phone_number';
        }

        $request->validate($rules);

        $photo = $user->photo;
        if ($request->destroy_photo) {
            $photo = null;
            if ($user->photo) {
                Storage::delete($user->photo);
            }
        } else {
            if ($request->file('photo')) {
                $photo = $request->file('photo')->store('user_photo');
                if ($user->photo) {
                    Storage::delete($user->photo);
                }
            }
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'photo' => $photo,
        ]);

        $student->update([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect('/dashboard/profile')->with('success', 'Profile has been successfully updated');
    }
}
