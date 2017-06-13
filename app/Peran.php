<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    const ADMIN = 'Admin';
    const MANAJER1 = 'Manajer 1';
    const MANAJER2 = 'Manajer 2';
    const USER = 'User';

    protected $table = 'peran';

    public $timestamps = false;

    protected $fillable = ['nama'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_peran');
    }
}
