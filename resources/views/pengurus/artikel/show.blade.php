@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Detail Artikel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('pengurus.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('artikel.index')}}">Artikel</a></li>
            <li class="breadcrumb-item active">Detail Artikel</li>
            </ol> 
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="mailbox-read-info">
                <h5>{{$artikel->judul}}</h5>
                <h6>Penulis: {{$artikel->users->name}}
                <span class="mailbox-read-time float-right">{{$artikel->created_at}}</span></h6>
            </div>
            <div class="mailbox-read-message">
                <div class="justify-content-center align-items-center center-image">
                    <a href="/foto_artikel/{{$artikel->foto}}" data-toggle="lightbox" data-gallery="gallery" class="lightbox-link">
                        <img src="/foto_artikel/{{$artikel->foto}}" width="500" alt="Image 1">
                    </a>
                </div><br>
                <p>{{$artikel->isi}}</p>
            </div>        
        </div>

        <div class="card-footer">
            <div class="float-right">
                <form method="POST" action="{{route('artikel.destroy', $artikel->id )}}">
                    @csrf
                    @method('DELETE')
                    <a type="button" class="btn btn-info" href="{{route('artikel.edit', $artikel->id)}}"><i class="fas fa-pencil-alt"></i> Ubah</a>
                    <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation()">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </form>
            </div>
            </a>
        </div>
    </div>
</section>

@endsection
