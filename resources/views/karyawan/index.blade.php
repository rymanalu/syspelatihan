@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Karyawan
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('karyawan.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Unit Kerja</th>
                                <th>Peran</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th width="14%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaKaryawan as $karyawan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $karyawan->unitKerja ? $karyawan->unitKerja->nama : '' }}</td>
                                    <td>{{ $karyawan->peran ? $karyawan->peran->nama : '' }}</td>
                                    <td>{{ $karyawan->nik }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->username }}</td>
                                    <td>{{ $karyawan->jenisKelamin() }}</td>
                                    <td>{{ $karyawan->tempat_lahir }}</td>
                                    <td>{{ $karyawan->tanggal_lahir->format('d M Y') }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('karyawan.edit', $karyawan),
                                            'deleteUrl' => route('karyawan.destroy', $karyawan),
                                            'hide' => $karyawan->isAdmin() || Auth::user()->id == $karyawan->id,
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
