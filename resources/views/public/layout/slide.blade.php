 @section('slide')
     <style>
         .carousel-inner img {
             width: 100%;
             height: 30em;
             object-fit: fill;
         }
     </style>
     <main>
         <div class="container">
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                     @foreach ($getRightData['resultSlide'] as $key => $slide)
                         <li data-target="#myCarousel" data-slide-to="{{ $key }}"
                             {{ $key == 0 ? 'class=active' : '' }}></li>
                     @endforeach
                 </ol>
                 <div class="carousel-inner" style="box-shadow: 1px 1px 1px 1px;">
                     @foreach ($getRightData['resultSlide'] as $key => $slide)
                         <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                             <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[{{ $slide->id_slide }}]"
                                 title="" data-rel="photoslide{{ $slide->id_slide }}"
                                 href="{{ asset('images/gambar_slide/' . $slide->gambar_slide) }}">
                                 <img src="{{ asset('images/gambar_slide/' . $slide->gambar_slide) }}" alt="#"
                                     class="img-{{ $slide->id_slide }}">
                             </a>
                         </div>
                     @endforeach
                 </div>
                 <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                 </a>
                 <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                 </a>
             </div>


             <link rel="stylesheet" type="text/css"
                 href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


             <div class="card mt-3">
                 <div class="owl-carousel owl-theme mt-3">

                     @foreach ($getRightData['resultLinkHeader'] as $keys => $link)
                         <div class="col-lg ttm-box-col-wrapper">
                             <div class="featured-imagebox featured-imagebox-portfolio style1">
                                 <div class="featured-thumbnail">
                                     <img class="img-thumbnail rounded"
                                         style="width:150px;height: 120px;box-shadow: 1px 2px 2px 1px;"
                                         src="{{ asset('upload-data/link-header/' . $link->gambar_link) }}" alt="image">
                                 </div>
                                 <div class="ttm-box-view-overlay">
                                     <div class="featured-iconbox ttm-media-link">
                                         <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                             title="" data-rel="prettyPhoto"
                                             href="{{ asset('upload-data/link-header/' . $link->gambar_link) }}"><i
                                                 class="ti ti-image"></i></a>
                                         <a href="{{ $link->link_header }}" target="_blank" class="ttm_link"><i
                                                 class="ti ti-link"></i></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>



             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
             <script>
                 $(document).ready(function() {
                     $('.owl-carousel').owlCarousel({
                         loop: true,
                         margin: 0,
                         nav: false,
                         autoplay: true,
                         autoplayTimeout: 3000,
                         center: true,
                         responsive: {
                             0: {
                                 items: 1
                             },
                             300: {
                                 items: 3
                             },
                             700: {
                                 items: 5
                             }
                         }
                     });
                 });
             </script>
         </div>


     </main>
 @endsection('slide')
