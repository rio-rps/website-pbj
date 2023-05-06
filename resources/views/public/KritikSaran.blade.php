@section('content')


<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $title }}
    </div>
</div>
<div class="table-responsive">

    <div class="modal-content">
        <form action="{{route('storeKritikSaran')}}" class="formDataMultipart" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="nm_pengirim" maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Email <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="email_pengirim" maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Nomor HP <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <input type="text" class="form-control border-secondary" name="no_tlp_pengirim" maxlength="12">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Alamat <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="alamat_pengirim">
                        </div>
                    </div>
                </div>

                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Nilai Pelayanan Kami <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <select name="nilai_pelayanan" class="form-control  border-secondary">
                                <option value="" selected> -- Pilih --</option>
                                <option value="1">Buruk</option>
                                <option value="2">Cukup</option>
                                <option value="3">Baik</option>
                                <option value="4">Sangat Baik</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Uraian Kritik dan Saran <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea name="uraian_kritik_saran" class="form-control border-secondary" cols="20" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-send btn btn-primary btn-glow" id="tombolSave">
                        <i class='feather icon-play mr-25'></i> <span class="d-sm-inline">KIRIM</span>
                    </button>
                </div>
        </form>
    </div>
</div>
</div>
<script src="{{asset('add-plugins/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('private/js/myscriptpost.js')}}"></script>

@endsection