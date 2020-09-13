<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
//    Registr
    public function getSignUp()
    {
        return view('auth.register');
    }

    public function postSignUp(Request $request)
    {
        $info = 'Registration successful.';
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|min:4|max:20',
            'password' => 'required|min:6',
        ]);
        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
        ]);
        return redirect()->route('home')->with('info', $info);
    }

//Login
    public function getSignIn()
    {
        return view('auth.login');
    }

    public function postSignIn(Request $request)
    {
        $info = 'Invalid login or password.';
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', $info);
        }
        $info = 'Successful authorization.';
        return redirect()->route('home')->with('info', $info);
    }

//    LogOut
    public function getSignOut()
    {
        Auth::logout();
        $info = 'You are logged out of registration on the site.';
        return redirect()->route('home')->with('info', $info);
    }
}
















