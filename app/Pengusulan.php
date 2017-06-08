<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengusulan extends Model
{
    protected $table = 'pengusulan';

    public $timestamps = false;

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $fillable = ['id_karyawan', 'keterangan_pelatihan', 'target_hasil_pelatihan', 'catatan', 'status', 'tanggal_pengajuan', 'tanggal_approve_1', 'tanggal_approve_2'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
