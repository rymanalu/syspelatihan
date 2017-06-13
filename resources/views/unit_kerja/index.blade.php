@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Unit Kerja
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('unit_kerja.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th width="25%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaUnitKerja as $unitKerja)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $unitKerja->nama }}</td>
                                    <td>{{ $unitKerja->divisi->nama }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('unit_kerja.edit', $unitKerja),
                                            'deleteUrl' => route('unit_kerja.destroy', $unitKerja),
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="4">No data available in table</td>
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
