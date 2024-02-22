<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function foodBeverage(){
        return view('product.food-beverage');
    }
    public function babyKid(){
        return view('product.baby-kid');
    }
    public function beautyHealth(){
        return view('product.beauty-health');
    }
    public function homeCare(){
        return view('product.home-care');
    }

}
