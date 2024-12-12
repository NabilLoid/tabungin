<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Book;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
{
    View::composer('*', function ($view) {
        if (auth()->check()) {
            $currentUser = auth()->user();

            // Ambil data buku dari cache atau database
            $books = Cache::remember("books_user_{$currentUser->id}", 300, function () use ($currentUser) {
                return Book::where('user_id', $currentUser->id)->get();
            });

            // Hitung total amount dari cache atau database
            $totalAmount = Cache::remember("total_amount_user_{$currentUser->id}", 300, function () use ($currentUser) {
                return Book::where('user_id', $currentUser->id)->sum('amount');
            });

            // Hitung persentase jika target ada
            $percentage = 0;  // Default 0 jika tidak ada target
            if ($currentUser->target > 0) {
                $percentage = ($totalAmount / $currentUser->target) * 100;
            }

            // Bagikan data ke view
            $view->with(compact('currentUser', 'books', 'totalAmount', 'percentage'));
        }
    });
}
}
