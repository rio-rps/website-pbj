@section('content')

<div class="coupon_toggle">
    <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
        {{ $row->nm_laman }}
    </div>
</div>
{!!$row->isi_laman !!}
@endsection