<?php

namespace App\Policies;

use App\Karyawan;
use App\PeningkatanPelatihan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeningkatanPelatihanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create peningkatanPelatihans.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return $user->isAdmin();
    }
}
