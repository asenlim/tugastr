<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /*
    |-----------------------------------------
    | REGISTER
    |-----------------------------------------
    */
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([ 
        'name' => 'required|string|max:100', 
        'email' => 'required|email|unique:users,email', 
        'password' => 'required|min:6|confirmed', 
        ], [
            'password.confirmed' => 'Password yang di input tidak sama',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Register berhasil, silakan login');
    }

    /*
    |-----------------------------------------
    | LOGIN
    |-----------------------------------------
    */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/'); // dashboard
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    /*
    |-----------------------------------------
    | LOGOUT
    |-----------------------------------------
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}