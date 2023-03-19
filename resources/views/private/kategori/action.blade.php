<center>
    <div class="btn-icon-list btn-list">
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('kategori.edit',$model->id_kategori)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-sm btn-danger" id="tombol-hapus" data-url="{{ route('kategori.destroy',$model->id_kategori)}}" title="Hapus Data"><i class="fa fa-trash"></i></button>
    </div>
</center>