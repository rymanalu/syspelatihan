@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Kategori Pelatihan
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('kategori_pelatihan.store') }}">
                        @include('kategori_pelatihan.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
