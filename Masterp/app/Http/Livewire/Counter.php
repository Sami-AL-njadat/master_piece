<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\carts;
use App\Models\Products;

 class Counter extends Component

  

 


 {
    public $cartCount = 0;

    public function render()
    {

        $customerId = auth()->user()?->id;
        $sessionCart = session('cart');
        if ($customerId) {
            $this->cartCount = carts::where('customerId', $customerId)->count();
        } elseif ($sessionCart) {
            $this->cartCount = count($sessionCart);
        }
         return view('livewire.counter');
    }

}





  
   
    