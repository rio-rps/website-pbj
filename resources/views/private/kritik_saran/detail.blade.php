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
                        <b>NAMA : </b><br>
                        {{ $row->nm_pengirim }}
                    </label>
                    <label class="col-sm-12   border-bottom">
                        <b>EMAIL : </b><br>
                        {{ $row->email_pengirim }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>NO HP : </b><br>
                        {{ $row->no_tlp_pengirim }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>ALAMAT: </b><br>
                        {{ $row->alamat_pengirim }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>Penilaian Pelayanan : </b><br>
                        {{ ceknNlaiPelayanan($row->nilai_pelayanan) }}
                    </label>
                    <label class="col-sm-12  border-bottom">
                        <b>URAIAN KRITIK DAN SARAN: </b><br>
                        {!! $row->uraian_kritik_saran !!}
                    </label>
                </div>
                <div class="modal-footer">
                    <a href="{{route('laporan.cetakKritikSaran',$row->id_kritik_saran)}}" class="btn btn-success" target="_blank">CETAK</a>
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>