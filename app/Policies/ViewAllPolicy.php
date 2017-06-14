<?php

namespace App\Policies;

use App\Karyawan;

trait ViewAllPolicy
{
    /**
     * Determine whether the user can view a listing of the resource.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function viewAll(Karyawan $user)
    {
        return true;
    }
}
