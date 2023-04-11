@php
use Illuminate\Support\Facades\Crypt;
@endphp
<center>
    <div class="btn-icon-list btn-list">
        <a href="{{ route('photodetail.index', ['p'=>$model->slug_galeri_photo])}}" class="btn btn-sm btn-secondary" title="Tambah Data Photo"><i class="fa fa-plus"></i></a>
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('photo.edit',$model->id_galeri_photo)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <form method="POST" action="{{ route('photo.destroy', $model->id_galeri_photo) }}" class="formDelete" style="display: inline">
            @csrf
          <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-sm btn-danger" id="tombolDelete">
                <i class="fa fa-trash"></i>  
            </button>
        </form>
    </div>
</center>