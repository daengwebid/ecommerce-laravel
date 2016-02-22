<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    protected $fillable = ['invoice', 'nama_pemilik', 'bank_from', 'bank_to', 'jumlah', 'bukti_transfer'];
}
