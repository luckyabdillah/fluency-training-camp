<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'student')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required|in:staff,admin'
        ]);

        $validatedData['uuid'] = Str::uuid()->toString();
        $validatedData['password'] = Hash::make($validatedData['uuid']);

        User::create($validatedData);

        return redirect('/admin/users')->with('success', 'New user has been successfully added, please reset the default password');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required|in:staff,admin'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users,username';
        }

        $validatedData = $request->validate($rules);

        $user->update($validatedData);

        return redirect('/admin/users')->with('success', 'User has been successfully updated');
    }

    public function resetPassword(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'new_password' => 'required|min:8|confirmed'
        ]);

        $user->update(['password' => Hash::make($validatedData['new_password'])]);

        return redirect()->back()->with('success', 'Password has been successfully reset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/admin/users')->with('success', 'User has been successfully removed!');
    }
}
