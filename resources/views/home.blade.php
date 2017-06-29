@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Pengusulan yang Anda buat</div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Pengusulan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($createdPengusulan as $pengusulan)
                                <tr>
                                    <td>{{ $pengusulan->keterangan_pelatihan }}</td>
                                    <td>{{ $pengusulan->status() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="2">Anda belum membuat satupun pengusulan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Pelatihan yang Anda ikuti</div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Pelatihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($followedPelatihan as $pelatihan)
                                <tr>
                                    <td>{{ $pelatihan->nama }}</td>
                                    <td>{{ $pelatihan->getStatus() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="2">Anda belum mengikuti pelatihan apapun</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Kuisoner yang belum Anda isi</div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Pelatihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($unansweredPelatihanQuiz as $pelatihan)
                                <tr>
                                    <td>{{ $pelatihan->nama }}</td>
                                    <td>{{ $pelatihan->getStatus() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="2">Tidak ada kuisoner untuk saat ini</td>
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
