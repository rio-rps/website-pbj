@extends('private.layout.main')
@section('isi')


<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><b>{{ $title }}</b></h4>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered zero-configuration" style="width:100%">
                    <thead>
                        <tr>
                            <th width=" 1%">No</th>
                            <th>Tgl Kirim</th>
                            <th>Nama Pelapor</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Jenis Pengaduan</th>
                            <th>Lokasi Kejadian</th>
                            <th width="10%" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="viewModal" style="display:none;"></div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        myTable = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('pengaduan/show')}}",
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
                    data: 'tgl_kirim',
                    name: 'tgl_kirim'
                },
                {
                    data: 'nm_pelapor',
                    name: 'nm_pelapor'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'katPengaduan',
                    name: 'katPengaduan'
                },
                {
                    data: 'lokasi_kejadian',
                    name: 'lokasi_kejadian'
                },
                {
                    data: 'action',
                    name: 'action',
                }
            ]
        });
    });
</script>
@endsection