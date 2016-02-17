<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    	'nama_toko', 'nama_pemilik', 'alamat', 'provinsi_id', 
    	'kabupaten_id', 'sms', 'bbm', 'line', 'instagram', 'email',
    ];
}
