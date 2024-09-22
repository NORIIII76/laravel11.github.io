<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan User model diimpor
use Illuminate\Support\Facades\Hash; // Import Hash facade untuk password hashing

class LoginController extends Controller
{
    // Metode untuk menampilkan form login
    public function showLoginForm()
    {
        return view('login'); // Pastikan nama view sesuai
    }

    // Metode untuk login
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    // Cari user berdasarkan username
    $user = User::where('username', $request->username)->first();

    // Periksa apakah user ditemukan dan password sesuai
    if ($user && Hash::check($request->password, $user->password)) {
        // Simpan sesi login, username, dan created_at
        session([
            'logged_in' => true,
            'username' => $user->username,
            'created_at' => $user->created_at // Simpan created_at dalam sesi
        ]);

        return redirect()->route('welcome');
    } else {
        // Kembali ke halaman login jika username atau password salah
        return back()->with('error', 'Username atau password salah.');
    }
}

    // Metode untuk logout
    public function logout(Request $request)
    {
        $request->session()->flush(); // Menghapus semua data sesi
        return redirect()->route('login');
    }
}

    

    
