<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\Products;
use App\Models\shippments;
use Illuminate\Http\Request;

class ShippmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $cartCount = 0;

    public function index()
    {
        $customerId = auth()->user() ? auth()->user()->id : null;
        $sessionCart = session('cart');

        if ($customerId) {
            $this->cartCount = carts::where('customerId', $customerId)->count();
        } elseif ($sessionCart) {
            $this->cartCount = count($sessionCart);
        } else {
            $this->cartCount = 0;
        }

        return view('layout.nav', ['cartCount' => $this->cartCount]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shippments  $shippments
     * @return \Illuminate\Http\Response
     */
    public function show(shippments $shippments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shippments  $shippments
     * @return \Illuminate\Http\Response
     */
    public function edit(shippments $shippments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shippments  $shippments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shippments $shippments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shippments  $shippments
     * @return \Illuminate\Http\Response
     */
    public function destroy(shippments $shippments)
    {
        //
    }
}
