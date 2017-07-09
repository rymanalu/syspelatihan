<?php

namespace App\Policies;

use App\Karyawan;

class KaryawanPolicy extends Policy
{
    /**
     * Determine whether the user can view the karyawan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function view(Karyawan $user, Karyawan $karyawan)
    {
        return true;
    }

    /**
     * Determine whether the user can create karyawan.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the karyawan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function update(Karyawan $user, Karyawan $karyawan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the karyawan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function delete(Karyawan $user, Karyawan $karyawan)
    {
        return true;
    }
}
