@extends('private.layout.main')
@section('isi')
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

        <form action="{{ route('post.store') }}" class="form form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card ml-1 border-primary border-darken-1">
                        <div class="card-body">


                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="summary-ckeditor" name="post_content"></textarea>
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

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('summary-ckeditor', {
                filebrowserUploadUrl: "{{route('post.uploadImage', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        </script>
        @endsection