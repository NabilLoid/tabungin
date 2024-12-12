<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Cache;


class BookController extends Controller
{
    // Menampilkan form dan data buku yang terkait dengan user yang sedang login
    public function index()
    {
        if (auth()->check()) {
            // Pengguna login, ambil data buku terkait
            $books = Book::where('user_id', auth()->user()->id)->get();

            // Hitung total jumlah dari kolom amount
            $totalAmount = Book::where('user_id', auth()->user()->id)->sum('amount');
        } else {
            // Pengguna belum login, kirimkan array kosong dan totalAmount 0
            $books = [];
            $totalAmount = 0;
        }

        // Tampilkan view dengan data buku dan total amount
        return view('index', compact('books', 'totalAmount'));
    }

    // Menyimpan data buku
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|boolean',
            'amount' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
        ]);

        // Periksa status, jika Down, ubah amount menjadi negatif
	    $amount = $request->amount;
	    if ($request->status == 0) {  // Status Down
	        $amount = -$amount;  // Ubah amount menjadi negatif
	    }

	    // Simpan data ke database
	    Book::create([
	        'status' => $request->status,
	        'amount' => $amount,
	        'user_id' => $request->user_id,
	    ]);

	    // Hapus cache untuk buku dan totalAmount
	    Cache::forget("books_user_{$request->user_id}");
	    Cache::forget("total_amount_user_{$request->user_id}");


        // Redirect ke halaman utama setelah berhasil
        return redirect()->route('index')->with('success', 'Book added successfully');
    }

    // Mengambil data buku yang terkait dengan user yang sedang login
    public function bookData()
    {
        // $books = Book::where('user_id', auth()->user()->id)->get();

        return view('index', compact('books'));
    }
}
