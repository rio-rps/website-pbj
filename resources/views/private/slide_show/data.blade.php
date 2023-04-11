<style>
.image-container {
  position: relative;
  display: inline-block;
}

.button {
  position: absolute;
  top: 10%;
  left: 6%;
  transform: translate(-50%, -50%);
  z-index: 1;
}

.image {
  z-index: 0;
}
</style>

<div class="card">
    <div class="row">
        @foreach ($result as $ddresult)
        <div class="col-sm-4 mb-1"> 
            <div class="image-container">
            <a href="#"><span class="badge bg-blue-grey pull-right button" style="margin-left: 90px;">{{status_actived($ddresult->status_actived) }}</span></a>
            
            <form method="POST" action="{{ route('slideshow.destroy',['slideshow' => $ddresult->id_slide,'myReload' =>'slideShowData'])}}" class="formDelete button" >
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-sm btn-danger pull-right" id="tombolDelete"  title="Hapus Data" style="margin-left: 70px;">
                        <i class="fa fa-trash"></i>  
                    </button>
                </form>   
                  
                <a href="#" class="btn btn-sm btn-success pull-right button" id="tombol-form-modal" data-url="{{route('slideshow.edit',$ddresult->id_slide)}}" title="Edit Status" style="margin-left: 5px;">
                    <i class="fa fa-edit"></i>
                </a>
            <a href="#" data-toggle="modal" data-target="#modalGambar" data-id="{{asset('images/gambar_slide/'.$ddresult->gambar_slide)}}">
                <img src="{{asset('images/gambar_slide/'.$ddresult->gambar_slide)}}" class="img-thumbnail image" style="height: 170px; width: 370px;" title="">
            </a>
            </div>
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
