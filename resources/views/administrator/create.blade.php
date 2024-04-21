@extends('layouts.app')
@section('subTitle','Data Administrator')
@section('page','Data Administrator')
@section('subPage','Semua Data')
@section('user-login')
    {{ Auth::user()->nama_lengkap }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user-check"></i>&nbsp;Data Administrator</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('administrator.create') }}" class="btn btn-primary btn-sm btn-flat">
                            <i class="fa fa-plus"></i>&nbsp;Tambah Data
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('administrator.store') }}" enctype="multipart/form-data" method="POST" class="form">
                    <div class="box-body table-reviewer">
                        <div class="row">
                        {{ csrf_field() }} {{ method_field('POST') }}
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Lengkap :</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email :</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" id="email" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor WhatsApp</label>
                                <input type="number" name="nomor_whatsapp" id="nomor_whatsapp" value="{{ old('nomor_whatsapp') }}" id="nomor_whatsapp" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Alamat :</label>
                                <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Password </label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Konfirmasi Password </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="off">
                            </div>

                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('administrator') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" name="reset" value="{{ old('reset') }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp;Ulangi</button>
                            <button type="submit" onclick="enableInput()" id="btnSubmit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@include('administrator.partials.js')
