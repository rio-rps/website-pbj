@extends('private.layout.main')
@section('isi')

<div class="card">
    <div class="card-header" style="margin-bottom:-20px;">
        <h4 class="card-title"><b>{{ $title }}</b></h4>
    </div>
    <hr>
    <div class="col-md-12 mb-1">
        <!-- <a class="btn btn-sm  btn-danger" href="{{ route('laman.index')}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> -->
        <a class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{ route('lamandetail.getUploadGambar_ViewFormAddModal',$id_laman) }}" title="Upload Data Gambar"><i class="fa fa-edit"></i> Tambah Gambar</a>
    </div>
    <div class="col-md-12" style="max-width:100%;">
        <div id="container">
            <div id="editor">
                <div class="view" style="display:none;"></div>
            </div>
        </div>
    </div>
</div>
<div class="viewModal" style="display:none;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lamanGambar();
    });

    function lamanGambar() {
        var id_laman = '{{$id_laman}}';
        $.ajax({
            type: 'GET',
            url: "{{ route('lamandetail.showUploadGambar',$id_laman) }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#loading-spinner').removeClass('d-none');
            },
            complete: function() {
                $('#loading-spinner').addClass('d-none');
            },
            success: function(response) {
                $('.view').html(response).show();
            },
            error: function(xhr, ajaxOptons, throwError) {
                alert(xhr.status + '\n' + throwError);
            }
        });
    }
</script>

@endsection