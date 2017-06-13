<?php

namespace App\Policies;

use App\Karyawan;
use App\UnitKerja;

class UnitKerjaPolicy extends Policy
{
    /**
     * Determine whether the user can view the unit kerja.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\UnitKerja  $unitKerja
     * @return mixed
     */
    public function view(Karyawan $user, UnitKerja $unitKerja)
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
     * Determine whether the user can update the unit kerja.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\UnitKerja  $unitKerja
     * @return mixed
     */
    public function update(Karyawan $user, UnitKerja $unitKerja)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the unit kerja.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\UnitKerja  $unitKerja
     * @return mixed
     */
    public function delete(Karyawan $user, UnitKerja $unitKerja)
    {
        return true;
    }
}
