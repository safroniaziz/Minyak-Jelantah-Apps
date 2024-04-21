@extends('layouts.app')
@section('subTitle','Dashboard')
@section('page','Dashboard')
@section('subPage','Semua Data')
@section('user-login')
{{ Auth::user()->nama_lengkap }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel" style="margin-bottom:20px;">
                <header class="bg-primary" style="color: #ffffff;background-color: #3c8dbc;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-home"></i>&nbsp;Dashboard
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row" style="margin-right:-15px; margin-left:-15px;">
                        <div class="col-md-12">Selamat datang <strong> {{ Auth::user()->nama_user }} </strong> di halaman Dashboard Operator <b> Minyak Jelantah Apps                         </b></div>
                    </div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #3c8dbc;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Informasi Aplikasi
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $jumlahBeranda }}</h3>

                                <p>Jumlah Beranda</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $jumlahPengumuman }}</h3>

                                <p>Jumlah Pengumuman</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file-pdf-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $jumlahMitra }}</h3>

                                <p>Jumlah Mitra</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-wpforms"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $jumlahKurir }}</h3>

                                <p>Jumlah Kurir (Pengepul)</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file-excel-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i>{{ $jumlahAdministrator }}</span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Administrator</span>
                                    <span class="info-box-number"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-list"></i>{{ $jumlahNarahubung }}</span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Kontak Narahubung</span>
                                    <span class="info-box-number"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
