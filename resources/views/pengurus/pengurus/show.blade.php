@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Detail Pengurus</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Pengurus</a></li>
            <li class="breadcrumb-item active">Detail Data</li>
            </ol> 
        </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content section about-section gray-bg" id="about">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                @if ($pengurus->foto)
                  <img src="/foto_pengurus/{{$pengurus->foto}}" alt="Admin" class="rounded-circle" width="200" height="200">
                @else
                  <img src="/asset/defaultphoto.png" alt="Admin" class="rounded-circle" width="200" height="200">
                @endif
                <div class="mt-3">
                  <h4>{{$pengurus->name}}</h4>
                  <p class="text-secondary mb-1">Pengurus</p>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="float-center">
                <form action="{{route('pengurus.jadianggota', $pengurus->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <button type="button" class="btn btn-info" onclick="showConfirm()">
                    <i class="fas fa-pencil-alt"></i> Ubah Jadi Anggota
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nama</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->email}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Jenis Kelamin</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    @if($pengurus->gender == "L")
                        Laki - Laki
                    @elseif($pengurus->gender == "P")
                        Perempuan
                    @endif
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">No Pensiun</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->no_pensiun}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">NIK</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->NIK}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tempat, tanggal lahir</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->tempat_lahir}}, {{$pengurus->tanggal_lahir}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Alamat</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->alamat_lengkap}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">No Telp</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$pengurus->no_telp}}
                </div>
              </div>
              <hr>
            </div>
            <div class="card-footer">
              <div class="float-right">
                <form method="POST" action="{{route('pengurus.destroy', $pengurus->id)}}">
                  @csrf
                  @method('DELETE')
                  <a type="button" class="btn btn-info" href="{{route('pengurus.edit', $pengurus->id)}}"><i class="fas fa-pencil-alt"></i> Ubah</a>
                  <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation()">
                      <i class="fas fa-trash-alt"></i> Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
</section>

<script>
  function showConfirm() {
      Swal.fire({
          title: 'Konfirmasi Ubah Menjadi Anggota',
          text: "Apakah anda yakin ingin mengubah {{$pengurus->name}} menjadi Anggota ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak'
      }).then((result) => {
          if (result.isConfirmed) {
              // if the user confirms the deletion, submit the form
              document.querySelector('form').submit();
          }
      });
  }
</script>

@include('pengurus.pengurus.modaldelete')
@endsection
