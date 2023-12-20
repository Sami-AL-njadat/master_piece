<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\carts;
use App\Models\wishlists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(): RedirectResponse
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'facebook login failed. Please try again.');
        }

        $user = User::where('facebook_id', $facebookUser->getId())->first();

        if (!$user) {
            $existingUser = User::where('email', $facebookUser->email)->first();

            if ($existingUser) {
                $existingUser->update(['facebook_id' => $facebookUser->getId()]);
                Auth::login($existingUser);

                Session::flash('info', 'Hello again!');
            } else {
                $newUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->getId()
                ]);
                Auth::login($newUser);

                Session::flash('success', 'Welcome to MASHTAL!');
            }

            $this->syncSessionDataWithDatabase();

            return redirect()->intended('/');
        } else {
            Auth::login($user);

            Session::flash('info', 'Welcome back!');

            $this->syncSessionDataWithDatabase();

            return redirect()->intended('/');
        }
    }

    private function syncSessionDataWithDatabase()
    {
        $sessionCart = session('cart');
        $sessionWishlist = session('wishlist');

        if (isset($sessionCart)) {
            foreach ($sessionCart as $product) {
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

                wishlists::create($wishlistData);
            }
        }

        // Clear the session wishlist
        session()->forget('wishlist');
    }
}
