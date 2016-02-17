<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = ['order_id', 'kode_produk', 'nama_produk', 'qty', 'berat', 'harga'];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
}
