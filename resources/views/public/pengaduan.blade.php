@section('content')


<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $title }}
    </div>
</div>
<div class="table-responsive">

    <div class="modal-content">
        <form action="{{route('storePengaduan')}}" class="formDataMultipart" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Nama Pelapor <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="nm_pelapor" maxlength="225">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Email <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="email" maxlength="225">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Nomor HP <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <input type="text" class="form-control border-secondary" name="no_hp" maxlength="12">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Jenis Pengaduan <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <select name="id_kategori_pengaduan" class="form-control  border-secondary">
                                <option value="" selected> -- Pilih --</option>
                                @foreach ($resultKatPeng as $result)
                                <option value="{{ $result->id_kategori_pengaduan }}">{{ $result->nm_kategori_pengaduan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Tanggal Kejadian <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <input type="date" class="form-control border-secondary" name="tgl_kejadian">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Lokasi Kejadian <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="lokasi_kejadian">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Oknum yang terlibat <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control border-secondary" name="oknum_yang_terlibat">
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Uraian <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea name="uraian" class="form-control border-secondary" cols="20" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label border-bottom">Upload Bukti Pendukung <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="file" class="form-control border-secondary" name="upload_bukti_dukung" id="upload_bukti_dukung" accept="image/jpg, image/jpeg, image/png">
                            <span class="badge badge-danger">JPEG, JPG, PNG, Max 2048 Mb</span>
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