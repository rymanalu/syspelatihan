@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Provider
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('provider.update', $provider) }}">
                        {{ method_field('PATCH') }}
                        @include('provider.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
