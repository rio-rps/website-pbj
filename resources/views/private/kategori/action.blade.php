<center>
    <div class="btn-icon-list btn-list">
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('kategori.edit',$model->id_kategori)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <form method="POST" action="{{ route('kategori.destroy', $model->id_kategori) }}" class="formDelete" style="display: inline">
            @csrf
          <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-sm btn-danger" id="tombolDelete">
                <i class="fa fa-trash"></i>  
            </button>
        </form>  
    </div>
</center>