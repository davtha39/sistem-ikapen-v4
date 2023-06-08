@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pengumuman</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pengumuman</a></li>
            <li class="breadcrumb-item active">Tambah Pengumuman</li>
          </ol> 
        </div><!-- /.col -->
      </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
  <form method="POST" action="{{route('pengumuman.store')}}" enctype="multipart/form-data">      
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="row justify-content-md-center">
              <div class="col">
                <div class="form-group">
                  <label>Judul</label>
                  <input class="form-control" name="judul" id="judul">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea input class="form-control" name="deskripsi" id="deskripsi" rows="6"></textarea>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload File</label>
                  <input class="form-control" type="file" name="file" id="formFile">
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
