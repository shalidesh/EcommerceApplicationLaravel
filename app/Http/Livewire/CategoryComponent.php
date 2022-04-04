<?php

namespace App\Http\Livewire;
use App\Models\Products;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{    
    public $sorting1;
    public $pagesize1;
    public $category_slug;

    use WithPagination;

    public function mount($category_slug){
        $this->sorting1='default';
        $this->pagesize1=12;
        $this->category_slug=$category_slug;
        
        


    }

    public function store($product_id,$product_name,$product_price){

        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {   
        $category=Category::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        
        if($this->sorting1=='date'){
            $products=Products::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize1);

        }
        else if($this->sorting1=='price'){
            $products=Products::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize1);


        }
        else if($this->sorting1=='price-desc'){
            $products=Products::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize1);


        }
        else {

            $products=Products::where('category_id',$category_id)->paginate($this->pagesize1);

            
        }

        $categories=Category::all();
        
        
        return view('livewire.category-component',['products' =>$products,'categories'=>$categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}
