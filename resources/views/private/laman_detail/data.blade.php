<!-- @extends('private.layout.main')
@section('isi')


<div class="card">
    <div class="card-header" style="margin-bottom:-20px;">
        <h4 class="card-title"><b>{{ $title }}</b></h4>
    </div>
    <hr>
    <div class="col-md-12 mb-1" id="viewData">
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-editor" data-url="{{ route('lamandetail.edit',$row->id_laman)}}" title="Edit Data"><i class="fa fa-edit"></i> Edit Data</button> |
        <label><i class="fa fa-calendar-check-o" aria-hidden="true"></i>12 Januari 2023 (12:11:00)</label>
    </div>
    <div class="col-md-12">
        <div class="view" style="display:none;"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // FORM GET MODAL INPUT DATA TYPE GET
        $(document).on('click', '#tombol-form-editor', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: url,
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
                    $('#viewData').hide();
                    $('.view').html(response).show();
                },
                error: function(xhr, ajaxOptons, throwError) {
                    alert(xhr.status + '\n' + throwError);
                }
            });
        });
    });
</script>

@endsection -->