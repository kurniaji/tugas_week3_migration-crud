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
        @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
        @endif
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
                <button type="submit" class="btn btn-primary mb-2 ">Submit</button>
                <button class="btn btn-primary mb-2 ml-4" href="/pertanyaan/create">New Post</button>
            </div>
        </form>
    </div>
</div>


<div class="ml-3 mr-3 mt-1">
<div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">PERTANYAAN YANG BARU DI INPUT</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Judul</th>
                      <th>Isi Pertanyaan</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($pertanyaan as $key => $pertanyaan)
                    <tr>
                    <td> {{ $key + 1 }} </td>
                    <td> {{ $pertanyaan -> judul }} </td>
                    <td> {{ $pertanyaan -> isi }} </td>
                    
                    <td style="display : flex">
                    <a href="/pertanyaan/{{ $pertanyaan -> id }}" class="btn btn-info btn-sm mr-2 "> Show </a>
                    <a href="/pertanyaan/{{ $pertanyaan -> id }}/edit" class="btn btn-warning btn-sm ml-2 mr-3"> Edit </a>
                    <form action="/pertanyaan/{{ $pertanyaan->id }}" method="post">
                        @csrf 
                        @method('DELETE')
                         <input type="submit" value="Delete" class="btn btn-danger btn-sm" >
                    </form>
                    </td>

                    </tr>
                    @empty
                        <tr>
                        <td colspan="4" align="center">Tidak Ada data</td> 
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
</div>
@endsection