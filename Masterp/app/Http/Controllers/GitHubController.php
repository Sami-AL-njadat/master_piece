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

class GitHubController extends Controller
{
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }



    public function handleGitHubCallback(): RedirectResponse
    {
        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'GitHub login failed. Please try again.');
        }
        $user = User::where('github_id', $githubUser->getId())->first();
        $githubUsername = $githubUser->getNickname() ?? 'GitHubUser';
        // dd($githubUser);

        if (!$user) {
            $githubUser = Socialite::driver('github')->user();

            $existingUser = User::where('email', $githubUser->email)->first();

            if ($existingUser) {
                $existingUser->update(['github_id' => $githubUser->getId()]);
                Auth::login($existingUser);

                Session::flash('info', 'Hello again' . ' '  . $githubUsername);
            } else {
                $newUser = User::create([
                    'name' => $githubUsername,
                    'email' => $githubUser->email,
                    'github_id' => $githubUser->getId()
                ]);
                Auth::login($newUser);

                Session::flash('success', 'Welcome,To MASHTAL');
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
