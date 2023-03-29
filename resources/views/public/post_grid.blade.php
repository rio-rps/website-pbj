 @section('content')
 <style>
 	.postImg img {
 		width: 100%;
 		height: 15em;
 	}
 </style>
 @if (isset($title))
 <div class="coupon_toggle">
 	<div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
 		{{ $title }}
 	</div>
 </div>
 @endif
 <div class="row">
 	@foreach ($posts as $result)
 	<div class="col-md-6 col-lg-6">
 		<div class="featured-imagebox featured-imagebox-blog style2 mb-20">
 			<div class="featured-thumbnail postImg">
 				<a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[{{$result->post_kd}}]" title="" data-rel="photoslide{{$result->post_kd}}" href="{{ asset('images/thumbnail/' . $result->post_thumbnail) }}">
 					<img src="{{ asset('images/thumbnail/' . $result->post_thumbnail) }}" alt="{{ $result->post_title }}" class="img-fluid img-{{$result->post_kd}}" title="{{$result->post_title}}">
 				</a>
 			</div>
 			<div class="featured-content">
 				<div class="ttm-box-post-date">
 					<span class="ttm-entry-date">
 						<time class="entry-date" datetime="{{$result->tgl_terbit}}" style="font-size:10px;">{{ $result->day }}/{{ $result->year }}<span class="entry-month entry-year" style="font-size:10px;">{{ cek_month_v1($result->month) }}</span></time>
 					</span>
 				</div>
 				<div class="featured-title">
 					<h6><a href="{{route('postdetail',['slug'=>$result->slug_title])}}">{{ Str::limit($result->post_title,100) }}</a></h6>
 				</div>
 				<span class="ttm-meta-line" style="font-size:12px;">
 					<span class="badge badge-pill badge-secondary"><i class="fa fa-eye"></i> {{ $result->j_post_histori_count_count }} </span>
 					@foreach ($result->JPostKategoriRelations as $kategori)
 					<span class="badge badge-pill badge-secondary"><i class="fa fa-folder-open-o"></i> {{ $kategori->JKategori->nm_kategori }}</span>
 					@endforeach
 				</span>

 				<div class="featured-desc" style="font-size:12px;">
 					<p>{!! Str::limit(preg_replace('/<[^>]*>/', '', $result->post_content), 250) !!}</p>
 				</div>
 				<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20" href="{{route('postdetail',['slug'=>$result->slug_title])}}">Read More <i class="ti ti-angle-double-right"></i></a>
 			</div>
 		</div>
 	</div>
 	@endforeach

 </div>
 <div class="row">
 	<div class="col-md-12 text-center">
 		<div class="d-flex justify-content-center mt-4">
 			{{ $posts->links('pagination::bootstrap-4') }}
 			<!-- {{ $posts->appends(request()->input())->links() }} -->
 		</div>
 		<!-- <div class="ttm-pagination">
 			<span class="page-numbers current">1</span>
 			<a class="page-numbers" href="#">2</a>
 			<a class="next page-numbers" href="#"><i class="ti ti-arrow-right"></i></a>
 		</div> -->
 	</div>
 </div>

 @endsection('content')