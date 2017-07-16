{{ csrf_field() }}

@foreach ($semuaKaryawan as $karyawan)
    <div class="form-group">
        <div class="col-md-12">
            <input type="hidden" name="evaluasi[{{ $loop->index }}][karyawan]" value="{{ $karyawan->id }}">

            <p align="center" class="form-control-static"><b><u>{{ $karyawan->nama }}</u></b></p>
        </div>
    </div>

    @foreach ($semuaEvaluasi as $evaluasi)
        <div class="form-group{{ $errors->has(sprintf('evaluasi.%s.jawaban.%s', $loop->parent->index, $evaluasi->id)) ? ' has-error' : '' }}">
            <label for="{{ sprintf('evaluasi_%s_jawaban_%s', $loop->parent->index, $evaluasi->id) }}" class="col-md-9 control-label">{{ $evaluasi->judul }}</label>

            <div class="col-md-3">
                <input id="{{ sprintf('evaluasi_%s_jawaban_%s', $loop->parent->index, $evaluasi->id) }}" type="number" class="form-control" name="evaluasi[{{ $loop->parent->index }}][jawaban][{{ $evaluasi->id }}]" value="{{ old(sprintf('evaluasi.%s.jawaban.%s', $loop->parent->index, $evaluasi->id), 0) }}" min="0" max="5">

                @if ($errors->has(sprintf('evaluasi.%s.jawaban.%s', $loop->parent->index, $evaluasi->id)))
                    <span class="help-block">
                        <strong>{{ $errors->first(sprintf('evaluasi.%s.jawaban.%s', $loop->parent->index, $evaluasi->id)) }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endforeach
@endforeach

<div class="form-group">
    <div class="col-md-3 col-md-offset-9">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>
