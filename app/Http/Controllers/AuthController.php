<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginAuth(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // if ($credentials['username'] == 'admin' && $credentials['password'] == 'admin') {
        //     return redirect('/admin');
        // }

        // return redirect('/dashboard');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            User::where('id', auth()->user()->id)->update([
                'updated_at' => now()->format('Y-m-d H:i:s')
            ]);

            if (Auth::user()->role === 'student') {
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/admin');
        }
        return redirect('/login')->withInput()->with('failed', 'Wrong username/password!');
    }

    public function register() {
        return view('auth.register');
    }

    public function registerAuth(Request $request) {
        $validatedDataUser = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|confirmed',
        ]);

        $validatedDataStudent = $request->validate([
            'email' => 'required|email:rfc,dns|unique:students,email',
            'phone_number' => 'required|unique:students,phone_number',
        ]);

        $validatedDataUser['uuid'] = Str::uuid()->toString();
        $validatedDataUser['password'] = Hash::make($validatedDataUser['password']);
        $validatedDataUser['role'] = 'student';
        $user = User::create($validatedDataUser);
        
        $validatedDataStudent['uuid'] = Str::uuid()->toString();
        $validatedDataStudent['user_id'] = $user->id;
        Student::create($validatedDataStudent);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
