{{ csrf_field() }}

<div class="form-group{{ $errors->has('id_divisi') ? ' has-error' : '' }}">
    <label for="id_divisi" class="col-md-3 control-label">Divisi</label>

    <div class="col-md-9">
        <select class="form-control" name="id_divisi">
            @foreach ($semuaDivisi as $id => $divisi)
                <option value="{{ $id }}"{{ $id == $unitKerja->id_divisi ? ' selected' : '' }}>{{ $divisi }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_divisi'))
            <span class="help-block">
                <strong>{{ $errors->first('id_divisi') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="col-md-3 control-label">Nama</label>

    <div class="col-md-9">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $unitKerja->nama) }}">

        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
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
