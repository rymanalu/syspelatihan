@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pengusulan

                    @can('create', \App\Pengusulan::class)
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('pengusulan.create') }}">Tambah</a>
                        </div>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Karyawan</th>
                                <th>Keterangan Pelatihan</th>
                                <th>Target Hasil Pelatihan</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                                <th width="22%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaPengusulan as $pengusulan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $pengusulan->karyawans->pluck('nama')->implode(', ') }}</td>
                                    <td>{{ $pengusulan->keterangan_pelatihan }}</td>
                                    <td>{{ $pengusulan->target_hasil_pelatihan }}</td>
                                    <td>{{ $pengusulan->catatan }}</td>
                                    <td>{{ $pengusulan->status() }}</td>
                                    <td>{{ $pengusulan->tanggal_pengajuan->format('d M Y') }}</td>
                                    <td align="center">
                                        @include('shared.approve', [
                                            'i' => $loop->iteration,
                                            'pengusulan' => $pengusulan,
                                        ])
                                        @include('shared.action', [
                                            'editUrl' => route('pengusulan.edit', $pengusulan),
                                            'deleteUrl' => route('pengusulan.destroy', $pengusulan),
                                            'hideEdit' => ! Auth::user()->can('update', $pengusulan),
                                            'hideDelete' => ! Auth::user()->can('delete', $pengusulan),
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="8">No data available in table</td>
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
