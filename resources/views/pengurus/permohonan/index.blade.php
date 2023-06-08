@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Permohonan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('pengurus.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Permohonan</li>
                </ol> 
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h5>Daftar Permohonan</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemohon</th>
                        <th scope="col">Jenis Permohonan</th>
                        <th scope="col">Status</th>
                        <th scope="col" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permohonan as $row)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{$row->users->name}}</td>
                            <td>{{$row->jenis_permohonan}}</td>
                            <td>
                                @if ($row->approval == 'Disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($row->approval == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-warning">Belum ditinjau</span>
                                @endif
                            </td>
                            <td>                                   
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modalTinjau">
                                    <i class="fas fa-pencil-alt"></i>
                                    Tinjau
                                </a>                           
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>    

@include('pengurus.permohonan.modal_tinjau')

@if ($message = Session::get('accept'))
    <script>
        Swal.fire(
            'Permohonan berhasil disetujui',
            ' ',
            'success'
        )
    </script>
@elseif ($message = Session::get('decline'))
    <script>
        Swal.fire(
            'Permohonan berhasil ditolak',
            ' ',
            'success'
        )
    </script>
@endif

@endsection
