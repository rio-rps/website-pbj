<div class="modal fade" id="modalFormData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('slideshow.store') }}" class="formDataMultipart" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label border-bottom">Upload Slide Show</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="gambar_slide" id="gambar_slide" accept="image/*">
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