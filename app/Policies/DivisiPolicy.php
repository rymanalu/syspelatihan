<?php

namespace App\Policies;

use App\Divisi;
use App\Karyawan;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisiPolicy
{
    use HandlesAuthorization;

    public function before(Karyawan $user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the divisi.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Divisi  $divisi
     * @return mixed
     */
    public function view(Karyawan $user, Divisi $divisi)
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
     * Determine whether the user can update the divisi.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Divisi  $divisi
     * @return mixed
     */
    public function update(Karyawan $user, Divisi $divisi)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the divisi.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Divisi  $divisi
     * @return mixed
     */
    public function delete(Karyawan $user, Divisi $divisi)
    {
        return true;
    }
}
