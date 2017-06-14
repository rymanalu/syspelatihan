{{ csrf_field() }}

<div class="form-group{{ $errors->has('id_unit_kerja') ? ' has-error' : '' }}">
    <label for="id_unit_kerja" class="col-md-3 control-label">Unit Kerja</label>

    <div class="col-md-9">
        <select class="form-control" name="id_unit_kerja">
            <option value="">Pilih Unit Kerja</option>
            @foreach ($semuaUnitKerja as $id => $unitKerja)
                <option value="{{ $id }}"{{ $id == old('id_unit_kerja') ?: $karyawan->id_unit_kerja ? ' selected' : '' }}>{{ $unitKerja }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_unit_kerja'))
            <span class="help-block">
                <strong>{{ $errors->first('id_unit_kerja') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('id_peran') ? ' has-error' : '' }}">
    <label for="id_peran" class="col-md-3 control-label">Peran</label>

    <div class="col-md-9">
        <select class="form-control" name="id_peran">
            @foreach ($semuaPeran as $id => $peran)
                <option value="{{ $id }}"{{ $id == (old('id_peran') ?: $karyawan->id_peran) ? ' selected' : '' }}>{{ $peran }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_peran'))
            <span class="help-block">
                <strong>{{ $errors->first('id_peran') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
    <label for="nik" class="col-md-3 control-label">NIK</label>

    <div class="col-md-9">
        <input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik', $karyawan->nik) }}">

        @if ($errors->has('nik'))
            <span class="help-block">
                <strong>{{ $errors->first('nik') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="col-md-3 control-label">Nama</label>

    <div class="col-md-9">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $karyawan->nama) }}">

        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
    <label for="jenis_kelamin" class="col-md-3 control-label">Jenis Kelamin</label>

    <div class="col-md-9">
        <label class="radio-inline">
            <input type="radio" name="jenis_kelamin" value="1"{{ old('jenis_kelamin') == 1 || $karyawan->jenis_kelamin == 1 ? ' checked' : '' }}> Laki-laki
        </label>

        <label class="radio-inline">
            <input type="radio" name="jenis_kelamin" value="2"{{ old('jenis_kelamin') == 2 || $karyawan->jenis_kelamin == 2 ? ' checked' : '' }}> Perempuan
        </label>

        @if ($errors->has('jenis_kelamin'))
            <span class="help-block">
                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
    <label for="tempat_lahir" class="col-md-3 control-label">Tempat Lahir</label>

    <div class="col-md-9">
        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir', $karyawan->tempat_lahir) }}">

        @if ($errors->has('tempat_lahir'))
            <span class="help-block">
                <strong>{{ $errors->first('tempat_lahir') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
    <label for="tanggal_lahir" class="col-md-3 control-label">Tanggal Lahir</label>

    <div class="col-md-9">
        <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir->format('Y-m-d')) }}">

        @if ($errors->has('tanggal_lahir'))
            <span class="help-block">
                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="col-md-3 control-label">Username</label>

    <div class="col-md-9">
        <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $karyawan->username) }}">

        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

@if (Request::segment(2) === 'create')
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-3 control-label">Password</label>

        <div class="col-md-9">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password_confirmation" class="col-md-3 control-label">Confirm Password</label>

        <div class="col-md-9">
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-9 col-md-offset-3">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>
