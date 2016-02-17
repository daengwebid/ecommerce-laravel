<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'invoice', 'paid_id', 'jne', 'province', 'city', 'kode_pos', 'alamat', 'catatan', 'status_order', 'catatan_status'];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function order_detail()
    {
    	return $this->hasMany('App\Order_detail');
    }
}
