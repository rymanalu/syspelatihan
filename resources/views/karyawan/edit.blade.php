@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Karyawan
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('karyawan.update', $karyawan) }}">
                        {{ method_field('PATCH') }}
                        @include('karyawan.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
