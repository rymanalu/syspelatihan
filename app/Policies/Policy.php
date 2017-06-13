<?php

namespace App\Policies;

use App\Karyawan;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class Policy
{
    use HandlesAuthorization;

    public function before(Karyawan $user, $ability)
    {
        return $user->isAdmin();
    }
}
