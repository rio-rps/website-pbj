@extends('layout.main')
@section('isi')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendors/css/extensions/sweetalert2.min.css">
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>{{ $title }}</b></h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="#" class="btn btn-warning" onclick="refresh()"><i class="feather icon-refresh-cw"></i></a></li>
                            <li><a href="#" class="btn btn-primary" onclick="addData()"><i class="feather icon-plus-square"></i> Tambah Data</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered zero-configuration" style="width:100%">
                        <thead>
                            <tr>
                                <th width=" 1%">No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th width="10%" align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="viewmodal" style="display:none;"></div>
<script src="{{ asset('/') }}vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="{{ asset('/') }}js/scripts/modal/components-modal.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        myTable = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('pegawai/show')}}",
            // "data": null,
            // "class": "align-top",
            // "orderable": false,
            // "searchable": false,
            columns: [{
                    // "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "data": "no",
                    className: 'text-center',
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'nip_pegawai',
                    name: 'nip_pegawai'
                },
                {
                    data: 'nm_pegawai',
                    name: 'nm_pegawai'
                },
                {
                    data: 'action',
                    name: 'action',
                }
            ]
        });


    });

    function addData() {
        $.ajax({
            type: "GET",
            url: "{{ url('pegawai/create') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            //dataType: "json",
            beforeSend: function() {
                $('#loading-spinner').removeClass('d-none');
            },
            complete: function() {
                $('#loading-spinner').addClass('d-none');
            },
            success: function(response) {
                $('.viewmodal').html(response).show();
                $('#modalView').modal('show');
            },
            error: function(xhr, ajaxOptons, throwError) {
                alert(xhr.status + '\n' + throwError);
            }
        });

    }

    function editData(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('pegawai') }}" + '/' + id + '/edit',
            //dataType: "json",
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
                $('.viewmodal').html(response).show();
                $('#modalView').modal('show');
            },
            error: function(xhr, ajaxOptons, throwError) {
                alert(xhr.status + '\n' + throwError);
            }
        });
    }


    function deleteData(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ',
            text: "Data Akan dihapus ! ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('pegawai/destroy') }}",
                    data: {
                        id: id,
                        // _token: '{{ csrf_token() }}'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                    'Berhasil',
                                    response.success,
                                    'success'
                                )
                                .then((result) => {
                                    document.querySelector('.viewmodal').style.display = 'none';
                                    myTable.ajax.reload();


                                })
                        } else if (response.error) {
                            Swal.fire('Gagal', response.error, 'warning');
                        }
                    },
                    error: function(xhr, ajaxOptons, throwError) {
                        alert(xhr.status + '\n' + throwError);
                    }
                });

            }
        })
    }

    function refresh() {
        myTable.ajax.reload();
    }
</script>
@endsection