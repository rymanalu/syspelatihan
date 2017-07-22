@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <select class="form-control" name="pelatihan" id="pelatihan">
                    <option value="">Pilih Pelatihan</option>
                    @foreach ($semuaPelatihan as $key => $pel)
                        <option value="{{ $key }}">{{ $pel }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2" id="chart_block">
            <div class="panel panel-default">
                <div class="panel-body" id="peningkatan_pelatihan_container">
                    <canvas id="peningkatan_pelatihan_chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    <script>
        function show_hide_chart_block() {
            var val = $('#pelatihan').val();

            if (val == '') {
                $('#chart_block').hide();
            } else {
                $('#chart_block').show();
            }
        }

        $(document).ready(function () {
            show_hide_chart_block();

            $('#pelatihan').change(function () {
                show_hide_chart_block();

                if (this.value != '') {
                    $('#peningkatan_pelatihan_chart').remove();
                    $('#peningkatan_pelatihan_container').append('<canvas id="peningkatan_pelatihan_chart"></canvas>');

                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '{{ url('/hasil_peningkatan_pelatihan') }}' + '/' + this.value,
                        success: function (result) {
                            new Chart(document.getElementById('peningkatan_pelatihan_chart'), {
                                type: 'bar',
                                data: result,
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
                        }
                    });
                }
            });
        });
    </script>
@endpush
