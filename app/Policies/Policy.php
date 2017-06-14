<?php

namespace App\Policies;

use App\Karyawan;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class Policy
{
    use ViewAllPolicy, HandlesAuthorization;

    public function before(Karyawan $user, $ability)
    {
        return $user->isAdmin();
    }
}
