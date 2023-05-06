@section('content')

<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $title }}
    </div>
</div>
@if ($jenis_laman==1)
{!!$row->isi_laman !!}
@elseif ($jenis_laman==2)


@foreach ($row as $result)
<div class="card mb-2">
    <div class="card-body">
        <div class="media">
            <div class="media-body">


                <h5 class="package-title"><a href="#">{{ $result->nm_dokumen }}</a>
                    <a class=" btn btn-primary btn-sm pull-right" target="_blank" href="{{asset('upload-data/dokumen_laman/'.$result->file_dokumen)}}"><i class="fa fa-download"></i> Download</a>
                </h5>
                <div class="text-muted text-small">{{ $result->ket_dokumen }}</div>
                <span class="badge badge-info" style="font-size: 10px;">Upload Date : {{ date("d-m-Y", strtotime($result->created_at))}} </span>
            </div>
        </div>
    </div>
</div>
@endforeach
@if (count($row) ==0)
<div class="alert alert-danger" role="alert">
    Data Kosong !
</div>
@endif



@elseif ($jenis_laman==3)

@foreach ($row as $ddresult)
<div class="d-flex align-items-center bs-callout-info callout-border-left callout-transparent mt-1 p-1">
    <span style="font-weight:bold;">{{ $ddresult->nm_gambar }}
        <a href="{{asset('upload-data/gambar_laman/'.$ddresult->file_gambar)}}" target="_blank" class="badge badge-primary"><i class="fa fa-download"></i> Download</a>
    </span>
</div>
<img src="{{asset('upload-data/gambar_laman/'.$ddresult->file_gambar)}}" class="img-thumbnail image" style="height: 870px; width: 100%;">
<hr>
@endforeach
@if (count($row) ==0)
<div class="alert alert-danger" role="alert">
    Data Kosong !
</div>
@endif


@elseif ($jenis_laman==4)
@elseif ($jenis_laman==5)

@endif

@endsection