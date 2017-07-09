{{ csrf_field() }}

@if (file_is_exists($beritaPelatihan->brosur))
    <div class="form-group">
        <div align="center" class="col-md-12">
            <img class="img-thumbnail img-responsive" src="{{ file_url($beritaPelatihan->brosur) }}">
        </div>
    </div>
@endif

<div class="form-group{{ $errors->has('id_provider') ? ' has-error' : '' }}">
    <label for="id_provider" class="col-md-3 control-label">Provider</label>

    <div class="col-md-9">
        <select class="form-control" name="id_provider">
            @foreach ($semuaProvider as $id => $provider)
                <option value="{{ $id }}"{{ $id == $beritaPelatihan->id_provider ? ' selected' : '' }}>{{ $provider }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_provider'))
            <span class="help-block">
                <strong>{{ $errors->first('id_provider') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('id_kategori_pelatihan') ? ' has-error' : '' }}">
    <label for="id_kategori_pelatihan" class="col-md-3 control-label">Kategori Pelatihan</label>

    <div class="col-md-9">
        <select class="form-control" name="id_kategori_pelatihan">
            @foreach ($semuaKategoriPelatihan as $id => $kategoriPelatihan)
                <option value="{{ $id }}"{{ $id == $beritaPelatihan->id_kategori_pelatihan ? ' selected' : '' }}>{{ $kategoriPelatihan }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_kategori_pelatihan'))
            <span class="help-block">
                <strong>{{ $errors->first('id_kategori_pelatihan') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="col-md-3 control-label">Nama</label>

    <div class="col-md-9">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $beritaPelatihan->nama) }}">

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
        <input id="tanggal_mulai" type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai', $beritaPelatihan->tanggal_mulai ? $beritaPelatihan->tanggal_mulai->format('Y-m-d') : '') }}">

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
        <input id="tanggal_selesai" type="date" class="form-control" name="tanggal_selesai" value="{{ old('tanggal_selesai', $beritaPelatihan->tanggal_selesai ? $beritaPelatihan->tanggal_selesai->format('Y-m-d') : '') }}">

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
        <input id="biaya_per_orang" type="number" class="form-control" name="biaya_per_orang" value="{{ old('biaya_per_orang', $beritaPelatihan->biaya_per_orang) }}">

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
        <textarea class="form-control" name="catatan">{{ old('catatan', $beritaPelatihan->catatan) }}</textarea>

        @if ($errors->has('catatan'))
            <span class="help-block">
                <strong>{{ $errors->first('catatan') }}</strong>
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
