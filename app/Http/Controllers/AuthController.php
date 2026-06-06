<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {

            // 🔥 redirect berdasarkan role
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.kategori.index');
            } elseif (auth()->user()->role == 'petugas') {
                return redirect()->route('petugas.peminjaman.index');
            } else {
                return redirect('/'); // peminjam (nanti bisa kamu isi)
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}