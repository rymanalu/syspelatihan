{{ csrf_field() }}

@foreach ($semuaEvaluasi as $evaluasi)
    <div class="form-group{{ $errors->has('evaluasi.'.$evaluasi->id) ? ' has-error' : '' }}">
        <label for="evaluasi_{{ $evaluasi->id }}" class="col-md-9 control-label">{{ $evaluasi->judul }}</label>

        <div class="col-md-3">
            <input id="evaluasi_{{ $evaluasi->id }}" type="number" class="form-control" name="evaluasi[{{ $evaluasi->id }}]" value="{{ old('evaluasi_'.$evaluasi->id, 0) }}" min="0" max="5">

            @if ($errors->has('evaluasi.'.$evaluasi->id))
                <span class="help-block">
                    <strong>{{ $errors->first('evaluasi.'.$evaluasi->id) }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach

<div class="form-group">
    <div class="col-md-3 col-md-offset-9">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>
