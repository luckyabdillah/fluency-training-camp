<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        return view('admin.profile.edit', compact('user')); 
    }

    public function update(Request $request)
    {
        $user = User::firstWhere('id', auth()->user()->id);

        $rules = [
            'name' => 'required|max:255',
            'username' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:800',
            'destroy_photo' => 'nullable',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users,username';
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

        return redirect('/admin/profile')->with('success', 'Profile has been successfully updated');
    }
}
