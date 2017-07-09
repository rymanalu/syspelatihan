<?php

namespace App\Policies;

use App\Karyawan;
use App\Provider;

class ProviderPolicy extends Policy
{
    /**
     * Determine whether the user can view the provider.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function view(Karyawan $user, Provider $provider)
    {
        return true;
    }

    /**
     * Determine whether the user can create provider.
     *
     * @param  \App\Karyawan  $user
     * @return mixed
     */
    public function create(Karyawan $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the provider.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function update(Karyawan $user, Provider $provider)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the provider.
     *
     * @param  \App\Karyawan  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function delete(Karyawan $user, Provider $provider)
    {
        return true;
    }
}
