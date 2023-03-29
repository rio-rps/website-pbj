@section('content')
<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $title }}
    </div>
</div>

<div class="card">
    <div class="row">


        @foreach ($result as $ddresult)
        <div class="col-sm-4 mb-1">
            <a class="ttm_prettyphoto ttm_image" href="{{ asset('images/galeri_photo/' . $ddresult->gambar_galeri_photo) }}">
                <img src="{{asset('images/galeri_photo/'.$ddresult->gambar_galeri_photo)}}" class="img-thumbnail" style="height: 170px; width: 370px;" title="">
            </a>
        </div>
        @endforeach
        @if (count($result) ==0)
        <div class="container">
            <div class="bs-callout-danger callout-border-left callout-bordered mt-1 p-1">
                <h5 class="danger">Data Kosong !</h5>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection