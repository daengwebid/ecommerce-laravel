<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media_image extends Model
{
    protected $fillable = ['name_photo', 'size_photo'];

    public function product() {
    	return $this->hasOne('App\Product');
    }
}
