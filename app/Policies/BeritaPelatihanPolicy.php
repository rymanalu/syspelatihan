<?php

namespace App\Policies;

use App\Karyawan;
use App\BeritaPelatihan;
use Illuminate\Auth\Access\HandlesAuthorization;

class BeritaPelatihanPolicy
{
    use ViewAllPolicy, HandlesAuthorization;

    /**
     * Determine whether the user can view the berita pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return mixed
     */
    public function view(Karyawan $user, BeritaPelatihan $beritaPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can create berita pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the berita pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return mixed
     */
    public function update(Karyawan $user, BeritaPelatihan $beritaPelatihan)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the berita pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return mixed
     */
    public function delete(Karyawan $user, BeritaPelatihan $beritaPelatihan)
    {
        return $user->isAdmin();
    }
}
