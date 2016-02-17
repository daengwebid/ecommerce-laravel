<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nama_lengkap', 'no_hp', 'email', 'pinbbm'];

    public function order()
    {
    	return $this->hasMany('App\Order');
    }

    public function order_detail()
    {
    	return $this->hasManyThrough('App\Order_detail', 'App\Order');
    }
}
