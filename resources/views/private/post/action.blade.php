<center>
    <div class="btn-icon-list btn-list">
        <a class="btn btn-sm btn-success" href="{{ route('post.edit',$model->slug_title)}}" title="Edit Data"><i class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-sm btn-info" id="tombol-form-modal" data-url="{{ route('post.editstatus',$model->post_kd)}}" title="Edit Status"><i class="fa fa-retweet"></i></button>
        <button type="button" class="btn btn-sm btn-danger" id="tombol-hapus" data-url="{{ route('post.destroy',$model->post_kd)}}" title="Hapus Data"><i class="fa fa-trash"></i></button>
    </div>
</center>