@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kuisoner Pelatihan
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('kuisoner_pelatihan.create') }}">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Judul</th>
                                <th width="21%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuaKuisonerPelatihan as $kuisonerPelatihan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $kuisonerPelatihan->judul }}</td>
                                    <td align="center">
                                        @include('shared.action', [
                                            'editUrl' => route('kuisoner_pelatihan.edit', $kuisonerPelatihan),
                                            'deleteUrl' => route('kuisoner_pelatihan.destroy', $kuisonerPelatihan),
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
