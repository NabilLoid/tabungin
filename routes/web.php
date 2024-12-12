<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunginController;
use App\Http\Controllers\BookController;


// Route untuk menampilkan form
Route::get('/', [BookController::class, 'index'])->name('index');

Route::get('/form', function () {
    return view('data_user'); // Ganti 'halaman_tujuan' dengan nama view yang diinginkan
});

// Route untuk menampilkan data book dengan TabunginController
Route::get('/books-data', [TabunginController::class, 'bookData']);


// Route untuk menyimpan data book
Route::post('/books', [BookController::class, 'store'])->name('books.store');

Route::get('/redirect', [TabunginController::class, 'redirect'])->name('redirect')->middleware('guest');
Route::get('/callback', [TabunginController::class, 'callback'])->name('callback')->middleware('guest');
Route::post('/logout', [TabunginController::class, 'logout'])->name('logout')->middleware('auth');

