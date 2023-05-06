<center>
    <div class="btn-icon-list btn-list">
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('datakritiksaran.detail',$model->id_kritik_saran )}}" title="Lihat Data"><i class="fa fa-eye"></i></button>
        <form method="POST" action="{{ route('datakritiksaran.destroy', $model->id_kritik_saran) }}" class="formDelete" style="display: inline">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-sm btn-danger" id="tombolDelete">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
</center>