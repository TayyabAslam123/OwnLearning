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
    ### update attribute structure while getting value ###

    public function getTitleAttribute($title){
        return strtoupper($title);
    }

    public function getPriceAttribute($price){
        // $price = (int)$price;
        // $discount = $price * 0.10;
        // $price = $price - $discount;
        return 'RS '. $price;
    }

    public function getCreatedAtAttribute($id){
        return date('d-M-Y (D)') ;
    }

    #### Mutators ####
    ### update attribute structure while saving value ,  just before saving ### 
    public function setPriceAttribute($price){
        $this->attributes['price'] = $price + 10; 
    }

    // public function setIdAttribute($id){
    //      $this->attributes['id'] = '1'; 
    // }




}
