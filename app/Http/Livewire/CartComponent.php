<?php

namespace App\Http\Livewire;
use  App\Models\products;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{    
    public function store($product_id,$product_name,$product_price){

        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId,$qty);

    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty=$product->qty-1;
        Cart::update($rowId,$qty);

    }

    public function deleteProduct($rowId){
        Cart::remove($rowId);
        session()->flash('success_message','item has been removed');

    }
    public function destroyCart(){
        Cart::destroy();
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
