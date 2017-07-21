<ul class="nav navbar-nav">
    @can('viewDataMasterMenu')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Data Master <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                @can('viewAll', \App\Divisi::class)
                    <li>
                        <a href="{{ route('divisi.index') }}">Divisi</a>
                    </li>
                @endcan

                @can('viewAll', \App\EvaluasiPelatihan::class)
                    <li>
                        <a href="{{ route('evaluasi_pelatihan.index') }}">Evaluasi Pelatihan</a>
                    </li>
                @endcan

                @can('viewAll', \App\Karyawan::class)
                    <li>
                        <a href="{{ route('karyawan.index') }}">Karyawan</a>
                    </li>
                @endcan

                @can('viewAll', \App\KategoriPelatihan::class)
                    <li>
                        <a href="{{ route('kategori_pelatihan.index') }}">Kategori Pelatihan</a>
                    </li>
                @endcan

                @can('viewAll', \App\KuisonerPelatihan::class)
                    <li>
                        <a href="{{ route('kuisoner_pelatihan.index') }}">Kuisoner Pelatihan</a>
                    </li>
                @endcan

                @can('viewAll', \App\Provider::class)
                    <li>
                        <a href="{{ route('provider.index') }}">Provider</a>
                    </li>
                @endcan

                @can('viewAll', \App\UnitKerja::class)
                    <li>
                        <a href="{{ route('unit_kerja.index') }}">Unit Kerja</a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan

    @can('viewAllPelatihan')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Pelatihan <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                @can('viewAll', \App\BeritaPelatihan::class)
                    <li>
                        <a href="{{ route('berita_pelatihan.index') }}">Berita Pelatihan</a>
                    </li>
                @endcan

                @can('viewAll', \App\Pelatihan::class)
                    <li>
                        <a href="{{ route('pelatihan.index') }}">Pelatihan</a>
                    </li>
                @endcan

                @can('create', \App\PeningkatanPelatihan::class)
                    <li>
                        <a href="{{ route('peningkatan_pelatihan.index') }}">Peningkatan Pelatihan</a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan

    @can('viewAll', \App\Pengusulan::class)
        <li>
            <a href="{{ route('pengusulan.index') }}">Pengusulan</a>
        </li>
    @endcan

    @can('viewHasilEvaluasi')
        <li>
            <a href="{{ route('hasil_evaluasi.index') }}">Hasil Evaluasi</a>
        </li>
    @endcan

    @can('viewHasilKuisoner')
        <li>
            <a href="{{ route('hasil_kuisoner.index') }}">Hasil Kuisoner</a>
        </li>
    @endcan
</ul>
