<?php

namespace App\Http\Livewire;

use App\Models\wishlists;
use Livewire\Component;
 
class CounterWishlist extends Component
{
    public $wishCount = 0;

    public function render()
    {

        $customerId = auth()->user()?->id;
        $sessionWishlist = session('wishlist');
        if ($customerId) {
            $this->wishCount = wishlists::where('customerId', $customerId)->count();
        } elseif ($sessionWishlist) {
            $this->wishCount = count($sessionWishlist);
        }
        return view('livewire.counter-wishlist');
    }
}
