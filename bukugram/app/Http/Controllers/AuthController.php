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
        ], [
            'name.required' => 'Username harus diisi',
            'name.min' => 'Username minimal 5 karakter',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $userCount = User::count();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $userCount === 0 ? 'admin' : 'user';
        $user->save();

        return redirect('/')->with('success', 'Register Berhasil✅');
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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            return redirect()->intended('/')->with('success', 'Login Berhasil, Selamat datang ' . $user->name . '!');
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
            return view('profile.tambah');
        }
    }

    public function createProfile(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required',
        ], [
            'age.required' => 'Umur harus diisi',
            'age.numeric' => 'Umur harus berupa angka',
            'address.required' => 'Alamat harus diisi',
        ]);

        $profile = new Profile;
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = Auth::id();

        $profile->save();

        return redirect('/profile')->with('success', 'Profile Berhasil Ditambahkan✅');
    }

    public function updateProfile(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable',
            'age' => 'nullable|numeric',
            'address' => 'nullable',
        ]);

        $profile = Profile::find($id);
        // Jika ada input untuk name, update name, jika tidak biarkan tetap seperti sebelumnya
        if ($request->has('name') && $request->input('name') !== null) {
            $profile->user->name = $request->input('name');
            $profile->user->save();
        }
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->save();

        return redirect('/profile')->with('success', 'Profile Berhasil Diubah✅');
    }
}
