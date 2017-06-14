<?php

namespace App\Policies;

use App\Peran;
use App\Karyawan;
use App\Pengusulan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengusulanPolicy
{
    use ViewAllPolicy, HandlesAuthorization;

    /**
     * Determine whether the user can view the pengusulan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pengusulan  $pengusulan
     * @return mixed
     */
    public function view(Karyawan $user, Pengusulan $pengusulan)
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
     * Determine whether the user can update the pengusulan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pengusulan  $pengusulan
     * @return mixed
     */
    public function update(Karyawan $user, Pengusulan $pengusulan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the pengusulan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pengusulan  $pengusulan
     * @return mixed
     */
    public function delete(Karyawan $user, Pengusulan $pengusulan)
    {
        return true;
    }

    public function approve1(Karyawan $user)
    {
        return $user->peran->nama !== Peran::USER;
    }
}
