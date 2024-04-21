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
            <div class="box-body">
                <table class="table table-striped table-bordered" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th style="vertical-align:middle">No</th>
                            <th style="vertical-align:middle">Nama Lengkap</th>
                            <th style="vertical-align:middle">Email</th>
                            <th style="vertical-align:middle">Nomor WhatsApp</th>
                            <th style="vertical-align:middle">Alamat</th>
                            <th style="text-align:center;vertical-align:middle;">Ubah Password</th>
                            <th style="text-align:center; vertical-align:middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($administrators as $index => $administrator)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $administrator->nama_lengkap }}</td>
                                <td>{{ $administrator->email }}</td>
                                <td>{{ $administrator->nomor_whatsapp }}</td>
                                <td>{{ $administrator->alamat }}</td>
                                <td class="text-center">
                                    <a onclick="ubahPassword({{ $administrator->id }})" class="btn btn-primary btn-sm btn-flat" style="color:white; cursor:pointer;"><i class="fa fa-key"></i></a>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{ route('administrator.edit',[$administrator->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('administrator.delete',[$administrator->id]) }}" method="POST" id="form-hapus">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('administrator.partials.ubah_password')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        function ubahPassword(id){
            $('#modalubahpassword').modal('show');
            $('#id_password').val(id);
        }

        $(document).on('submit','#form-hapus',function (event){
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData:false,
                contentType:false,
                success : function(res) {
                    $("#btnSubmit"). attr("disabled", true);
                    toastr.success(res.text, 'Yeay, Berhasil');
                    setTimeout(function () {
                        window.location.href=res.url;
                    } , 500);
                },
                error:function(xhr){
                    toastr.error(xhr.responseJSON.text, 'Ooopps, Ada Kesalahan');
                }
            })
        });

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah Anda Yakin?`,
                text: "Harap untuk memeriksa kembali sebelum menghapus data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    </script>
@endpush
