<?php

namespace App\Policies;

use App\Peran;
use App\Karyawan;
use App\Pengusulan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengusulanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view a listing of the resource.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function viewAll(Karyawan $user)
    {
        return $user->peran->nama !== Peran::USER;
    }

    /**
     * Determine whether the user can view the pengusulan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Pengusulan  $pengusulan
     * @return mixed
     */
    public function view(Karyawan $user, Pengusulan $pengusulan)
    {
        return $this->create($user);
    }

    /**
     * Determine whether the user can create pengusulan.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return $this->approve($user) || $user->peran->nama === Peran::MANAJER1;
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
        return $this->create($user) && $user->id_unit_kerja == $pengusulan->karyawan->id_unit_kerja;
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
        return $this->update($user, $pengusulan) || $user->peran->nama === Peran::ADMIN;
    }

    public function approve(Karyawan $user)
    {
        return $user->peran->nama === Peran::MANAJER2;
    }
}
