<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'provider';

    public $timestamps = false;

    protected $fillable = ['nama', 'alamat', 'telepon', 'email'];

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'id_provider');
    }
}
