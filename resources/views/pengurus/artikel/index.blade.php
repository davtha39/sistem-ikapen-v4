@extends('layouts.app')

@section('content') 
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Artikel</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('artikel.index')}}"></a>Artikel</li>
        </ol> 
    </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('artikel.create')}}">+ Tulis Artikel</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>                                    
                        <th scope="col">Tanggal Upload</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikel as $row)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td><a class="mailbox-attachment-name" style="color: black" href="{{route('artikel.show', $row->id)}}">{{$row->judul}}</a></td>
                            <td>{{$row->updated_at}}</td>
                            <td>{{$row->users->name}}</td>
                            <td>
                                <form action="{{route('artikel.destroy', $row->id)}}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{route('artikel.show', $row->id)}}">
                                        <i class="fas fa-folder"></i>
                                        Lihat
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('artikel.edit', $row->id)}}">
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

@include('pengurus.artikel.modaldelete')
@endsection
