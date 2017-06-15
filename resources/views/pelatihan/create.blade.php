@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Pelatihan
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('pelatihan.store') }}" enctype="multipart/form-data">
                        @include('pelatihan.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
