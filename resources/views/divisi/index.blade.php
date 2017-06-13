@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Divisi
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('divisi.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th width="25%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaDivisi as $divisi)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $divisi->nama }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('divisi.edit', $divisi),
                                            'deleteUrl' => route('divisi.destroy', $divisi),
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="3">No data available in table</td>
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
