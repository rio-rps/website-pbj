<div class="modal fade" id="modalFormData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('linkterkait.store') }}" class="formData" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label border-bottom">Nama Situs</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nm_situs" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label border-bottom">Link Situs</label>
                            <div class="col-md-9">
                                <input class="form-control" type="url" name="link_situs" placeholder="http://">
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
<script src="{{ asset('/') }}private/js/myscriptpost.js"></script>