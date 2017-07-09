<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaPelatihan extends Model
{
    protected $table = 'berita_pelatihan';

    protected $dates = [
        'tanggal_mulai', 'tanggal_selesai',
    ];

    public $timestamps = false;

    protected $casts = [
        'biaya_per_orang' => 'integer',
    ];

    protected $fillable = ['id_provider', 'id_kategori_pelatihan', 'nama', 'tanggal_mulai', 'tanggal_selesai', 'biaya_per_orang', 'brosur', 'catatan'];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarBeritaPelatihan::class, 'id_berita_pelatihan');
    }

    public function kategoriPelatihan()
    {
        return $this->belongsTo(KategoriPelatihan::class, 'id_kategori_pelatihan');
    }

    public function biayaPerOrang()
    {
        return number_format($this->biaya_per_orang);
    }
}
