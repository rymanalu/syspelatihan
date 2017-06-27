<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @can('viewAll', App\Divisi::class)
                            <li>
                                <a href="{{ route('divisi.index') }}">Divisi</a>
                            </li>
                        @endcan

                        @can('viewAll', App\Karyawan::class)
                            <li>
                                <a href="{{ route('karyawan.index') }}">Karyawan</a>
                            </li>
                        @endcan

                        @can('viewAll', App\Provider::class)
                            <li>
                                <a href="{{ route('provider.index') }}">Provider</a>
                            </li>
                        @endcan

                        @can('viewAll', App\Pelatihan::class)
                            <li>
                                <a href="{{ route('pelatihan.index') }}">Pelatihan</a>
                            </li>
                        @endcan

                        @can('viewAll', App\UnitKerja::class)
                            <li>
                                <a href="{{ route('unit_kerja.index') }}">Unit Kerja</a>
                            </li>
                        @endcan

                        @can('viewAll', App\Pengusulan::class)
                            <li>
                                <a href="{{ route('pengusulan.index') }}">Pengusulan</a>
                            </li>
                        @endcan

                        @can('viewAll', App\EvaluasiPelatihan::class)
                            <li>
                                <a href="{{ route('evaluasi_pelatihan.index') }}">Evaluasi Pelatihan</a>
                            </li>
                        @endcan

                        @can('viewAll', App\KuisonerPelatihan::class)
                            <li>
                                <a href="{{ route('kuisoner_pelatihan.index') }}">Kuisoner Pelatihan</a>
                            </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
