<?php

namespace App\Policies;

use App\Karyawan;
use App\EvaluasiPelatihan;

class EvaluasiPelatihanPolicy extends Policy
{
    /**
     * Determine whether the user can view the evaluasi pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return mixed
     */
    public function view(Karyawan $user, EvaluasiPelatihan $evaluasiPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can create evaluasi pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the evaluasi pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return mixed
     */
    public function update(Karyawan $user, EvaluasiPelatihan $evaluasiPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the evaluasi pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return mixed
     */
    public function delete(Karyawan $user, EvaluasiPelatihan $evaluasiPelatihan)
    {
        return true;
    }
}
