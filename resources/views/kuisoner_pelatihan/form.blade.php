{{ csrf_field() }}

<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
    <label for="judul" class="col-md-3 control-label">Judul</label>

    <div class="col-md-9">
        <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul', $kuisonerPelatihan->judul) }}">

        @if ($errors->has('judul'))
            <span class="help-block">
                <strong>{{ $errors->first('judul') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-9 col-md-offset-3">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>
