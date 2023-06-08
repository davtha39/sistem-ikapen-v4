@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Detail Pengumuman</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pengumuman</a></li>
            <li class="breadcrumb-item active">Detail Pengumuman</li>
            </ol> 
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="mailbox-read-info">
                <h5>{{$pengumuman->judul}}</h5>
                <h6>Penulis: {{$pengumuman->users->name}}
                <span class="mailbox-read-time float-right">{{$pengumuman->created_at}}</span></h6>
            </div>
            <div class="mailbox-read-message">
                <p>{!! nl2br($pengumuman->deskripsi) !!}</p>
            </div>        
        </div>
        <div class="card-footer bg-white">
            @if ($pengumuman->ext === "pdf")
                <iframe src="{{asset('pdf_js/web/viewer.html')}}?file={{asset('/file_pengumuman')}}/{{$pengumuman->file}}" 
                align="top" height="1000" width="100%" frameborder="0" scrolling="auto"></iframe>
            @elseif ($pengumuman->ext === "jpg" && "jpeg" && "png")

            @elseif ($pengumuman->ext === ['doc,docx,xls,xlsx,ppt,pptx'])
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix float-center">
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file"></i></span>
                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{$pengumuman->file}}</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>
                                        @if ($pengumuman->ukuran >= '1024')
                                            {{round($pengumuman->ukuran / 1024, 2)}} KB
                                        @elseif ($pengumuman->ukuran >= '1048576')
                                            {{round($pengumuman->ukuran / 1048576, 2)}} MB
                                        @else
                                            {{$pengumuman->ukuran}} Bytes
                                        @endif
                                    </span>
                                <a href="{{--route('pengumuman.download', $pengumuman->id)--}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                </span>
                        </div>
                    </li>
                </ul>
            @else

            @endif    
        </div>
        <div class="card-footer">
            <div class="float-right">
                <form action="{{route('pengumuman.destroy', $pengumuman->id)}}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{route('pengumuman.edit', $pengumuman->id)}}">
                        <i class="fas fa-pencil-alt"></i>
                        Ubah
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteConfirmation()">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@include('pengurus.pengumuman.modaldelete')
@endsection
