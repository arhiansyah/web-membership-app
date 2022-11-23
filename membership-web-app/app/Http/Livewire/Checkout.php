<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Checkout extends Component
{
    public $productID, $product;

    public function render()
    {
        $this->product = Product::all();
        $this->productID = Product::find($this->productID);
        return view('livewire.checkout');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
