<?php

namespace App\Policies;

use App\Karyawan;
use App\KuisonerPelatihan;

class KuisonerPelatihanPolicy extends Policy
{
    /**
     * Determine whether the user can view the kuisoner pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return mixed
     */
    public function view(Karyawan $user, KuisonerPelatihan $kuisonerPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can create kuisoner pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the kuisoner pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return mixed
     */
    public function update(Karyawan $user, KuisonerPelatihan $kuisonerPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the kuisoner pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return mixed
     */
    public function delete(Karyawan $user, KuisonerPelatihan $kuisonerPelatihan)
    {
        return true;
    }
}
