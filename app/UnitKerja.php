<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';

    public $timestamps = false;

    protected $fillable = ['id_divisi', 'nama'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_unit_kerja');
    }
}
