<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihan';

    protected $dates = [
        'tanggal_mulai', 'tanggal_selesai',
    ];

    public $timestamps = false;

    protected $casts = [
        'status' => 'boolean',
        'biaya_per_orang' => 'integer',
    ];

    protected $fillable = ['id_provider', 'nama', 'tanggal_mulai', 'tanggal_selesai', 'biaya_per_orang', 'brosur', 'catatan', 'status'];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider');
    }

    public function evaluasi()
    {
        return $this->hasMany(EvaluasiPelatihan::class, 'id_pelatihan');
    }

    public function kuisonerPelatihan()
    {
        return $this->belongsToMany(KuisonerPelatihan::class, 'jawaban_kuisoner_pelatihan', 'id_pelatihan', 'id_kuisoner_pelatihan')->withPivot('jawaban');
    }

    public function jawabanKuisonerPelatihanKaryawan()
    {
        return $this->belongsToMany(Karyawan::class, 'jawaban_kuisoner_pelatihan', 'id_pelatihan', 'id_karyawan')->withPivot('jawaban');
    }

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_pelatihan', 'id_pelatihan', 'id_karyawan');
    }

    public function biayaPerOrang()
    {
        return number_format($this->biaya_per_orang);
    }

    public function getStatus()
    {
        return $this->status ? 'Sudah Dilaksanakan' : 'Belum Dilaksanakan';
    }
}
