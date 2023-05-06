@extends('private.layout.main')
@section('isi')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SELAMAT DATANG, </h5>
                </div>


                <div class="row">
                    <div class="col-md-8">
                        <div class="container-fluid">
                            <div class="card box-shadow-0  border-success bg-transparent">
                                <div class="card-body text-white bg-primary mb-2">
                                    <h4 class="card-title" style="margin-bottom:-10px;">
                                        <i class="fa fa-newspaper-o"></i> ALL POST
                                    </h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered zero-configuration" style="width:100%; font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th width=" 1%">No</th>
                                                <th>POST</th>
                                                <th width="1%" align="center">JUMLAH VIEW</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allPost as $rAllPost)
                                            <tr>
                                                <td align="center">{{$loop->iteration}}</td>
                                                <td>{{ $rAllPost->post_title }}</td>
                                                <td align="center">{{ $rAllPost->j_post_histori_count_count }} viewers</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="container-fluid">
                            <div class="card box-shadow-0  border-success bg-transparent">
                                <div class="card-body text-white bg-primary mb-2">
                                    <h4 class="card-title" style="margin-bottom:-10px;">
                                        <i class="fa fa-newspaper-o"></i> kategori post
                                    </h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered" style="width:100%;font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allKategori as $rAllKategori)
                                            <tr>
                                                <td align="center">{{$loop->iteration}}</td>
                                                <td>{{ $rAllKategori->nm_kategori }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection