@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Surat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('pengurus.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('surat.index')}}"></a>Surat</li>
            </ol> 
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('surat.create')}}">+ Tambah Surat</a>
        </div>
        <div class="card-body">
            <div class="table-responsive mailbox-messages">
                <table id="noHeader" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Judul</th>                                    
                            <th scope="col">Tanggal Upload</th>
                            <th scope="col">Author</th>
                            <th scope="col" width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $row)
                            <tr>
                                @if ($row->file)
                                    <td class="mailbox-attachment"></td>
                                @else
                                    <td></td>
                                @endif
                                <td><a class="mailbox-attachment-name" style="color: black" href="{{route('surat.show', $row->id)}}">{{$row->judul}}</a></td>
                                <td>{{$row->updated_at}}</td>
                                <td>{{$row->users->name}}</td>
                                <td>
                                    <form action="{{route('surat.destroy', $row->id)}}" method="POST">
                                        <a class="btn btn-primary btn-sm" href="{{route('surat.show', $row->id)}}">
                                            <i class="fas fa-folder"></i>
                                            Lihat
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{route('surat.edit', $row->id)}}">
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
    </div>
</section>


@include('pengurus.surat.modaldelete')

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
