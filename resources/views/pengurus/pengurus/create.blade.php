@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Anggota</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>
          </ol> 
        </div><!-- /.col -->
      </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
  <form method="POST" action="{{route('pengurus.store')}}" enctype="multipart/form-data">      
    @csrf
    <div class="card card-primary card-outline">
        <div class="card-body">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Nama Lengkap" aria-describedby="name.">
          </div>
          <div class="form-group">
            <label>Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label>Password (Minimal 8 karakter)</label>
            <input type="text" class="form-control" value="{{ old('password') }}" name="password" id="password" placeholder="Password" aria-describedby="Password">
          </div>
            <div class="row">
              <div class="col-md-6">
                
                <div class="form-group">
                  @if (old('gender') == "L")
                    <label>Jenis Kelamin</label>
                    <select class="custom-select" name="gender" id="gender">
                      <option>-- Pilih Jenis Kelamin --</option>
                      <option selected value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  @elseif (old('gender') == "P")
                    <label>Jenis Kelamin</label>
                    <select class="custom-select" name="gender" id="gender">
                      <option>-- Pilih Jenis Kelamin --</option>
                      <option value="L">Laki - Laki</option>
                      <option selected value="P">Perempuan</option>
                    </select>
                  @else
                    <label>Jenis Kelamin</label>
                    <select class="custom-select" name="gender" id="gender">
                      <option selected>-- Pilih Jenis Kelamin --</option>
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  @endif
                </div>
                <div class="form-group">
                  <label for="nama-lengkap">No Pensiun</label>
                  <input type="nama" value="{{ old('no_pensiun') }}" class="form-control" name="no_pensiun" id="no_pensiun" placeholder="No Pensiun">
                </div>
                <div class="form-group">
                  <label for="nama-lengkap">NIK</label>
                  <input type="nama" value="{{ old('NIK') }}" class="form-control" name="NIK" id="NIK" placeholder="NIK">
                </div>
                <div class="form-group">
                  <label for="nama-lengkap">Tempat Lahir</label>
                  <input type="nama" value="{{ old('tempat_lahir') }}" class="form-control" name="tempat_lahir" placeholder="Teempat Lahir">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" />
                  </div>                             
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Alamat Lengkap</label>
                  <textarea class="form-control" name="alamat_lengkap" rows="3" placeholder="Alamat Lengkap">{{ old('alamat_lengkap') }}</textarea>
                </div>
                <div class="form-group">
                  <label>No Telpon</label>
                  <input type="no_telp" value="{{ old('no_telp') }}" class="form-control" name="no_telp" placeholder="No telp">
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload Foto (opsional)</label>
                  <input class="form-control" value="{{ old('foto') }}" type="file" name="foto" id="formFile">
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
<script>
  $(function() {
    $('input[name="tanggal_lahir"]').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1901,
      maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start, end, label) {
      var years = moment().diff(start, 'years');
      //alert("You are " + years + " years old!");
    });
  });
</script>
@endsection
