<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class AuthControllerFrontEnd extends Controller
{
    public function showLogin()
    {
        return view('frontend.v_login.login');
    }

    public function showSignup()
    {
        return view('frontend.v_signup.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:customer,email',
            'password' => 'required|confirmed|min:6',
            'hp' => 'required',
            'gender' => 'required',
            'umur' => 'required|integer',
            'negara' => 'required',
        ]);

        Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hp' => $request->hp,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'negara' => $request->negara,
        ]);

        return redirect()->route('frontend.v1.login')->with('success', 'Berhasil daftar!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('frontend.v1.index'));
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function dashboard()
    {
        return view('frontend.v_beranda.beranda');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('frontend.v1.login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $driver = Socialite::driver('google');

        if ($driver instanceof \Laravel\Socialite\Two\AbstractProvider) {
            $googleUser = $driver->stateless()->user();

            $user = Customer::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'nama' => $googleUser->getName(),
                    'password' => Hash::make(uniqid())
                ]
            );

            Auth::guard('customer')->login($user);
        }

        return redirect()->route('frontend.v1.index');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $driver = Socialite::driver('facebook');

        if ($driver instanceof \Laravel\Socialite\Two\AbstractProvider) {
            $fbUser = $driver->stateless()->user();

            $user = Customer::updateOrCreate(
                ['email' => $fbUser->getEmail()],
                [
                    'nama' => $fbUser->getName(),
                    'password' => Hash::make(uniqid())
                ]
            );

            Auth::guard('customer')->login($user);
        }

        return redirect()->route('frontend.v1.index');
    }
}