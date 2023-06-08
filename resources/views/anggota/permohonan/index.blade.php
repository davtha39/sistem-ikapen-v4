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
                <li class="breadcrumb-item"><a href="{{route('anggota.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Permohonan</li>
                </ol> 
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<section class="content">
    <div class="row">
    </div>
    <form method="POST" action="{{route('permohonan.store')}}" enctype="multipart/form-data">      
        @csrf
        <div class="card card-primary">
            <div class="card-body">
                <div class="row justify-content-md-center">
                <div class="col">
                    <div class="form-group">
                        <label>Jenis Permohonan</label>
                        <select class="form-control" name="jenis_permohonan" id="jenis_permohonan">
                            <option>-- Pilih Jenis Permohonan anda --</option>
                            <option @if (old('jenis_permohonan') === "Cetak Kartu Anggota") selected @endif value="Cetak Kartu Anggota">Cetak Kartu Anggota</option>
                            <option @if (old('jenis_permohonan') === "Permohonan BPJS") selected @endif value="Permohonan BPJS">Permohonan BPJS</option>
                            <option @if (old('jenis_permohonan') === "Penerbitan Surat Pensiun") selected @endif value="Penerbitan Surat Pensiun">Penerbitan Surat Pensiun</option>
                            <option @if (old('jenis_permohonan') === "Lainnya") selected @endif value="Lainnya">Lainnya</option>
                        </select>
                        <p class="red-text">
                            Jika memilih opsi "Lainnya", mohon isikan detail permohonan anda di form Catatan dibawah ini.
                        </p>
                    </div>
                    <div class="form-group">
                    <label>Catatan (Opsional)</label>
                    <textarea class="form-control" name="catatan" id="catatan" rows="3">{{old('catatan')}}</textarea>
                    </div>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <div class="form-group float-right">
                <button type="button" class="btn btn-success" onclick="showConfirm()">Simpan</button>
            </div>
            </div>
        </div>
    </form>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h5>Status Permohonan</h5>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Permohonan</th>
                        <th scope="col">Status</th>
                        <th scope="col" width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permohonan as $row)
                        
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{$row->jenis_permohonan}}</td>
                                <td>
                                    @if ($row->approval == 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($row->approval == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-warning">Belum ditinjau</span>
                                    @endif
                                </td>
                                <td>                                   
                                    <a class="btn btn-primary btn-sm" href="{{--route('anggota.show', $row->id)--}}">
                                        <i class="fas fa-folder"></i>
                                        Detail
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt"></i>
                                        Cetak Berkas
                                    </a>                           
                                </td>
                            </tr>
                    @endforeach
                </tbody-->
            </table>
        </div>
    </div>
</section>    
<script>
    function showConfirm() {
        Swal.fire({
            title: 'Konfirmasi Pengajuan Permohonan',
            text: "Apakah anda yakin ingin mengajukan permohonan yang dipilih?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // if the user confirms the deletion, submit the form
                document.querySelector('form').submit();
            }
        });
    }
</script>
@include('pengurus.anggota.modaldelete')

@if ($message = Session::get('succes'))
    <script>
        Swal.fire(
            'Permohonan berhasil diajukan',
            'Silahkan tunggu dalam waktu 1x24 jam untuk persetujuan dari Pengurus.',
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
