<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
    
     public function boot()
     {
        View::composer('*', function ($view) {
            $cartCount = 0;  // Default value if user is not logged in
    
            if (Auth::check()) {
                // Only fetch cart count for authenticated users
                $cartItems = Cart::where('user_id', Auth::id())->get();
    
                // Sum up the quantities of all products in the cart
                $cartCount = $cartItems->sum('quantity');
            }
    
            // Share the cart count globally
            $view->with('cartCount', $cartCount);
        });
     }
}
