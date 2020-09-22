<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //name 	price 	status 	description 	image 	variant 	sub_variant
    protected $fillable = ['name','price','qty','status','description','image','variant','sub_variant'];
    protected $hidden = ['created_at','updated_at'];
}
