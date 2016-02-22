<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = ['nama', 'email', 'no_hp', 'pesan', 'status'];
}
