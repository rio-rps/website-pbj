@section('content')
<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $title }}
    </div>
</div>
<div class="card">
    <div class="row">

        @foreach ($result as $ddresult)

        <div class="col-md-6 col-lg-4">
            <div class="featured-imagebox featured-imagebox-services style1 mb-30">
                <div class="featured-thumbnail">
                    <iframe style="height: 170px; width: 370px;" class="img-thumbnail" src="https://www.youtube.com/embed/{{ getYoutubeVideoID($ddresult->link_video) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@if (count($result) ==0)
<div class="alert alert-danger" role="alert">
    Data Kosong !
</div>
@endif
@endsection