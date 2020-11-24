@extends('admin.layout.master')

@section('content')

<div class="ml-3 mr-3 mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{ $pertanyaan -> judul }} </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
        
        <p> {{ $pertanyaan -> isi }} </p>
        
        </div>
</div>

@endsection