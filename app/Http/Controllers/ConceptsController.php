<?php

namespace App\Http\Controllers;
use App\Event\ProductCreated;
use Illuminate\Http\Request;
use App\Product;

class ConceptsController extends Controller
{
    public function createProduct(){

        $product = Product::create(['title'=>'Apple', 'price'=> 150]);
        event(new ProductCreated($product));
        echo "Product created and logged !";

    }
}
