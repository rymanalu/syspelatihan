<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Divisi' => 'App\Policies\DivisiPolicy',
        'App\Karyawan' => 'App\Policies\KaryawanPolicy',
        'App\Provider' => 'App\Policies\ProviderPolicy',
        'App\UnitKerja' => 'App\Policies\UnitKerjaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
