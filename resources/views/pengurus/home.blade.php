@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('Selamat Datang di Sistem Informasi IKAPEN PT Pelindo (SIKAP)') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
          </ol> 
        </div><!-- /.col -->
      </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="row">
                <div class="col">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$totalpengurus}}</h3>
        
                        <p>Pengurus</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-address-card"></i>
                      </div>
                      <a href="{{route('pengurus.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col">
                    <!-- small box -->
                    <div class="small-box bg-info ">
                      <div class="inner">
                        <h3>{{$totalanggota}}</h3>
        
                        <p>Anggota</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-address-card"></i>
                      </div>
                      <a href="{{route('anggota.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box" style="background-color: pink;">
                    <div class="inner">
                      <h3>{{$totalarsip}}</h3>
      
                      <p>Arsip</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
                    <a href="{{route('arsip.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$totalpengumuman}}</h3>
      
                      <p>Pengumuman</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('pengumuman.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-primary" style="background-color: #00254d;">
                    <div class="inner">
                      <h3>{{$totalartikel}}</h3>
                      <p>Artikel</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('artikel.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$totalsurat}}</h3>
        
                        <p>Surat</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('surat.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
            </div>
          </div><!-- /.card-body -->
        </div>
        <div class="card card-primary card-outline">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                
              </tr>
            </thead>
        </div>
      </div><!-- /.container-fluid -->
</section>

@if ($message = Session::get('permitpengurus'))
    <script>
        Swal.fire(
            'Akses Ditolak',
            'Anda tidak memiliki akses sebagai User.',
            'error'
        )
    </script>
@endif

@endsection