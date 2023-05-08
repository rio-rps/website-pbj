@section('content')

<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $title }}
    </div>
</div>
<div class="table-responsive">
    <table class="table table-light">
        <thead>
            <tr>
                <th align="center" width='1%'>No</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Jumlah Photo</th>
                <th align="center">Aksi</th>
            </tr>
        </thead>

        <body>
            @foreach ($result as $dd)
            <tr>
                <td align="center">{{ $loop->index+1}}</td>
                <td>{{ $dd->nm_galeri_photo}}</td>
                <td>{{ cek_ddmmyy_v1($dd->tgl_galeri_photo)}}</td>
                <td>{{ $dd->jumlahCount }} Photo</td>
                <td width='1%'><a href="{{route('galeriphotodetail',['slug'=>$dd->slug_galeri_photo])}}" class="fa fa-eye btn btn-danger btn-sm">Lihat</a></td>
            </tr>
            @endforeach
        </body>
    </table>
</div>
@if (count($result) ==0)
<div class="alert alert-danger" role="alert">
    Data Kosong !
</div>
@endif
@endsection