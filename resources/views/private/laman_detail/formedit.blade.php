@extends('private.layout.main')
@section('isi')

<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }

    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }

    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>

<body>
    <div class="card">
        <div class="card-header" style="margin-bottom:-20px;">
            <h4 class="card-title"><b>{{ $title }}</b></h4>
        </div>
        <hr>
        <div class="col-md-12 mb-1">

            <div class="container">
                <form action="{{route('lamandetail.update',$id)}}" method="POST">
                    <input type="hidden" name="slug" value="{{$row->slug_laman}}">
                    @csrf
                    @method('PUT')
                    <textarea name="isi_laman" id="editor">{!! $row->isi_laman !!}</textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="window.history.back();"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>

                        <button type="submit" class="btn-send btn btn-primary btn-glow" id="tombolSave">
                            <i class='feather icon-play mr-25'></i> <span class="d-sm-inline">SIMPAN</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/') }}add-plugins/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/') }}add-plugins/ckeditor/script.js"></script>
</body>
@endsection