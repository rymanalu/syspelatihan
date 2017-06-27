@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Evaluasi Pelatihan
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('evaluasi_pelatihan.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Judul</th>
                                <th>Pelatihan</th>
                                <th>Default?</th>
                                <th width="25%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaEvaluasiPelatihan as $evaluasiPelatihan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $evaluasiPelatihan->judul }}</td>
                                    <td>{{ $evaluasiPelatihan->pelatihan ? $evaluasiPelatihan->pelatihan->nama : '' }}</td>
                                    <td>{{ $evaluasiPelatihan->default ? 'Ya' : 'Tidak' }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('evaluasi_pelatihan.edit', $evaluasiPelatihan),
                                            'deleteUrl' => route('evaluasi_pelatihan.destroy', $evaluasiPelatihan),
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="5">No data available in table</td>
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
