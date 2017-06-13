{{ csrf_field() }}

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="col-md-3 control-label">Nama</label>

    <div class="col-md-9">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $provider->nama) }}">

        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
    <label for="alamat" class="col-md-3 control-label">Alamat</label>

    <div class="col-md-9">
        <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat', $provider->alamat) }}">

        @if ($errors->has('alamat'))
            <span class="help-block">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
    <label for="telepon" class="col-md-3 control-label">Telepon</label>

    <div class="col-md-9">
        <input id="telepon" type="text" class="form-control" name="telepon" value="{{ old('telepon', $provider->telepon) }}">

        @if ($errors->has('telepon'))
            <span class="help-block">
                <strong>{{ $errors->first('telepon') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-3 control-label">Email</label>

    <div class="col-md-9">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $provider->email) }}">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
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
