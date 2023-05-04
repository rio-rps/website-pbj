<style>
    .image-container {
        /* position: relative;
        display: inline-block; */
    }

    .image {
        z-index: 0;
    }
</style>

<div class="card">
    <div class="row">
        @foreach ($result as $ddresult)
        <div class="col-sm-12 mb-1">
            <div class="image-container">
                <div class="d-flex align-items-center bs-callout-info callout-border-left callout-transparent mt-1 p-1">
                    <form method="POST" action="{{ route('lamandetail.destroyUploadGambar',['id_gambar' => $ddresult->id_gambar,'myReload' =>'lamanGambar'])}}" class="formDelete button">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-danger" id="tombolDelete" title="Hapus Data">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    &nbsp;
                    <a href="{{asset('upload-data/gambar_laman/'.$ddresult->file_gambar)}}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a>
                    <span class="ml-2">{{ $ddresult->nm_gambar }}</span>
                </div>
                <img src="{{asset('upload-data/gambar_laman/'.$ddresult->file_gambar)}}" class="img-thumbnail image" style="height: 870px; width: 100%;">
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