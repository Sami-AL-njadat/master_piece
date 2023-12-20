<?php

namespace App\Http\Controllers;

use App\Models\wishlists;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;

class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stores($id)
    {
        // Find the product by its ID
        $product = products::find($id);


        

        if (!$product) {
            session()->flash('error', 'Product not found!');
            return redirect()->back();
        }

        if (auth()->check()) {
            // Authenticated user
            $customerId = auth()->user()->id;

            // Check if the product already exists in the wishlist
            $existingWishlist = wishlists::where('customerId', $customerId)
                ->where('productId', $product->id)
                ->first();

            if (!$existingWishlist) {
                // Product does not exist in the wishlist, so create a new record
                wishlists::create([
                    'customerId' => $customerId,
                    'productId' => $product->id,
                    // dd($product->id),
                ]);
                session()->flash('success', 'Product successfully added to your wishlist!');
            } else {
                session()->flash('info', 'Product is already in your wishlist.');
            }
        } else {
            // Guest user
            $sessionWishlist = session()->get('wishlist', []);

            if (isset($sessionWishlist[$product->id])) {
                session()->flash('info', 'Product is already in your wishlist.');
            } else {
                $sessionWishlist[$product->id] = [
 
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'shortdes' => $product->Sdescription,
                    'image' => $product->image1,
                    'price' => $product->price,
                ];

                session()->put('wishlist', $sessionWishlist);
                session()->flash('success', 'Product successfully added to your wishlist!');
            }
        }

        

        return redirect()->back();
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function show(wishlists $wishlists)
    {
        if (auth()->user()) {
            $user = auth()->user()->id;
            $products = wishlists::where('customerId', $user)->get();
            if ($products->count() >= 1) {
                foreach ($products as $product) {
                    $product->id = $product->product->id;
                    $product->price = $product->product->price;
                    $product->image = $product->product->image1;
                    $product->productName = $product->product->productName;
                }
                
            }
            // dd($products);
            return view('pagess.wishlist.wishlist', compact('products'));
        } elseif ((session('wishlist')) != null) {
            $products = session('wishlist');
        } else {
            $products = [];
        }
        return view('pagess.wishlist.wishlist', compact('products'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function edit(wishlists $wishlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request, $id)
    {
        // Find the product by its ID
        $product = products::find($id);

        if (!$product) {
            session()->flash('error', 'Product not found!');
            return redirect()->back();
        }

        if (auth()->check()) {
            // Authenticated user
            $customerId = auth()->user()->id;

            // Check if the product already exists in the wishlists
            $existingWishlist = wishlists::where('customerId', $customerId)
                ->where('productId', $product->id)
                ->first();

            if ($existingWishlist) {
                // Product already exists in the wishlists, you can implement quantity logic here
                session()->flash('info', 'Product is already in your wishlist.');
            } else {
                // Product does not exist in the wishlists, so create a new record
                wishlists::create([
                    'customerId' => $customerId,
                    'productId' => $product->id,
                ]);
                session()->flash('success', 'Product successfully added to your wishlist!');
            }
        } else {
            // Guest user
            $sessionWishlist = session()->get('wishlist', []);

            if (isset($sessionWishlist[$product->id])) {
                session()->flash('info', 'Product is already in your wishlist.');
            } else {
                $sessionWishlist[$product->id] = [
                    'id' => $product->id,
                    'productName' => $product->productName,
                    'shortdes' => $product->Sdescription,
                    'image' => $product->image1,
                    'price' => $product->price,
                ];

                session()->put('wishlist', $sessionWishlist);
                session()->flash('success', 'Product successfully added to your wishlist!');
            }
        }

        return redirect()->route('wishlist.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    
     public function destroy( $id) {
    if (auth()->check()) {
        // Authenticated user
        $customerId = auth()->user()->id;

        // Use the $id parameter directly as the product ID
        $productId = $id;
        // dd($productId);

        // Find and delete the wishlist item
        wishlists::where('customerId', $customerId)->where('productId', $productId)->delete();
        
        //    dd($productId);


        session()->flash('success', 'Product successfully removed for authenticated user!');
    } else {
        // Guest user
        $sessionWishlist = session()->get('wishlist');

        if (isset($sessionWishlist[$id])) {
            // Remove the item from the session wishlist
            unset($sessionWishlist[$id]);
            session()->put('wishlist', $sessionWishlist);

            session()->flash('success', 'Product successfully removed for guest user!');
        } else {
            session()->flash('error', 'Product not found in the wishlist!');
        }
    }

    return redirect()->back();
}
}