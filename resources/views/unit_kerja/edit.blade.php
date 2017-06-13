@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Unit Kerja
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('unit_kerja.update', $unitKerja) }}">
                        {{ method_field('PATCH') }}
                        @include('unit_kerja.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
