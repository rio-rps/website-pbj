<center>
    <div class="btn-icon-list btn-list">
        <a class="btn btn-sm btn-primary" href="{{$model->link_video}}" target="blank" title="Lihat Video"><i class="fa fa-youtube-play"></i></a>
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('video.edit',$model->id_galeri_video)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <form method="POST" action="{{ route('video.destroy', $model->id_galeri_video) }}" class="formDelete" style="display: inline">
            @csrf
          <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-sm btn-danger" id="tombolDelete">
                <i class="fa fa-trash"></i>  
            </button>
        </form>
    </div>
</center>