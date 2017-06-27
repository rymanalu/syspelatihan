{{ csrf_field() }}

<div class="form-group{{ $errors->has('default') ? ' has-error' : '' }}">
    <label for="default" class="col-md-3 control-label">Default?</label>

    <div class="col-md-9">
        <label class="radio-inline">
            <input type="radio" name="default" value="1"{{ (old('default') == 1 && ! is_null(old('default'))) || $evaluasiPelatihan->default == 1 ? ' checked' : '' }}> Ya
        </label>

        <label class="radio-inline">
            <input type="radio" name="default" value="0"{{ (old('default') == 0 && ! is_null(old('default'))) || $evaluasiPelatihan->default == 0 ? ' checked' : '' }}> Tidak
        </label>

        @if ($errors->has('default'))
            <span class="help-block">
                <strong>{{ $errors->first('default') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('id_pelatihan') ? ' has-error' : '' }}">
    <label for="id_pelatihan" class="col-md-3 control-label">Pelatihan</label>

    <div class="col-md-9">
        <select class="form-control" name="id_pelatihan" id="id_pelatihan">
            <option value=""></option>
            @foreach ($semuaPelatihan as $id => $pelatihan)
                <option value="{{ $id }}"{{ $id == $evaluasiPelatihan->id_pelatihan ? ' selected' : '' }}>{{ $pelatihan }}</option>
            @endforeach
        </select>

        @if ($errors->has('id_pelatihan'))
            <span class="help-block">
                <strong>{{ $errors->first('id_pelatihan') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
    <label for="judul" class="col-md-3 control-label">Judul</label>

    <div class="col-md-9">
        <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul', $evaluasiPelatihan->judul) }}">

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

@push('scripts')
<script>
    $(document).ready(function () {
        function pelatihan_toggle(value) {
            if (value == 1) {
                $('#id_pelatihan').val('');
                $('#id_pelatihan').attr('disabled', 'disabled');
            } else {
                $('#id_pelatihan').removeAttr('disabled');
            }
        }

        pelatihan_toggle($('input[type=radio][name=default]:checked').val());

        $('input[type=radio][name=default]').change(function () {
            pelatihan_toggle(this.value);
        });
    });
</script>
@endpush
