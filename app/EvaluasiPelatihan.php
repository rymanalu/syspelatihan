<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluasiPelatihan extends Model
{
    protected $table = 'evaluasi_pelatihan';

    public $timestamps = false;

    protected $casts = [
        'default' => 'boolean',
    ];

    protected $fillable = ['id_pelatihan', 'judul', 'default'];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'penilaian_evaluasi', 'id_evaluasi_pelatihan', 'id_karyawan')->withPivot('nilai', 'id_pelatihan');
    }
}
