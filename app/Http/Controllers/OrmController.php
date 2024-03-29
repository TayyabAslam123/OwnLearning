<?php

namespace App\Http\Controllers;
use App\Car;
use App\Brand;
use App\Hotel;
use App\Branch;
use App\Product;
use App\Color;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
        ## remove pivot option by adding in model
        $products = Product::with('colors')->get();
        $colors = Color::with('products')->get();
        // return $products;
        // return $colors;
        return ['Products'=> $products , 'Colors'=> $colors];

    }

    ## attach - deatach
    public function fun4(){

        ## MAKE PRODUCT AND COLOR THEN ATTACH THEM

        // $product = Product::create(['title'=>'mufler', 'price'=>'200']);
        // $color = Color::create(['name'=>'light blue']);
        // $product->colors()->attach($color->id);
        // $data = Product::find($product->id)->colors;
        // return $data;

        ## ATTACH MULTILPLE ENTRIES IN PIVOT TABLE
        // $product = Product::create(['title'=>'Glasses', 'price'=>'550']);
        // $product->colors()->attach([1,2]);
        // $data = Product::find($product->id)->with('colors')->first();
        // return $data;

        ## detach
        //$product = Product::where('id', 8)->first();
        //$product->colors()->detach(); //(detach all entries from pivot table)   
        // $product->colors()->detach(2); // (detach specific entries from table)
        //return $product;

        ## create and attach
        $product = Product::where('id', 9)->first();
        $product = $product->colors()->create([
         'name' => 'silver',
        ]);
        return $product;

    }

    public function fun5(){
        $y = Hotel::has('branches')->get(); // check has data in relation
        $y = Hotel::has('branches', '=', 3)->get(); // apply condition
        $y = Hotel::doesntHave('branches')->get(); // check does not have data in relation
        // 
        $y = Hotel::whereHas('branches', function (Builder $query) {
            $query->where('address', 'like', 'P%');
        })->get();
        //
        $y = Hotel::withCount('branches')->get();

        return $y;
    }

    public function fun6(){
        $y = Product::has('colors')->get(); // check has data in relation
        $y = Product::doesntHave('colors')->get(); // check has not data in relation
        $y = Product::withCount('colors')->get();

        $y = Color::whereHas('products', function (Builder $query) {
            $query->where('price', '<', 500);
        })->get();
    
        $y = Product::where('price', '<', 500)->with('colors')->get();

        return $y;
    }

    public function fun7(){
        ## Collection built in functions
        $data = Product::all()->makeHidden('price');
        $data = Product::all()->only([1, 2, 3]);
        return $data;
    }

    public function acc(){
        // $product = Product::create(['title'=>'white socks', 'price'=>'150']);
        $product = Product::all();
        return $product;
    }

    public function serial(){
        ## serialize to array
        $product = Product::with('colors')->first();
        return $product->toArray();

        ## serialize to Json
        // $products = Product::all();
        // return $products->toJson();

        ## add in model to hide in json
        //protected $hidden = ['password'];
        ## alternatively
        //protected $visible = ['first_name', 'last_name'];

        ## Hide or make attribye visible on request
        
        return $user->makeVisible('attribute')->toArray();
        return $user->makeHidden('attribute')->toArray();

        ## appending a attribute at real 

    }

    


}

