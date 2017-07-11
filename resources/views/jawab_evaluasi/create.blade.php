@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Jawab Kuisoner
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('jawab_evaluasi.store', $pelatihan) }}">
                        @include('jawab_evaluasi.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
