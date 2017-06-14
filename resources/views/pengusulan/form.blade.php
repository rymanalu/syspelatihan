{{ csrf_field() }}

<div class="form-group{{ $errors->has('keterangan_pelatihan') ? ' has-error' : '' }}">
    <label for="keterangan_pelatihan" class="col-md-3 control-label">Keterangan Pelatihan</label>

    <div class="col-md-9">
        <textarea class="form-control" name="keterangan_pelatihan">{{ old('keterangan_pelatihan', $pengusulan->keterangan_pelatihan) }}</textarea>

        @if ($errors->has('keterangan_pelatihan'))
            <span class="help-block">
                <strong>{{ $errors->first('keterangan_pelatihan') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('target_hasil_pelatihan') ? ' has-error' : '' }}">
    <label for="target_hasil_pelatihan" class="col-md-3 control-label">Target Hasil Pelatihan</label>

    <div class="col-md-9">
        <textarea class="form-control" name="target_hasil_pelatihan">{{ old('target_hasil_pelatihan', $pengusulan->target_hasil_pelatihan) }}</textarea>

        @if ($errors->has('target_hasil_pelatihan'))
            <span class="help-block">
                <strong>{{ $errors->first('target_hasil_pelatihan') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('catatan') ? ' has-error' : '' }}">
    <label for="catatan" class="col-md-3 control-label">Catatan</label>

    <div class="col-md-9">
        <textarea class="form-control" name="catatan">{{ old('catatan', $pengusulan->catatan) }}</textarea>

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
