<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['nama_pemilik', 'no_rekening', 'nama_bank', 'kode_bank'];
}
