{{ csrf_field() }}

@foreach ($semuaKuisoner as $kuisoner)
    <div class="form-group{{ $errors->has('kuis.'.$kuisoner->id) ? ' has-error' : '' }}">
        <label for="kuis_{{ $kuisoner->id }}" class="col-md-9 control-label">{{ $kuisoner->judul }}</label>

        <div class="col-md-3">
            <input id="kuis_{{ $kuisoner->id }}" type="number" class="form-control" name="kuis[{{ $kuisoner->id }}]" value="{{ old('kuis_'.$kuisoner->id, 0) }}" min="0" max="5">

            @if ($errors->has('kuis.'.$kuisoner->id))
                <span class="help-block">
                    <strong>{{ $errors->first('kuis.'.$kuisoner->id) }}</strong>
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
