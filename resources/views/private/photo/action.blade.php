@php
use Illuminate\Support\Facades\Crypt;
@endphp
<center>
    <div class="btn-icon-list btn-list">
        <a href="{{ route('photodetail.index', ['p'=>$model->slug_galeri_photo])}}" class="btn btn-sm btn-secondary" title="Tambah Data Photo"><i class="fa fa-plus"></i></a>
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('photo.edit',$model->id_galeri_photo)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-sm btn-danger" id="tombol-hapus" data-url="{{ route('photo.destroy',$model->id_galeri_photo)}}" title="Hapus Data"><i class="fa fa-trash"></i></button>
    </div>
</center>