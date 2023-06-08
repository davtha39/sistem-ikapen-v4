@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah pengumuman</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pengumuman</a></li>
            <li class="breadcrumb-item active">Ubah pengumuman</li>
          </ol> 
        </div><!-- /.col -->
      </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
  <form method="POST" action="{{route('pengumuman.update', $pengumuman->id)}}" enctype="multipart/form-data">      
    @csrf
    @method('PUT')
    <div class="card card-primary">
        <div class="card-body">
            <div class="row justify-content-md-center">
              <div class="col">
                <div class="form-group">
                  <label>Judul</label>
                  <input class="form-control" name="judul" id="judul" value="{{$pengumuman->judul}}">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea input class="form-control" name="deskripsi" id="deskripsi" rows="6">{{$pengumuman->deskripsi}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload File (Opsional)</label>
                  <input class="form-control" type="file" name="file" id="formFile" value="{{old('file', $pengumuman->file)}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
        </div>
    </div>
  </form>
</section>
@endsection
