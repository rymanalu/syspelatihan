@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Provider
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('provider.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th width="25%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaProvider as $provider)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $provider->nama }}</td>
                                    <td>{{ $provider->alamat }}</td>
                                    <td>{{ $provider->telepon }}</td>
                                    <td>{{ $provider->email }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('provider.edit', $provider),
                                            'deleteUrl' => route('provider.destroy', $provider),
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="6">No data available in table</td>
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
