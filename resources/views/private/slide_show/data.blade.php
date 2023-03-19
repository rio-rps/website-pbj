<div class="card">
    <div class="row">
        @foreach ($result as $ddresult)
        <div class="col-sm-4 mb-1">
            <p>
                <a href="#"><span class="badge bg-blue-grey pull-right" style="margin-left: 5px;">{{status_actived($ddresult->status_actived) }}</span></a>
                <a href="#" class="btn btn-sm btn-danger pull-right" id="tombol-hapus" data-url="{{ route('slideshow.destroy',['slideshow' => $ddresult->id_slide,'myReload' =>'slideShowData'])}}" title="Hapus Data" style="margin-left: 5px;">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="#" class="btn btn-sm btn-success pull-right" id="tombol-form-modal" data-url="{{route('slideshow.edit',$ddresult->id_slide)}}" title="Edit Status" style="margin-left: 5px;">
                    <i class="fa fa-edit"></i>
                </a>
            </p>
            <a href="#" data-toggle="modal" data-target="#modalGambar" data-id="{{asset('images/gambar_slide/'.$ddresult->gambar_slide)}}">
                <img src="{{asset('images/gambar_slide/'.$ddresult->gambar_slide)}}" class="img-thumbnail" style="height: 170px; width: 370px;" title="">
            </a>
        </div>
        @endforeach
        @if (count($result) ==0)
        <div class="container">
            <div class="bs-callout-danger callout-border-left callout-bordered mt-1 p-1">
                <h5 class="danger">Data Kosong !</h5>
            </div>
        </div>
        @endif

    </div>
</div>



<div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="viewGambar"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", "[data-toggle='modal']", function() {
        var gambar = $(this).data('id');
        $('#viewGambar').html("<img src='" + gambar + "' class='img-fluid'>");
    });
</script>