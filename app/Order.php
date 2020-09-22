<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_user','total_price','name_customer','id_table','status_order','no_hp','kecamatan','kabupaten','alamat'];
    
}
