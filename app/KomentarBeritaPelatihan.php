<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarBeritaPelatihan extends Model
{
    protected $table = 'komentar_berita_pelatihan';

    public $timestamps = false;

    protected $fillable = ['id_karyawan', 'id_berita_pelatihan', 'komentar'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
