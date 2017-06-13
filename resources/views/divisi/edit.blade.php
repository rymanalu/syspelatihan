@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Divisi
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('divisi.update', $divisi) }}">
                        {{ method_field('PATCH') }}
                        @include('divisi.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
