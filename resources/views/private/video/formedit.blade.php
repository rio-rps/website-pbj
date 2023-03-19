<div class="modal fade" id="modalFormData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('slideshow.update',$id) }}" class="formData" method="PUT">
                @csrf

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label border-bottom">Status Tampilkan Slide</label>
                        <div class="col-sm-6">
                            <select name="status_actived" class="form-control">
                                <option value="" {{ $row->status_actived == '' ? 'selected' : '' }}>--Pilih--</option>
                                <option value="1" {{ $row->status_actived == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="2" {{ $row->status_actived == 2 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
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