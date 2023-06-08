@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Detail Arsip</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('arsip.index')}}">Arsip</a></li>
            <li class="breadcrumb-item active">Detail Arsip</li>
            </ol> 
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card card-primary card-outline">
        <div class="card-body p-0">
            <div class="mailbox-read-info">
            <h5>{{$arsip->judul}}</h5>
            <h6>Author: {{$arsip->users->name}}
                <span class="mailbox-read-time float-right">Tanggal dibuat: {{$arsip->created_at}}</span></h6>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
            {{$arsip->deskripsi}}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
            @if($arsip->ext == "pdf")
                <iframe src="{{asset('pdf_js/web/viewer.html')}}?file={{asset('/file_arsip')}}/{{$arsip->file}}" 
                align="top" height="1000" width="100%" frameborder="0" scrolling="auto"></iframe>
            @else
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file"></i></span>           
                        <div class="mailbox-attachment-info">
                            <a href="{{route('arsip.download', $arsip->id)}}" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{$arsip->file}}</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                            <span>
                                @if ($arsip->ukuran >= '1024')
                                    {{round($arsip->ukuran / 1024, 2)}} KB
                                @elseif ($arsip->ukuran >= '1048576')
                                    {{round($arsip->ukuran / 1048576, 2)}} MB
                                @else
                                    {{$arsip->ukuran}} Bytes
                                @endif
                            </span>
                            <a href="{{route('arsip.download', $arsip->id)}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <div class="float-right">
                <form method="POST" action="{{route('arsip.destroy', $arsip->id )}}">
                    @csrf
                    @method('DELETE')
                    <a type="button" class="btn btn-info" href="{{route('arsip.edit', $arsip->id)}}"><i class="fas fa-pencil-alt"></i> Ubah</a>
                    <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation()">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </form>
            </div>
            <a type="button" class="btn btn-default" href="{{route('arsip.download', $arsip->id)}}">
            <i class="fas fa-print"></i> Unduh
            </a>
        </div>
        <!-- /.card-footer -->
        </div>
</section>


@include('pengurus.arsip.modaldelete')
@endsection
