<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\MerchantUser;

class MerchantController extends Controller
{
    // Menampilkan form registrasi merchant
    public function showRegistrationForm()
    {
        return view('merchant.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data ke dalam database
        Merchant::create([
            'nama_perusahaan' => $validatedData['nama_perusahaan'],
            'alamat' => $validatedData['alamat'],
            'kontak' => $validatedData['kontak'],
            'deskripsi' => $validatedData['deskripsi'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('merchant.login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan form login merchant
    public function showLoginForm()
    {
        return view('merchant.login');
    }

    // Menangani login merchant
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('merchant.dashboard');
        }

        return redirect()->route('merchant.login.form')->withErrors(['login' => 'Login gagal, periksa username dan password Anda.']);
    }

    // Menampilkan halaman dashboard merchant
    public function dashboard()
    {
        return view('merchant.dashboard');
    }

    // Menampilkan form untuk mengedit profil merchant
    public function editProfile()
    {
        $merchant = Auth::user()->merchant;
        return view('merchant.edit-profile', compact('merchant'));
    }

    // Menangani pembaruan profil merchant
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $merchant = Auth::user()->merchant;
        $merchant->update($validated);

        return redirect()->route('merchant.dashboard');
    }
}
