 @section('slide')
 <!-- <rs-module-wrap id="rev_slider_1_2_wrapper" data-source="gallery">
     <rs-module id="rev_slider_1_2" data-version="6.0.1" class="rev_slider_1_2_height">
         <rs-slides> 
             <rs-slide data-key="rs-5" data-title="Slide" data-thumb="https://via.placeholder.com/1920X650/888888.jpg" data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">
                 <img src="https://via.placeholder.com/1920X650/888888.jpg" title="banner-four.jpg" width="1920" height="651" class="rev-slidebg" data-no-retina>
             </rs-slide>
         </rs-slides>
     </rs-module>
 </rs-module-wrap> -->


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
                 @foreach($getRightData['resultSlide'] as $key => $slide)
                 <li data-target="#myCarousel" data-slide-to="{{ $key }}" {{ $key == 0 ? 'class=active' : '' }}></li>
                 @endforeach
             </ol>
             <div class="carousel-inner">
                 @foreach($getRightData['resultSlide'] as $key => $slide)
                 <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                     <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[{{$slide->id_slide}}]" title="" data-rel="photoslide{{$slide->id_slide}}" href="{{ asset('images/gambar_slide/' . $slide->gambar_slide) }}">
                         <img src="{{ asset('images/gambar_slide/' . $slide->gambar_slide) }}" alt="#" class="img-{{$slide->id_slide}}">
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
     </div>
 </main>

 @endsection('slide')