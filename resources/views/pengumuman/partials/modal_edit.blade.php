<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengumuman.update') }}" method="POST" class="form" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Data</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_edit">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Judul Konten</label>
                            <input type="text" class="form-control" id="judul_konten_edit" name="judul_konten">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Teks Konten</label>
                            <input type="text" class="form-control" id="teks_konten_edit" name="teks_konten">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Gambar Konten</label>
                            <input type="file" class="form-control" id="file_konten_edit" name="file_konten">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tujuan Konten</label>
                            <select name="tujuan_konten" class="form-control" id="tujuan_konten_edit">
                                <option disabled selected>-- pilih tujuan --</option>
                                <option value="semua">Semua</option>
                                <option value="web">Web</option>
                                <option value="mitra">Mitra</option>
                                <option value="kurir">Kurir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm btn-flat " data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                <button type="submit" class="btn btn-primary btn-sm btn-flat btnSubmit"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
