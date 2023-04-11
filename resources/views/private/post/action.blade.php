<center>
    <div class="btn-icon-list btn-list">
        <a class="btn btn-sm btn-success" href="{{ route('post.edit',$model->slug_title)}}" title="Edit Data"><i class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-sm btn-info" id="tombol-form-modal" data-url="{{ route('post.editstatus',$model->post_kd)}}" title="Edit Status"><i class="fa fa-retweet"></i></button>
        <form method="POST" action="{{ route('post.destroy', $model->post_kd) }}" class="formDelete" style="display: inline">
            @csrf
          <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-sm btn-danger" id="tombolDelete">
                <i class="fa fa-trash"></i>  
            </button>
        </form>
    </div>
</center>