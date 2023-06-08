@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Anggota</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Anggota</li>
                </ol> 
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('anggota.create')}}">+ Tambah Anggota</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Pensiun</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tempat, Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col" width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $row)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$row->name}}</td>
                        <!--td><img src="/foto_anggota/{{$row->foto}}" width="100px"></td-->
                        <td>{{$row->email}}</td>
                        <td>
                            @if ($row->gender == "L")
                                Laki - Laki
                            @elseif ($row->gender == "P")
                                Perempuan 
                            @endif
                        </td>
                        <td>{{$row->no_pensiun}}</td>
                        <td>{{$row->NIK}}</td>
                        <td>{{$row->tempat_lahir}}, {{$row->tanggal_lahir}}</td>
                        <td>{{$row->alamat_lengkap}}</td>                            
                        <td>{{$row->no_telp}}</td>
                        <td>  
                            <form action="{{route('anggota.destroy', $row->id)}}" method="POST">                                 
                                <a class="btn btn-primary btn-sm" href="{{route('anggota.show', $row->id)}}">
                                    <i class="fas fa-folder"></i>
                                    Lihat
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('anggota.edit', $row->id)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Ubah
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteConfirmation()">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>                              
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>    

@include('pengurus.anggota.modaldelete')

@if ($message = Session::get('succes'))
    <script>
        Swal.fire(
            'Input Data Berhasil',
            'Data telah berhasil di input ke database.',
            'success'
        )
    </script>
@elseif ($message = Session::get('deleted'))
    <script>
        Swal.fire(
            'Delete Data Berhasil',
            'Data telah berhasil dihapus dari database.',
            'success'
        )
    </script>
@elseif ($message = Session::get('updated'))
    <script>
        Swal.fire(
            'Update Data Berhasil',
            'Data telah berhasil diupdate dari database.',
            'success'
        )
    </script>
@endif


@endsection
