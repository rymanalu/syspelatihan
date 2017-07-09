<?php

namespace App\Policies;

use App\Karyawan;
use App\KategoriPelatihan;

class KategoriPelatihanPolicy extends Policy
{
    /**
     * Determine whether the user can view the kategori pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return mixed
     */
    public function view(Karyawan $user, KategoriPelatihan $kategoriPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can create kategori pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the kategori pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return mixed
     */
    public function update(Karyawan $user, KategoriPelatihan $kategoriPelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the kategori pelatihan.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return mixed
     */
    public function delete(Karyawan $user, KategoriPelatihan $kategoriPelatihan)
    {
        return true;
    }
}
