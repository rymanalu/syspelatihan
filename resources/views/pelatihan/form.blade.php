{{ csrf_field() }}

@if (file_is_exists($pelatihan->brosur))
    <div class="form-group">
        <div align="center" class="col-md-12">
            <img class="img-thumbnail img-responsive" src="{{ file_url($pelatihan->brosur) }}">
        </div>
    </div>
@endif

<div class="form-group{{ $errors->has('id_provider') ? ' has-error' : '' }}">
    <label for="id_provider" class="col-md-3 control-label">Provider</label>

    <div class="col-md-9">
        <select class="form-control" name="id_provider">
            @foreach ($semuaProvider as $id => $provider)
                <option value="{{ $id }}"{{ $id == $pelatihan->id_provider ? ' selected' : '' }}>{{ $provider }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_provider'))
            <span class="help-block">
                <strong>{{ $errors->first('id_provider') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="col-md-3 control-label">Nama</label>

    <div class="col-md-9">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $pelatihan->nama) }}">

        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('tanggal_mulai') ? ' has-error' : '' }}">
    <label for="tanggal_mulai" class="col-md-3 control-label">Tanggal Mulai</label>

    <div class="col-md-9">
        <input id="tanggal_mulai" type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai', $pelatihan->tanggal_mulai ? $pelatihan->tanggal_mulai->format('Y-m-d') : '') }}">

        @if ($errors->has('tanggal_mulai'))
            <span class="help-block">
                <strong>{{ $errors->first('tanggal_mulai') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('tanggal_selesai') ? ' has-error' : '' }}">
    <label for="tanggal_selesai" class="col-md-3 control-label">Tanggal Selesai</label>

    <div class="col-md-9">
        <input id="tanggal_selesai" type="date" class="form-control" name="tanggal_selesai" value="{{ old('tanggal_selesai', $pelatihan->tanggal_selesai ? $pelatihan->tanggal_selesai->format('Y-m-d') : '') }}">

        @if ($errors->has('tanggal_selesai'))
            <span class="help-block">
                <strong>{{ $errors->first('tanggal_selesai') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('biaya_per_orang') ? ' has-error' : '' }}">
    <label for="biaya_per_orang" class="col-md-3 control-label">Biaya Per Orang</label>

    <div class="col-md-9">
        <input id="biaya_per_orang" type="number" class="form-control" name="biaya_per_orang" value="{{ old('biaya_per_orang', $pelatihan->biaya_per_orang) }}">

        @if ($errors->has('biaya_per_orang'))
            <span class="help-block">
                <strong>{{ $errors->first('biaya_per_orang') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('brosur') ? ' has-error' : '' }}">
    <label for="brosur" class="col-md-3 control-label">Brosur</label>

    <div class="col-md-9">
        <input id="brosur" type="file" class="form-control" name="brosur">

        @if ($errors->has('brosur'))
            <span class="help-block">
                <strong>{{ $errors->first('brosur') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('catatan') ? ' has-error' : '' }}">
    <label for="catatan" class="col-md-3 control-label">Catatan</label>

    <div class="col-md-9">
        <textarea class="form-control" name="catatan">{{ old('catatan', $pelatihan->catatan) }}</textarea>

        @if ($errors->has('catatan'))
            <span class="help-block">
                <strong>{{ $errors->first('catatan') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="col-md-3 control-label">Status</label>

    <div class="col-md-9">
        <label class="radio-inline">
            <input type="radio" name="status" value="0"{{ old('status') == 0 || $pelatihan->status == 0 ? ' checked' : '' }}> Belum Dilaksanakan
        </label>

        <label class="radio-inline">
            <input type="radio" name="status" value="1"{{ old('status') == 1 || $pelatihan->status == 1 ? ' checked' : '' }}> Sudah Dilaksanakan
        </label>

        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
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
