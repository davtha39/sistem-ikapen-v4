@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="col">
        <div class="card">
                @if ($message = Session::get('succes'))
                    <div class="alert alert-success" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @endif
        </div>

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
                        <h6>Author: {{$arsip->pengurus->name}}
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
                            <iframe src="{{asset('file_arsip/'.$arsip->file)}}" width="100%" height=800px></iframe>
                        @else
                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>           
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                        <span>1,245 KB</span>
                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
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
                                <i class="fas fa-trash-alt"></i>Hapus
                            </button>
                        </form>
                      </div>
                      <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                    <!-- /.card-footer -->
                  </div>
            </section>
            </div>    
    </div>
</div>

@include('pengurus.arsip.modaldelete')
@endsection
