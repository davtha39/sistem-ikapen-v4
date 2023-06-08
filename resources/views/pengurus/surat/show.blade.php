@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Detail surat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('surat.index')}}">surat</a></li>
            <li class="breadcrumb-item active">Detail Surat</li>
            </ol> 
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.container-fluid -->
<section class="content">
    <div class="card card-primary card-outline">
        <div class="card-body p-0">
            <div class="mailbox-read-info">
            <h5>{{$surat->judul}}</h5>
            <h6>Author: {{$surat->users->name}}
                <span class="mailbox-read-time float-right">Tanggal dibuat: {{$surat->created_at}}</span></h6>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
            {!! nl2br($surat->deskripsi) !!}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
            @if($surat->ext == "pdf")
                <iframe src="{{asset('pdf_js/web/viewer.html')}}?file={{asset('/file_surat')}}/{{$surat->file}}" 
                align="top" height="1000" width="100%" frameborder="0" scrolling="auto"></iframe>
            @else
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file"></i></span>           
                        <div class="mailbox-attachment-info">
                            <a href="{{route('surat.download', $surat->id)}}" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{$surat->file}}</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                            <span>
                                @if ($surat->ukuran >= '1024')
                                    {{round($surat->ukuran / 1024, 2)}} KB
                                @elseif ($surat->ukuran >= '1048576')
                                    {{round($surat->ukuran / 1048576, 2)}} MB
                                @else
                                    {{$surat->ukuran}} Bytes
                                @endif
                            </span>
                            <a href="{{route('surat.download', $surat->id)}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <div class="float-right">
                <form method="POST" action="{{route('surat.destroy', $surat->id )}}">
                    @csrf
                    @method('DELETE')
                    <a type="button" class="btn btn-info" href="{{route('surat.edit', $surat->id)}}"><i class="fas fa-pencil-alt"></i> Ubah</a>
                    <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation()">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </form>
            </div>
            <a type="button" class="btn btn-default" href="{{route('surat.download', $surat->id)}}">
            <i class="fas fa-print"></i> Unduh
            </a>
        </div>
        <!-- /.card-footer -->
        </div>
</section>


@include('pengurus.surat.modaldelete')
@endsection
