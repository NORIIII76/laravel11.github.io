<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Menampilkan form registrasi
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password); // Enkripsi password
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
