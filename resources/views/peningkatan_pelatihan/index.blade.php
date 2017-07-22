@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <select class="form-control" name="pelatihan" id="pelatihan">
                    <option value=""{{ $pelatihanId == '' ? ' selected' : '' }}>Pilih Pelatihan</option>
                    @foreach ($semuaPelatihan as $key => $pel)
                        <option value="{{ $key }}"{{ $pelatihanId == $key ? ' selected' : '' }}>{{ $pel }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if ($hasPelatihan)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $pelatihan->provider->nama }}: {{ $pelatihan->nama }}
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('peningkatan_pelatihan.store', $pelatihan) }}">
                            {{ csrf_field() }}
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Karyawan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pre Test</th>
                                        <th>Post Test</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelatihan->karyawan as $karyawan)
                                        <tr>
                                            <td>{{ $karyawan->nama }}</td>
                                            <td>{{ $karyawan->jenisKelamin() }}</td>
                                            <td>
                                                <input type="number" name="peningkatan_pelatihan[{{ $karyawan->id }}][pre_test]" value="0" class="form-control" min="0" max="100" required>
                                            </td>
                                            <td>
                                                <input type="number" name="peningkatan_pelatihan[{{ $karyawan->id }}][post_test]" value="0" class="form-control" min="0" max="100" required>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" align="right">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('#pelatihan').change(function () {
            window.location = '{{ route('peningkatan_pelatihan.index') }}?pelatihan='+this.value;
        });
    </script>
@endpush
