<div class="modal fade" id="modalFormData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <label class="col-sm-12 border-bottom">
                        <b>TANGGAL KIRIM : </b><br>
                        {{ cek_date_ddmmyyyy_his_v1($row->tgl_kirim) }}
                    </label>
                    <label class="col-sm-12 border-bottom">
                        <b>NAMA PELAPOR : </b><br>
                        {{ $row->nm_pelapor }}
                    </label>
                    <label class="col-sm-12   border-bottom">
                        <b>EMAIL : </b><br>
                        {{ $row->email }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>NO HP : </b><br>
                        {{ $row->no_hp }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>NO HP : </b><br>
                        {{ $row->JKategoriPengaduan->nm_kategori_pengaduan }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>TANGGAL KEJADIAN : </b><br>
                        {{ $row->tgl_kejadian }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>LOKASI KEJADIAN : </b><br>
                        {{ $row->lokasi_kejadian }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>OKNUM TERLIBAT : </b><br>
                        {{ $row->oknum_yang_terlibat }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>URAIAN : </b><br>
                        {!! $row->uraian !!}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>BUKTI GAMBAR : </b><br>
                        <a href="{{asset('images/pengaduan/'.$row->upload_bukti_dukung)}}" target="_blank"><img class="img-thumbnail" src="{{asset('images/pengaduan/'.$row->upload_bukti_dukung)}}" alt="gambar" style="width:100%;"></a>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>