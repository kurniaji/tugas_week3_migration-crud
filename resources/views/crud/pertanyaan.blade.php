@extends('admin.layout.master')

@section('content')
<div class="ml-3 mr-3 mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tugas Crud</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/pertanyaan" method="POST" >
        @csrf
        <div class="card-body">
                <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="title" name="judul" value=" {{ old('judul', '' ) }}" placeholder="Masukan Judul">
                @error('judul')
                <div class="alert alert-danger">{{ $message }} </div>
                @enderror
                </div>

            <div class="form-group">
                <label for="isi">Pertanyaan</label>
                <input type="text" class="form-control" id="isi" name="isi" value=" {{ old('isi', '' ) }}" placeholder="Silahkan Masukan Pertanyaan Anda">
                @error('isi')
                <div class="alert alert-warning">{{ $message }} </div>
                @enderror
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection