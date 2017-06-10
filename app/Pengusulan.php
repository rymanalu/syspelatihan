<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengusulan extends Model
{
    const BARU = 0;
    const APPROVE_MANAJER1 = 1;
    const APPROVE_MANAJER2 = 2;

    protected $table = 'pengusulan';

    public $timestamps = false;

    protected $fillable = ['id_karyawan', 'keterangan_pelatihan', 'target_hasil_pelatihan', 'catatan', 'status', 'tanggal_pengajuan', 'tanggal_approve_1', 'tanggal_approve_2'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
