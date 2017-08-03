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
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Hasil Evaluasi Pelatihan
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Nama</th>
                                    <th>Rata-rata</th>
                                    <th>Persentase</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelatihans as $pelatihan)
                                <tr>
                                    <td align="right">{{ $loop->iteration }}</td>
                                    <td>{{ $pelatihan->nama }}</td>
                                    <td align="right">{{ $rataRata = number_format($pelatihan->jawaban, 2) }}</td>
                                    <td align="right">{{ ($rataRata / 5) * 100 }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2" id="chart_block">
                <div class="panel panel-default">
                    <div class="panel-body" id="hasil_kuisoner_container">
                        <canvas id="hasil_kuisoner_chart"></canvas>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#pelatihan').change(function() {
                window.location = '{{ route('hasil_kuisoner.index') }}?pelatihan='+this.value;
            });
        });
    </script>

    @if ($hasPelatihan)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#hasil_kuisoner_chart').remove();
                $('#hasil_kuisoner_container').append('<canvas id="hasil_kuisoner_chart"></canvas>');

                new Chart(document.getElementById('hasil_kuisoner_chart'), {
                    type: 'bar',
                    data: {!! $chartData !!},
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            });
        </script>
    @endif
@endpush
