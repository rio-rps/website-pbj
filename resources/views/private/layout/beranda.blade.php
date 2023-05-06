@extends('private.layout.main')
@section('isi')
<style>
    /* table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
        font-size: 14px;
    }

    th,
    td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: left;
    }

    th {
        font-weight: bold;
    }

    td:first-child {
        width: 20%;
    }

    td:nth-child(2) {
        width: 1%;
    }

    td:last-child {
        width: 79%;
    } */
</style>
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Stats -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>All Post</h5>
                                <h5 class="text-bold-400 mb-0"><i class="fa fa-newspaper-o white"></i> {{ count($allPost) }} post</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 bg-gradient-x-success white media-body">
                                <h5>Read Today's Post</h5>
                                <h5 class="text-bold-400 mb-0"><i class="fa fa-eye  white"></i> {{ $read_post_today }} read post</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 bg-gradient-x-danger white media-body">
                                <h5>Today's Web Visitors</h5>
                                <h5 class="text-bold-400 mb-0"> <i class="fa fa-user white"></i> {{ $visitor_today }} visitor</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 bg-gradient-x-warning white media-body">
                                <h5>Log-in Today</h5>
                                <h5 class="text-bold-400 mb-0"><i class="fa fa-unlock white"></i> {{ $count_login }} login</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/ Stats -->
        <!--Product sale & buyers -->
        <div class="row match-height">
            <div class="col-xl-8 col-lg-12">
                <div class="card" style="height: 402.817px;">
                    <div class="card-header   text-white bg-primary ">
                        <h4 class="card-title"><i class="fa fa-newspaper-o"></i> All Post</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive mt-1">
                            <table id="myTable" class="table table-striped table-bordered zero-configuration " style="width:100%; font-size: 10px;">
                                <thead>
                                    <tr>
                                        <th width=" 1%">No</th>
                                        <th>POST</th>
                                        <th width="4%" align="center">STATUS</th>
                                        <th width="1%" align="center">JUMLAH VIEW</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($allPost as $rAllPost)
                                    <tr>
                                        <td align="center">{{$loop->iteration}}</td>
                                        <td>{{ $rAllPost->post_title }}</td>
                                        <td align="center">@php
                                            if ($rAllPost->post_status == 1) {
                                            $badge = "badge-secondary";
                                            } else if ($rAllPost->post_status == 2) {
                                            $badge = "badge-danger";
                                            }
                                            echo "<span class='badge " . $badge . "'>" . cekStatusPost($rAllPost->post_status) . "</span>";
                                            @endphp </td>
                                        <td align="center">{{ $rAllPost->j_post_histori_count_count }} view</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12">
                <div class="bs-callout-primary callout-border-left p-1 mb-2">
                    <a href="{{route('datapengaduan.index')}}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-eye"></i> More</a>
                    <strong><i class="fa fa-file-o"></i> PENGADUAN</strong>
                    <hr>
                    <table style="font-weight:550">
                        <tr>
                            <td>All</td>
                            <td width="1%">:</td>
                            <td> {{ $pengaduan_all }} data</td>
                        </tr>
                        <tr>
                            <td>This Month</td>
                            <td>:</td>
                            <td> {{ $pengaduan_month }} data</td>
                        </tr>
                        <tr>
                            <td>Today</td>
                            <td>:</td>
                            <td> {{ $pengaduan_today }} data</td>
                        </tr>
                        <tr>
                            <td colspan="3">

                            </td>
                        </tr>
                    </table>
                </div>

                <div class="bs-callout-primary callout-border-left p-1">
                    <a href="{{route('datakritiksaran.index')}}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-eye"></i> More</a>
                    <strong><i class="fa fa-file-o"></i> KRITIK DAN SARAN</strong>
                    <hr>
                    <table style="font-weight:550">
                        <tr>
                            <td>All</td>
                            <td width="1%">:</td>
                            <td> {{ $kritikSaran_all }} data</td>
                        </tr>
                        <tr>
                            <td>This Month</td>
                            <td>:</td>
                            <td> {{ $kritikSaran_month }} data</td>
                        </tr>
                        <tr>
                            <td>Today</td>
                            <td>:</td>
                            <td> {{ $kritikSaran_today }} data</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection