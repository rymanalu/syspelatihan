<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPelatihan extends Model
{
    protected $table = 'kategori_pelatihan';

    public $timestamps = false;

    protected $fillable = ['nama'];
}
