<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['nama_supplier', 'kota_supplier', 'website', 'contact'];

    public function product() {
    	return $this->hasOne('App\Supplier');
    }
}
