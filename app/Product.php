<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price'];
    protected $hidden = [
        'pivot'
    ];
    // many to many relationship
    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }

    #### Accessors ####

    ##
    public function getTitleAttribute($title){
        return strtoupper($title);
    }
    ##
    public function getPriceAttribute($price){
        $discount = $price * 0.10;
        $price = $price - $discount;
        return $price;
    }

    #### Mutators ####
    public function setPriceAttribute($price){
        // dd($price);
        $this->attributes['price'] = "Rs".$price; 
    }




}
