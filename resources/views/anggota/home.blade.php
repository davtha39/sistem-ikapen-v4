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
  </div>
    <!-- ./col -->
</div>
    <div class="container-fluid">
        <div class="card small-box card-primary card-outline">
          <div class="card-header">
            <h6>Data Permohonan Anda</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Disetujui</span>
                    <span class="info-box-number">1,410</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

              <!-- /.col -->
              <div class="col">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Ditolak</span>
                    <span class="info-box-number">13,648</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col">
                <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Belum Ditinjau</span>
                    <span class="info-box-number">93,139</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
          </div><!-- /.card-body -->
          <a href="{{route('permohonan.index')}}" class="small-box-footer info-box-text ">
            More info
            <i class="fas fa-arrow-circle-right"></i></a>                 
          </div>
        </div><!-- /.container-fluid -->
        
      </div><!-- /.container-fluid -->
</section>




@endsection