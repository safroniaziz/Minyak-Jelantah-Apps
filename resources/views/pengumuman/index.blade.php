@extends('layouts.app')
@section('subTitle','Data Informasi Pengumuman')
@section('page','Data Informasi Pengumuman')
@section('subPage','Semua Data')
@section('user-login')
{{ Auth::user()->nama_lengkap }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Pengumuman</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i>&nbsp;Tambah Data
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Pengumuman</th>
                            <th>Teks Pengumuman</th>
                            <th>Gambar Pengumuman</th>
                            <th>Tujuan Pengumuman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumumans as $index => $pengumuman)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $pengumuman->judul_konten }}</td>
                                <td>{{ $pengumuman->teks_konten }}</td>
                                <td>
                                    <img src="{{ asset($pengumuman->file_kontent) }}" alt="" height="150px">
                                </td>
                                <td>{{ $pengumuman->tujuan_konten }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a onclick="editData({{ $pengumuman->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('pengumuman.delete',[$pengumuman->id]) }}" method="POST" class="form">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm btnSubmit"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('pengumuman.partials.modal_add')
        </div>
        @include('pengumuman.partials.modal_edit')
    </div>
</div>
@endsection

@include('pengumuman.partials.js')
