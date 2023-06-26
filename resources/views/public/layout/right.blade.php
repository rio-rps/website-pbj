 @section('right')
     <!-- <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             KEPALA BIRO
         </div>
         <div class="ttm-pf-single-detail-box">
             <img src="{{ asset('images/logo/avatar.jpg') }}" class="img-thumbnail" style="height: 270px; width: 100%;margin-top:-20px">
             <ul class="ttm-pf-detailbox-list">
                 <li><i class="fa fa-user"></i><span> John Amanda</span></li>
                 <li><i class="fa fa-vcard"></i><span> 197792123321003212 </span></li>
             </ul>
         </div>

     </div> -->
     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             KATEGORI
         </div>
         <ul class="list-group">
             @foreach ($getRightData['kategori'] as $dt)
                 <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="{{ route('jenis', ['slug' => $dt->slug_kategori]) }}"> » {{ $dt->nm_kategori }}</a>
                     <span class="badge badge-secondary badge-pill">{{ $dt->jumlahCount }}</span>
                 </li>
             @endforeach
         </ul>
     </div>

     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white mb-20">
             TERPOPULER
         </div>
         <ul class="widget-post ttm-recent-post-list mb-20">
             @foreach ($getRightData['populer'] as $dt)
                 <li>
                     <a href="{{ route('postdetail', ['slug' => $dt->slug_title]) }}"><img
                             src="{{ asset('images/thumbnail/' . $dt->post_thumbnail) }}" alt="post-img"></a>
                     <a href="{{ route('postdetail', ['slug' => $dt->slug_title]) }}"
                         style="font-size:11px;">{{ Str::limit($dt->post_title, 57) }}</a>
                     <span class="post-date">
                         <i class="fa fa-calendar"></i> {{ cek_ddmmyy_v3($dt->tgl_terbit) }} |
                         <i class="fa fa-eye"></i>{{ $dt->j_post_histori_count_count }}
                     </span>
                 </li>
             @endforeach


         </ul>
     </div>


     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             LINK TERKAIT
         </div>
         <ul class="list-group">
             @foreach ($getRightData['linkTerkait'] as $dt)
                 <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="{{ $dt->link_situs }}" target="blank">
                         » {{ $dt->nm_situs }}
                     </a>
                 </li>
             @endforeach
         </ul>
     </div>

     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             ARSIP
         </div>
         <ul class="list-group">
             @foreach ($getRightData['arsip'] as $dt)
                 <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="{{ route('postarsip', ['tahun' => $dt->year, 'bulan' => $dt->month]) }}">
                         » {{ cek_month_v1($dt->month) }} {{ $dt->year }}
                     </a>
                     <span class="badge badge-secondary badge-pill">{{ $dt->count }}</span>
                 </li>
             @endforeach
         </ul>
     </div>

     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             PENGUNJUNG WEBSITE
         </div>
         <ul class="list-group">
             <li class="list-group-item d-flex justify-content-between align-items-center">
                 <a href="#">
                     <i class="fa fa-desktop"></i> Total Hari Ini
                 </a>
                 <span class="badge badge-secondary badge-pill">{{ $getRightData['visitor']['visitor_today'] }}
                     orang</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-center">
                 <a href="#">
                     <i class="fa fa-desktop"></i> Total Bulan Ini
                 </a>
                 <span class="badge badge-secondary badge-pill">{{ $getRightData['visitor']['visitor_month'] }}
                     orang</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-center">
                 <a href="#">
                     <i class="fa fa-desktop"></i> Total Seluruh
                 </a>
                 <span class="badge badge-secondary badge-pill">{{ $getRightData['visitor']['visitor_all'] }} orang</span>
             </li>
         </ul>
     </div>

     <style>
         .carousel-inners {
             overflow: hidden;
         }

         .carousel-inners img {
             width: 100%;
             height: 14em;
             object-fit: fill;
         }

         .card,
         #carouselExampleControls {
             overflow: hidden;
         }
     </style>
     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             GALERI PHOTO
         </div>
         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
             <div class="carousel-inners">
                 @foreach ($getRightData['resultPhoto'] as $key => $photo)
                     <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                         <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[{{ $photo->id_galeri_photo_detail }}]"
                             title="" data-rel="photoslide{{ $photo->id_galeri_photo_detail }}"
                             href="{{ asset('images/galeri_photo/' . $photo->gambar_galeri_photo) }}">
                             <img src="{{ asset('images/galeri_photo/' . $photo->gambar_galeri_photo) }}"
                                 alt="{{ $photo->nm_galeri_photo }}" class="img-{{ $photo->id_galeri_photo_detail }}">
                         </a>
                     </div>
                 @endforeach
             </div>
             <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>
     </div>

     <div class="card mb-35">
         <div class="card-header ttm-bgcolor-skincolor text-white">
             GALERI VIDEO
         </div>
         <div id="video" class="carousel slide" data-ride="carousel">
             <div class="carousel-inners">
                 @foreach ($getRightData['resultVideo'] as $key => $video)
                     <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                         <iframe style="height: 170px; width: 100%;" class="img-thumbnail"
                             src=" https://www.youtube.com/embed/{{ getYoutubeVideoID($video->link_video) }}"
                             frameborder="0"
                             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                             allowfullscreen></iframe>
                     </div>
                 @endforeach
             </div>
             <a class="carousel-control-prev" href="#video" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#video" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>
     </div>
 @endsection('right')
