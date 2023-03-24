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
<div class="content-body">
    <div class="card">
        <div class="card-header" style="margin-bottom:-20px;">
            <h4 class="card-title"><b>{{ $title }}</b></h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger" href="{{route('post.index')}}"><i class="fa fa-arrow-circle-left"></i> </a></li>
                </ul>
            </div>
        </div>
        <hr>
        <form action="{{ route('post.store') }}" class="formDataMultipart" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card ml-1 border-primary border-darken-1">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label border-bottom">JUDUL</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="post_title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label border-bottom">ISI</label>
                                    <div class="col-md-12">
                                        <textarea name="post_content" id="editor"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card mb-1 mr-1 border-primary border-darken-1">
                        <div class="card-content">
                            <div class="p-1">
                                <h5 class="card-title" style="margin-bottom:-4px;"><b>Thumbnail</b></h5>
                                <hr>
                                <img src="{{asset('images/logo/thumbnail.png')}}" alt="thumbnail" id="thumbnail_preview" style="max-width:100%;max-height:100%;">
                                <input type="file" name="post_thumbnail" id="post_thumbnail" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1 mr-1 border-primary border-darken-1">
                        <div class="card-content">
                            <div class="p-1">
                                <h5 class="card-title" style="margin-bottom:-4px;"><b>Status</b></h5>
                                <hr>
                                <select name="post_status" class="form-control">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="1">Publish</option>
                                    <option value="2">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1 mr-1 border-primary border-darken-1">
                        <div class="card-content">
                            <div class="p-1">
                                <h5 class="card-title" style="margin-bottom:-4px;"><b>Kategori</b></h5>
                                <hr>
                                @foreach ($resultKategori as $kat)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="id_kategori[]" value="{{$kat->id_kategori}}" id="id_kategori"> {{ $kat->nm_kategori }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1 ">
                        <div class="card-content">
                            <button type="submit" class="btn-send btn btn-primary btn-glow" id="tombolSave">
                                <i class='feather icon-play mr-25'></i> <span class="d-sm-inline">SIMPAN</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('/')}}add-plugins/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/') }}private/js/myscriptpost.js"></script>
<script src="{{ asset('/') }}add-plugins/ckeditor/ckeditor.js"></script>
<script src="{{ asset('/') }}add-plugins/ckeditor/script.js"></script>
<script>
    $(document).ready(function() {
        // ketika user memilih file gambar
        $('#post_thumbnail').change(function() {
            let reader = new FileReader();
            reader.onload = function(event) {
                $('#thumbnail_preview').attr('src', event.target.result);
            };
            // membaca data gambar yang dipilih
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection