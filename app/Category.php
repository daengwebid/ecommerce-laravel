<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori', 'deskripsi', 'slug'];

    public function product() {
    	return $this->hasOne('App\Product', 'id', 'kategori_id');
    }
}
