<?php

namespace App\Providers;

use App\Peran;
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
        'App\Pelatihan' => 'App\Policies\PelatihanPolicy',
        'App\UnitKerja' => 'App\Policies\UnitKerjaPolicy',
        'App\Pengusulan' => 'App\Policies\PengusulanPolicy',
        'App\BeritaPelatihan' => 'App\Policies\BeritaPelatihanPolicy',
        'App\EvaluasiPelatihan' => 'App\Policies\EvaluasiPelatihanPolicy',
        'App\KategoriPelatihan' => 'App\Policies\KategoriPelatihanPolicy',
        'App\KuisonerPelatihan' => 'App\Policies\KuisonerPelatihanPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewDataMasterMenu', function ($user) {
            return $user->can('viewAll', 'App\\Divisi') ||
                   $user->can('viewAll', 'App\\Karyawan') ||
                   $user->can('viewAll', 'App\\Provider') ||
                   $user->can('viewAll', 'App\\UnitKerja') ||
                   $user->can('viewAll', 'App\\EvaluasiPelatihan') ||
                   $user->can('viewAll', 'App\\KuisonerPelatihan');
        });

        Gate::define('viewHasilEvaluasi', function ($user) {
            return $user->peran->nama !== Peran::USER;
        });

        Gate::define('viewHasilKuisoner', function ($user) {
            return $user->can('viewHasilEvaluasi');
        });

        //
    }
}
