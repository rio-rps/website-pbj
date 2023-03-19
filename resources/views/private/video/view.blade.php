@extends('private.layout.main')
@section('isi')
<style type="text/css">
    img {
        position: relative;
        z-index: 1;
        top: 0px;
    }

    p {
        position: absolute;
        top: 5px;
        text-align: right;
        z-index: 2;
        color: #fff;
    }
</style>


<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><b>{{ $title }}</b></h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a href="javascript:void(0)" class="btn btn-primary" id="tombol-form-modal" data-url="{{ route('video.create') }}"><i class="feather icon-plus-square"></i> Tambah Data</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="col-md-12">

            <!-- <div id="slideShowData"></div> -->
            <div class="view" style="display:none;"></div>
        </div>
    </div>
</div>

<div class="viewModal" style="display:none;"></div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        slideShowData();
    });

    function slideShowData() {
        $.ajax({
            type: 'GET',
            url: "{{ url('video/show') }}",
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