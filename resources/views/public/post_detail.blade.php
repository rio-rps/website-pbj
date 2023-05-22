@section('content')
    <style>
        .thumbnailPost {
            width: 100%;
            height: 35em;
        }

        #container {
            max-width: 100%;
        }

        img {
            max-width: 100%;
            max-height: auto;
        }
    </style>

    <head>
        <title> {{ $title }}</title>
    </head>

    <body>
        <div class="coupon_toggle">
            <div class="coupon_code ttm-pf-single-detail-box" style="font-weight:bold;box-shadow:3px 3px 3px 0px;">
                {{ $title }}
            </div>
        </div>
        <article class="post ttm-blog-single">
            <div class="ttm-post-featured-wrapper">
                <div class="ttm-post-featured">
                    <img class="img-fluid thumbnailPost" src="{{ asset('images/thumbnail/' . $row->post_thumbnail) }}"
                        alt="post-01">
                </div>
                <div class="ttm-post-featured">
                    <div class="post-meta">
                        <span class="ttm-meta-line entry-date"><i class="fa fa-calendar"></i><time
                                class="entry-date published">{{ cek_date_ddmmyyyy_his_v1($row->tgl_terbit) }}</time></span>
                        <span class="ttm-meta-line" style="font-size:12px;">
                            <i class="fa fa-eye"></i> {{ $row->j_post_histori_count_count }}
                            | <i class="fa fa-folder-open-o"></i>
                            {{ implode(' | ',$row->JPostKategoriRelations->map(function ($kategori) {return $kategori->JKategori->nm_kategori;})->toArray()) }};
                        </span>
                    </div>

                </div>
            </div>
            <div class="ttm-blog-single-content">
                <div class="entry-content">
                    <div class="separator">
                        <div class="sep-line mt-15 mb-25"></div>
                    </div>
                    <div class="container">
                        {!! $row->post_content !!}
                    </div>
                </div>
            </div><!-- ttm-blog-classic-content end -->
        </article>
    </body>
@endsection
