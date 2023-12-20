<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\carts;
use App\Models\wishlists;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('pagess.login.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        
        $request->authenticate();

        $request->session()->regenerate();

        carts::where('customerId', auth()->user()->id) ;
        Wishlists::where('customerId', auth()->user()->id);

        $sessioncart = session('cart');
        $sessionWishlist = session('wishlist');

        if (isset($sessioncart)) {

            foreach ($sessioncart as $product) {
                $cartData = [
                    'productId' => $product['id'],
                    'customerId' => auth()->user()->id,
                    'quantity' => $product['quantity'],
                ];

                if (session()->has('coupon')) {
                    $cartData['couponid'] = session('coupon');
                }

                carts::create($cartData);
            }
        }


        if (isset($sessionWishlist)) {
            foreach ($sessionWishlist as $product) {
                $wishlistData = [
                    'productId' => $product['id'],
                    'customerId' => auth()->user()->id,
                ];

                Wishlists::create($wishlistData);
            }
        }

        // Clear the session wishlist
        session()->forget('wishlist');

        return redirect()->intended('/');
    }

    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
