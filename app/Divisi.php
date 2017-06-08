<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';

    public $timestamps = false;

    protected $fillable = ['nama'];

    public function unitKerja()
    {
        return $this->hasMany(UnitKerja::class, 'id_divisi');
    }
}
