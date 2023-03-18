<center>
    <div class="btn-icon-list btn-list">
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('linkterkait.edit',$model->id_link)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-sm btn-danger" id="tombol-hapus" data-url="{{ route('linkterkait.destroy',$model->id_link)}}" title="Hapus Data"><i class="fa fa-trash"></i></button>
    </div>
</center>