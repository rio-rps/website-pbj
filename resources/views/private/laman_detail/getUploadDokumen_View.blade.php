@extends('private.layout.main')
@section('isi')


<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><b>{{ $title }}</b></h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a href="javascript:void(0)" class="btn btn-primary" id="tombol-form-modal" data-url="{{ route('lamandetail.createUploadDokumen',['id_laman'=>$id_laman]) }}"><i class="feather icon-plus-square"></i> Tambah Data</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered zero-configuration" style="width:100%">
                    <thead>
                        <tr>
                            <th width=" 1%">No</th>
                            <th>Nama Dok</th>
                            <th>Keterangan</th>
                            <th>Tahun Dok</th>
                            <th>Tgl Upload</th>
                            <th width="20%" align="center">Action</th>
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
            ajax: "{{route('lamandetail.showUploadDokumen',$id_laman)}}",
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
                    data: 'nm_dokumen',
                    name: 'nm_dokumen'
                },
                {
                    data: 'ket_dokumen',
                    name: 'ket_dokumen'
                },
                {
                    className: 'text-center',
                    data: 'tahun_dokumen',
                    name: 'tahun_dokumen'
                },
                {
                    data: 'tgl',
                    name: 'tgl'
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