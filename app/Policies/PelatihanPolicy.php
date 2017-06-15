<?php

namespace App\Policies;

use App\Karyawan;
use App\Pelatihan;

class PelatihanPolicy extends Policy
{
    /**
     * Determine whether the user can view the pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pelatihan  $pelatihan
     * @return mixed
     */
    public function view(Karyawan $user, Pelatihan $pelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can create divisis.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pelatihan  $pelatihan
     * @return mixed
     */
    public function update(Karyawan $user, Pelatihan $pelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pelatihan  $pelatihan
     * @return mixed
     */
    public function delete(Karyawan $user, Pelatihan $pelatihan)
    {
        return true;
    }
}
