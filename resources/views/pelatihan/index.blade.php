@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pelatihan
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('pelatihan.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Provider</th>
                                <th>Nama</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Biaya Per Orang</th>
                                <th>Brosur</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th width="14%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaPelatihan as $pelatihan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $pelatihan->provider->nama }}</td>
                                    <td>{{ $pelatihan->nama }}</td>
                                    <td>{{ $pelatihan->tanggal_mulai ? $pelatihan->tanggal_mulai->format('d M Y') : '' }}</td>
                                    <td>{{ $pelatihan->tanggal_selesai ? $pelatihan->tanggal_selesai->format('d M Y') : '' }}</td>
                                    <td>{{ $pelatihan->biayaPerOrang() }}</td>
                                    <td><img class="img-thumbnail img-responsive" src="{{ file_url($pelatihan->brosur) }}"></td>
                                    <td>{{ $pelatihan->catatan }}</td>
                                    <td>{{ $pelatihan->getStatus() }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('pelatihan.edit', $pelatihan),
                                            'deleteUrl' => route('pelatihan.destroy', $pelatihan),
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
