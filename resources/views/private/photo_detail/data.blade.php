<div class="card">
    <div class="row">


        @foreach ($result as $ddresult)
        <div class="col-sm-4 mb-1">
            <p>
                <a href="#" class="btn btn-sm btn-danger pull-right" id="tombol-hapus" data-url="{{ route('photodetail.destroy',['photodetail' => $ddresult->id_galeri_photo_detail,'myReload' =>'slideShowData'])}}" title="Hapus Data" style="margin-left: 5px;">
                    <i class="fa fa-trash"></i>
                </a>
            </p>
            <a href="">
                <img src="{{asset('images/galeri_photo/'.$ddresult->gambar_galeri_photo)}}" class="img-thumbnail" style="height: 170px; width: 370px;" title="">
            </a>
        </div>
        @endforeach
        @if (count($result) ==0)
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <strong>Data Kosong</strong>
            </div>
        </div>
        @endif

    </div>
</div>