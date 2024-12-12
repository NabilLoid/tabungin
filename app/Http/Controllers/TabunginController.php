<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite; // Import Socialite
use App\Models\User; // Import model User


class TabunginController extends Controller
{
    // Mengarahkan ke Google OAuth untuk login
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback untuk menangani data yang diterima dari Google
	

	public function callback()
	{
	    // Mengambil data pengguna dari Google
	    $userFromGoogle = Socialite::driver('google')->stateless()->user();

	    // Mencari pengguna berdasarkan ID Google
	    $userFromDb = User::where('google_id', $userFromGoogle->getId())->first();

	    // Jika pengguna belum ada di database
	    if (!$userFromDb) {
	        // Membuat pengguna baru
	        $userFromDb = new User();
	        $userFromDb->email = $userFromGoogle->getEmail();
	        $userFromDb->google_id = $userFromGoogle->getId();
	        $userFromDb->name = $userFromGoogle->getName();
	        $userFromDb->avatar = $userFromGoogle->getAvatar(); // Menyimpan URL avatar

	        // Menyimpan pengguna baru ke database
	        $userFromDb->save();

	        // Login pengguna
	        auth('web')->login($userFromDb);
	        session()->regenerate(); // Memastikan session aman
	        return redirect('/'); // Redirect setelah login
	    }

	    // Jika pengguna sudah ada, perbarui avatar dan login langsung
	    $userFromDb->avatar = $userFromGoogle->getAvatar(); // Memastikan avatar selalu diperbarui
	    $userFromDb->save(); // Simpan perubahan jika ada
	    auth('web')->login($userFromDb);
	    session()->regenerate(); // Memastikan session aman
	    return redirect('/'); // Redirect setelah login
	}

    // Logout pengguna
    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken(); // Mengganti token CSRF
        return redirect('/'); // Redirect setelah logout
    }

    public function index()
    {
       
        // Kirim data ke view
        return view('index', compact('users'));
    }
}
