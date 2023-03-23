<center>
    <div class="btn-icon-list btn-list">
        <a class="btn btn-sm btn-primary" href="{{$model->link_video}}" target="blank" title="Lihat Video"><i class="fa fa-youtube-play"></i></a>
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('video.edit',$model->id_galeri_video)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-sm btn-danger" id="tombol-hapus" data-url="{{ route('video.destroy',$model->id_galeri_video)}}" title="Hapus Data"><i class="fa fa-trash"></i></button>
    </div>
</center>