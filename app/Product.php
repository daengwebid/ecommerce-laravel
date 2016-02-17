<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['kode_produk', 'nama_produk', 'slug', 'kategori_id', 'supplier_id', 'deskripsi', 'berat', 'harga', 'stok', 'media_image_id', 'publish', 'diskon', 'harga_jual'];

    public function media_image() {
    	return $this->belongsTo('App\Media_image');
    }

    public function category() {
    	return $this->belongsTo('App\Category', 'kategori_id', 'id');
    }

    public function supplier() {
    	return $this->belongsTo('App\Supplier');
    }
}
