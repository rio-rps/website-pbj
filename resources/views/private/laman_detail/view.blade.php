@extends('private.layout.main')
@section('isi')

<style>
    #container {
        max-width: 80%;
    }

    img {
        max-width: 100%;
        max-height: auto;
    }
</style>

<div class="card">
    <div class="card-header" style="margin-bottom:-20px;">
        <h4 class="card-title"><b>{{ $title }}</b></h4>
    </div>
    <hr>
    <div class="col-md-12 mb-1">
        <!-- <a class="btn btn-sm  btn-danger" href="{{ route('laman.index')}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> -->
        <a class="btn btn-sm btn-success" href="{{ route('lamandetail.edit',$row->slug_laman)}}" title="Edit Data"><i class="fa fa-edit"></i> Edit Data</a> |
        <label><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{cek_date_ddmmyyyy_his_v1($row->updated_at)}}</label>
    </div>
    <div class="col-md-12" style="max-width:100%;">
        <div id="container">
            <div id="editor">
                {!!$row->isi_laman!!}
            </div>
        </div>
    </div>
</div>
@endsection