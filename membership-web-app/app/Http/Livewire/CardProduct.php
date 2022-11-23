<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CardProduct extends Component
{
    public $product;
    public function render()
    {
        $this->product = Product::all();
        return view('livewire.card-product');
    }

    public function create()
    {
        return redirect()->to('/checkout');
    }
}
