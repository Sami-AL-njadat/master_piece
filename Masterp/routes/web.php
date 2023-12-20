<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\checKoutController;
use App\Http\Controllers\ReviwesController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\ShippmentsController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DownloadController;
use App\Http\Livewire\SearchComponent;





Route::get('/welcome', function () {
    return view('Admin.layout.master');
});

Route::get('/adminlog', function () {
    return view('Admin.loginadmin.login');
});

Route::get('/indexs', [CategoriesController::class, 'indexCategory'])->name('indexxxs');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password/update',  [ProfileController::class, 'updatePassword'])->name('password.updated');


    Route::delete('/delete-account', [ProfileController::class, 'destroyAccount'])->name('profile.destroyAccount');
});

require __DIR__ . '/auth.php';

// Route::get('contact', [ContactController::class, 'shoow'])->name('contact');;
Route::get('/', [CategoriesController::class, 'index'])->name('home');


Route::get('contact', [ContactController::class, 'showContact'])->name('show.contact');
Route::post('store-contact', [ContactController::class, 'store'])->name('store.contact');





Route::get('/shops/{id?}', [CategoriesController::class, 'showProducts'])->name('shops');
Route::get('/shop/filterByPrice/{id?}', [CategoriesController::class, 'showProducts'])->name('shop.filterByPrice');
// Route::get('/shop/productSearch/{id?}', [CategoriesController::class, 'showProducts'])->name('shop.search');
// Route::post('/shop/productSearch/{id?}', [CategoriesController::class, 'searchProducts'])->name('shop.search.ajax');









// Route::get('/shop/{id?}', [CategoriesController::class, 'showProduct'])->name('shop');
// Route::get('/shop', [CategoriesController::class, 'showProduct'])->name('products.index');
Route::get('/shopdetai/{id?}', [CategoriesController::class, 'shopdetai'])->name('shopdetai');



Route::get('/cart', [CartsController::class, 'show'])->name('cart.index');
Route::get('cart/{id?}', [CartsController::class, 'store'])->name('cartstor');
Route::get('carttt/{id?}', [CartsController::class, 'storee'])->name('cartstoree');





// Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');
Route::get('/cart/destroy/{id}', [CartsController::class, 'destroy'])->name('cart.destroy');

// Route::get('delete/{id?}', [CartsController::class, 'destroy'])->name('cart.destroy');
Route::get('add/{id?}', [CartsController::class, 'add'])->name('cart.add');
Route::get('remove/{id?}', [CartsController::class, 'remove'])->name('cart.remove');

Route::post('/coupon', [CartsController::class, 'coupon'])->name('coupon');
// Route::get('/checkout', [CategoriesController::class, 'shows'])->name('checkouts');
Route::post('/update-shipping-cost', [CartsController::class, 'updateShippingCost'])
    ->name('updateShippingCost');


// web.php
Route::get('/checkout', [CheckoutController::class, 'checkout'])->middleware(['auth', 'verified'])->name('checkout');
Route::get('/get-shipment-cost/{cityId}', [CheckoutController::class, 'getShipmentCost'])->name('get-shipment-cost');


Route::post('/store-shipment', [CheckoutController::class, 'storeShipment'])->name('store-shipment');
Route::get('paypal/success', [CheckoutController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [CheckoutController::class, 'cancel'])->name('paypal_cancel');




Route::post('review/{id?}', [ReviwesController::class, 'store'])->name('review');


Route::get('about', [ReviwesController::class, 'show'])->name('about');


Route::get('/countcart', [ShippmentsController::class, 'index'])->name('Cartcount');



Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('Auth.Google');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'handleGoogleCallback'])->name('AuthGoogleCallBack');


Route::get('/login/github', [GitHubController::class, 'redirectToGitHub'])->name('login.github');
Route::get('/login/github/callback', [GitHubController::class, 'handleGitHubCallback'])->name('AuthGithubCallBack');




Route::get('/login/Facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.Facebook');
Route::get('/login/Facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name('AuthFacebookCallBack');




Route::get('/wishlist', [WishlistsController::class, 'show'])->name('wishlist.index');
Route::get('/wishlist/{id?}', [WishlistsController::class, 'stores'])->name('WishListStore');
//  add quistion mark in route  WishListStore
Route::get('wishlist/updated/{id?}', [WishlistsController::class, 'updated'])->name('wishlist.updated');
Route::get('delete/{id?}', [WishlistsController::class, 'destroy'])->name('wishlist.destroy');

Route::get('/events/{id?}', [EventController::class, 'showevents'])->name('events');

Route::get('/eventdetal/{id?}', [EventController::class, 'detail'])->name('eventdetal');




Route::get('download', [DownloadController::class, 'download'])->name('download');
