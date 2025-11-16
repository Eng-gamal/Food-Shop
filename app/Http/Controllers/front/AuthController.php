<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function showRegister()
    {
        return view('front.auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->intended(route('login.form'))->with('success', 'تم التسجيل وتسجيل الدخول بنجاح');
    }


    public function showLogin()
    {
        return view('front.auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        // dd($user);
        // if ($user) {
        //     Auth::login($user);
        //     return redirect()->route('home');
        // } else {
        //     return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
        // }

        if ($user) {
            session(['user' => $user]);

            return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return back()->with('error', 'بيانات الدخول غير صحيحة');
        }
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'تم تسجيل الخروج');
    }
}
