<div class="modal fade" id="modalFormData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lamandetail.storeUploadDokumen') }}" class="formDataMultipart" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="id_laman" value="{{$id_laman}}" maxlength="100">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">Nama Dokumen</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nm_dokumen" maxlength="100">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">Keterangan Dokumen</label>
                            <div class="col-md-8">
                                <textarea name="ket_dokumen" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">Kelompok Tahun Dokumen</label>
                            <div class="col-md-4">
                                <select name="tahun_dokumen" class="form-control">
                                    <option value="" selected>-- Pilih --</option>
                                    @for ($i=date("Y")+1; $i >=2015; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">File Dokumen </label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="file_dokumen" accept=".pdf,.doc,.docx,.xlsx,.pptx">
                                <span class="badge badge-danger pull-right">pdf, doc, docx, xlsx, pptx | max:10000 MB</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="reset" class="btn btn-secondary">
                            <i class='feather icon-x mr-25'></i>
                            <span class="d-sm-inline">RESET</span>
                        </button>
                        <button type="submit" class="btn-send btn btn-primary btn-glow" id="tombolSave">
                            <i class='feather icon-play mr-25'></i> <span class="d-sm-inline">SIMPAN</span>
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('private/js/myscriptpost.js')}}"></script>