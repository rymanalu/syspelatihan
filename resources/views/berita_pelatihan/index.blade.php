@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Berita Pelatihan
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('berita_pelatihan.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Provider</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Biaya Per Orang</th>
                                <th>Brosur</th>
                                <th>Catatan</th>
                                <th width="14%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaBeritaPelatihan as $beritaPelatihan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $beritaPelatihan->provider->nama }}</td>
                                    <td>{{ $beritaPelatihan->kategoriPelatihan->nama }}</td>
                                    <td>{{ $beritaPelatihan->nama }}</td>
                                    <td>{{ $beritaPelatihan->tanggal_mulai ? $beritaPelatihan->tanggal_mulai->format('d M Y') : '' }}</td>
                                    <td>{{ $beritaPelatihan->tanggal_selesai ? $beritaPelatihan->tanggal_selesai->format('d M Y') : '' }}</td>
                                    <td>{{ $beritaPelatihan->biayaPerOrang() }}</td>
                                    <td><img class="img-thumbnail img-responsive" src="{{ file_url($beritaPelatihan->brosur) }}"></td>
                                    <td>{{ $beritaPelatihan->catatan }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('berita_pelatihan.edit', $beritaPelatihan),
                                            'deleteUrl' => route('berita_pelatihan.destroy', $beritaPelatihan),
                                            'hideEdit' => ! Auth::user()->can('edit', $beritaPelatihan),
                                            'hideDelete' => ! Auth::user()->can('delete', $beritaPelatihan),
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="10">No data available in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
