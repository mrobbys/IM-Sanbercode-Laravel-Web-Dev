<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $userCount = User::count();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $userCount === 0 ? 'admin' : 'user';
        $user->save();

        return redirect('/')->with('success', 'Register Berhasil');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // // Menambahkan pesan sukses dengan nama pengguna
            // $user = Auth::user();
            // session()->flash('success', 'Login Berhaisl, Selamat datang, ' . $user->name . '!');

            return redirect()->intended('/')->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
            'email' => 'Email tidak terdaftar.',
        ])->onlyInput('email');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logoutSuccess', 'Logout Berhasil');
    }


    public function getProfile()
    {
        $userAuth = Auth::user()->profile;

        $userId = Auth::id();

        $profileData = Profile::where('user_id', $userId)->first();

        if ($userAuth) {
            return view('profile.edit', ['profile' => $profileData]);
        } else {
            return view('profile.create');
        }
    }

    public function createProfile(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5'
        ]);

        $profile = new Profile;
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = Auth::id();
        $profile->save();

        return redirect('/profile')->with('success', 'Profile Berhasil Dibuat');
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'age' => 'required|numeric',
            'address' => 'required|min:5'
        ]);

        $profile = Profile::find($id);

        $profile->user->name = $request->input('name');
        $profile->user->save();
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->save();

        return redirect('/profile')->with('success', 'Profile Berhasil Diupdate');
    }
}
