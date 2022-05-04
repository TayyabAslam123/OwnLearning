<?php

namespace App\Http\Controllers;
use App\Car;
use App\Brand;
use App\Hotel;
use App\Branch;
use App\Product;
use App\Color;
use Illuminate\Http\Request;

class OrmController extends Controller
{
    ## one to one relationship
    ## between car and brand 
    public function fun1()
    {
        $x = Car::find(1)->brand->name;
        $x = Car::where('id', 1)->with('brand')->first();
        return $x;

        // $x = Brand::find(1)->car;
        // return $x;
    }

    ## one to many relationship 
    ## between hotel and branches
    public function fun2()
    {
      $y = Hotel::with('branches')->get();
      $y = Branch::with('hotel')->get();
      $y = Hotel::find(1)->branches;
      return $y;
    }

    ## many to many relationship 
    ## 
    public function fun3()
    {
        $products = Product::with('colors')->get();
        $colors = Color::with('products')->get();
        // return $products;
        // return $colors;
        return ['Products'=> $products , 'Colors'=> $colors];

    }



}
