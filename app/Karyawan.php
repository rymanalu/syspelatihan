<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    public $timestamps = false;

    protected $hidden = ['password', 'remember_token'];

    protected $fillable = ['id_unit_kerja', 'id_peran', 'nik', 'nama', 'username', 'password', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir'];

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja');
    }

    public function peran()
    {
        return $this->belongsTo(Peran::class, 'id_peran');
    }

    public function pengusulan()
    {
        return $this->hasMany(Pengusulan::class, 'id_karyawan');
    }

    public function kuisonerPelatihan()
    {
        return $this->belongsToMany(KuisonerPelatihan::class, 'jawaban_kuisoner_pelatihan', 'id_karyawan', 'id_kuisoner_pelatihan')->withPivot('jawaban');
    }

    public function jawabanKuisonerPelatihan()
    {
        return $this->belongsToMany(Pelatihan::class, 'jawaban_kuisoner_pelatihan', 'id_karyawan', 'id_pelatihan')->withPivot('jawaban');
    }

    public function pelatihan()
    {
        return $this->belongsToMany(Pelatihan::class, 'karyawan_pelatihan', 'id_karyawan', 'id_pelatihan');
    }

    public function evaluasi()
    {
        return $this->belongsToMany(EvaluasiPelatihan::class, 'penilaian_evaluasi', 'id_karyawan', 'id_evaluasi_pelatihan');
    }
}
