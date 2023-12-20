<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\carts;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\wishlists;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // return view('auth.register');
        return view('pagess.login.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('image')) {
            // Handle the uploaded image file (you may want to store it in a specific directory)
            $imagePath = $request->file('image')->storeAs('avatars', $user->id . '_avatar-2.png', 'public');
            $user->image = $imagePath; // Change 'avatar' to 'image'
            $user->save();
        } else {
              $defaultImagePath = '/admin/assets/img/avatar/avatar-2.png';
            $user->image = $defaultImagePath; //  
            $user->save();
        }

        Auth::login($user); // Log in the newly registered user

        $request->session()->regenerate();


        carts::where('customerId', auth()->user()->id)->delete();
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
        session()->forget('wishlist');

        event(new Registered($user));

        Auth::login($user);

        $request->session()->regenerate();
        return redirect()->intended('/');

         

    }
}
