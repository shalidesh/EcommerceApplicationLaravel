<?php

namespace App\Http\Livewire;
use App\Models\Products;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{    
    public $sorting;
    public $pagesize;

    use WithPagination;

    public function store($product_id,$product_name,$product_price){

        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function render()
    { 
        if($this->sorting=='date'){
            $products=Products::orderBy('created_at','DESC')->paginate($this->pagesize);

        }
        else if($this->sorting=='price'){
            $products=Products::orderBy('regular_price','ASC')->paginate($this->pagesize);


        }
        else if($this->sorting=='price-desc'){
            $products=Products::orderBy('regular_price','DESC')->paginate($this->pagesize);


        }
        else {

            $products=Products::paginate($this->pagesize);

            
        }

        $categories=Category::all();
        
        
        return view('livewire.shop-component',['products' =>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
