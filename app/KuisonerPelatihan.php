<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuisonerPelatihan extends Model
{
    protected $table = 'kuisoner_pelatihan';

    public $timestamps = false;

    protected $fillable = ['judul'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'jawaban_kuisoner_pelatihan', 'id_kuisoner_pelatihan', 'id_karyawan')->withPivot('jawaban');
    }

    public function pelatihan()
    {
        return $this->belongsToMany(Pelatihan::class, 'jawaban_kuisoner_pelatihan', 'id_kuisoner_pelatihan', 'id_pelatihan')->withPivot('jawaban');
    }
}
