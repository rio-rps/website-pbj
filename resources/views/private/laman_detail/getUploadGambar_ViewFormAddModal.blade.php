<div class="modal fade" id="modalFormData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lamandetail.storeUploadGambar') }}" class="formDataMultipart" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_laman" value="{{$id_laman}}">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">Nama Gambar</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nm_gambar" maxlength="225">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">Upload Gambar</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="file_gambar" id="file_gambar" accept="image/*">
                                <span class="badge badge-danger pull-right">jpg, png, jpeg | max:10000 MB</span>
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