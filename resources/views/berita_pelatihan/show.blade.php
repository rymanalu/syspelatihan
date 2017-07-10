@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Berita Pelatihan: {{ $beritaPelatihan->nama }}
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="#">
                        @if (file_is_exists($beritaPelatihan->brosur))
                            <div class="form-group">
                                <div align="center" class="col-md-12">
                                    <img class="img-thumbnail img-responsive" src="{{ file_url($beritaPelatihan->brosur) }}">
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="id_provider" class="col-md-3 control-label">Provider</label>

                            <div class="col-md-9">
                                <p class="form-control-static">{{ $beritaPelatihan->provider->nama }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_provider" class="col-md-3 control-label">Kategori Pelatihan</label>

                            <div class="col-md-9">
                                <p class="form-control-static">{{ $beritaPelatihan->kategoriPelatihan->nama }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_provider" class="col-md-3 control-label">Tanggal Mulai</label>

                            <div class="col-md-9">
                                <p class="form-control-static">{{ $beritaPelatihan->tanggal_mulai ? $beritaPelatihan->tanggal_mulai->format('d M Y') : '' }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_provider" class="col-md-3 control-label">Tanggal Selesai</label>

                            <div class="col-md-9">
                                <p class="form-control-static">{{ $beritaPelatihan->tanggal_selesai ? $beritaPelatihan->tanggal_selesai->format('d M Y') : '' }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_provider" class="col-md-3 control-label">Biaya Per Orang</label>

                            <div class="col-md-9">
                                <p class="form-control-static">{{ $beritaPelatihan->biayaPerOrang() }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_provider" class="col-md-3 control-label">Catatan</label>

                            <div class="col-md-9">
                                <p class="form-control-static">{{ $beritaPelatihan->catatan }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @forelse ($beritaPelatihan->komentar as $komentar)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $komentar->karyawan->nama }}:
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="#">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p class="form-control-static">{{ $komentar->komentar }}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-8 col-md-offset-2">
                <p align="center"><strong>Tidak ada komentar untuk saat ini.</strong></p>
            </div>
        @endforelse

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Komentar
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('berita_pelatihan.tambah_komentar', $beritaPelatihan) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <textarea class="form-control" cols="5" rows="5" name="komentar">{{ old('komentar') }}</textarea>

                                @if ($errors->has('komentar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('komentar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-10">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
