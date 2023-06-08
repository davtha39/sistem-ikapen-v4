@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Arsip</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('arsip.index')}}"></a>Arsip</li>
            </ol> 
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('arsip.create')}}">+ Tambah Arsip</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>                                    
                        <th scope="col">Tanggal Upload</th>
                        <th scope="col">File</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arsip as $row)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td><a class="mailbox-attachment-name" style="color: black" href="{{route('arsip.show', $row->id)}}">{{$row->judul}}</a></td>
                            <td>{{$row->updated_at}}</td>
                            <td>
                                <div class="col" style="text-align: center">
                                    <a href="{{route('arsip.show', $row->id)}}">
                                        @if ($row->ext === "pdf")
                                            <img height="40" src="{{asset('asset/pdf.png')}}"> 
                                        @elseif ($row->ext === "docx" || 'doc')
                                            <img height="40" src="{{asset('asset/word.png')}}">
                                        @endif
                                    </a>
                                </div>
                                <div class="col" style="text-align: center">
                                    
                                    @if ($row->ukuran >= '1024')
                                        {{round($row->ukuran / 1024, 2)}} KB
                                    @elseif ($row->ukuran >= '1048576')
                                        {{round($row->ukuran / 1048576, 2)}} MB
                                    @else
                                        {{$row->ukuran}} Bytes
                                    @endif
                                </div>
                            </td>
                            <td>{{$row->users->name}}</td>
                            <td>
                                <form action="{{route('arsip.destroy', $row->id)}}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{route('arsip.show', $row->id)}}">
                                        <i class="fas fa-folder"></i>
                                        Lihat
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('arsip.edit', $row->id)}}">
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


@include('pengurus.arsip.modaldelete')

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
