<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            $registeredUser = User::where('email', $socialUser->getEmail())->first();

            if (!$registeredUser) {
                $user = User::create([
                    'nama' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'role' => '2',
                    'status' => 1,
                    'password' => Hash::make('default_password'),
                ]);

                Customer::create([
                    'user_id' => $user->id,
                    'google_id' => $socialUser->getId(),
                    'google_token' => $socialUser->token 
                ]);

                Auth::login($user);
            } else {
                Auth::login($registeredUser);
            }

            return redirect()->route('frontend.v1.index'); 
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan saat login dengan Google: ' . $e->getMessage());
        }
    }

public function update(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'foto'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'hp'     => 'nullable|string|max:20',
            'pos'    => 'nullable|string|max:10',
            'gender' => 'nullable|string|max:20',
            'umur'   => 'nullable|integer',
            'negara' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
        ]);

        $data = $request->except(['foto', '_token', '_method']);

        if ($request->hasFile('foto')) {
            if (!Storage::disk('public')->exists('profiles')) {
                Storage::disk('public')->makeDirectory('profiles');
            }
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }
            $data['foto'] = $request->file('foto')->store('profiles', 'public');
        }
        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}