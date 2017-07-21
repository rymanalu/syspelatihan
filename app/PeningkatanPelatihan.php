<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeningkatanPelatihan extends Model
{
    protected $table = 'peningkatan_pelatihan';

    public $timestamps = false;

    protected $fillable = ['id_pelatihan', 'id_karyawan', 'pre_test', 'post_test', 'peningkatan'];
}
