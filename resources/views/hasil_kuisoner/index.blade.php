@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <select class="form-control" name="pelatihan" id="pelatihan">
                    <option value=""{{ $pelatihanId == '' ? ' selected' : '' }}>Pilih Pelatihan</option>
                    @foreach ($semuaPelatihan as $key => $pel)
                        <option value="{{ $key }}"{{ $pelatihanId == $key ? ' selected' : '' }}>{{ $pel }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if ($hasPelatihan)
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Hasil Evaluasi Pelatihan
                    </div>

                    <div class="panel-body">
                        @foreach ($pelatihan as $key => $p)
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p align="center" class="form-control-static"><b><u>{{ $p->first()->nama }}</u></b></p>
                                </div>
                            </div>

                            @foreach ($p as $x)
                                <div class="form-group">
                                    <div class="col-md-11">
                                        <p class="form-control-static">{{ $x->judul }}</p>
                                    </div>

                                    <div class="col-md-1">
                                        <p class="form-control-static">{{ $x->jawaban }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('#pelatihan').change(function () {
            window.location = '{{ route('hasil_kuisoner.index') }}?pelatihan='+this.value;
        });
    </script>
@endpush
