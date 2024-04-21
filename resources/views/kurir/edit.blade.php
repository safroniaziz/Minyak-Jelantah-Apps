@extends('layouts.app')
@section('subTitle','Data Kurir')
@section('page','Data Kurir')
@section('subPage','Semua Data')
@section('user-login')
    {{ Auth::user()->nama_lengkap }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user-check"></i>&nbsp;Data Kurir</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('kurir.create') }}" class="btn btn-primary btn-sm btn-flat">
                            <i class="fa fa-plus"></i>&nbsp;Tambah Data
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('kurir.update',[$kurir->id]) }}" enctype="multipart/form-data" method="POST" class="form">
                    <div class="box-body">
                        <div class="row">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Lengkap :</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $kurir->nama_lengkap }}" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email :</label>
                            <input type="email" name="email" id="email" value="{{ $kurir->email }}" id="email" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nomor WhatsApp</label>
                            <input type="number" name="nomor_whatsapp" id="nomor_whatsapp" value="{{ $kurir->nomor_whatsapp }}" id="nomor_whatsapp" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Alamat :</label>
                            <input type="text" name="alamat" id="alamat" value="{{ $kurir->alamat }}" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('kurir') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" name="reset" value="{{ old('reset') }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp;Ulangi</button>
                            <button type="submit" onclick="enableInput()" id="btnSubmit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('kurir.partials.js')
