@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hasil Evaluasi Pelatihan
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-3">
                            <p align="right" class="form-control-static"><b>Nama:</b></p>
                        </div>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ $karyawan->nama }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <p align="right" class="form-control-static"><b>Pelatihan:</b></p>
                        </div>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ $karyawan->nama_pelatihan }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <p align="right" class="form-control-static"><b>Rata-rata:</b></p>
                        </div>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ $avg }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <p align="right" class="form-control-static"><b>Persentase:</b></p>
                        </div>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ ($avg / 5) * 100 }}%</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            &nbsp;
                        </div>
                        <div class="col-md-9">
                            &nbsp;
                        </div>
                    </div>

                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Aspek</th>
                                <th width="20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $evaluasi)
                                <tr>
                                    <td>{{ $evaluasi->judul }}</td>
                                    <td align="right">{{ $evaluasi->nilai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
