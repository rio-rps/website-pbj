<div class="ttm-header-wrap">
    <!-- ttm-stickable-header-w -->
    <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
        <!-- ttm-topbar-wrapper -->
        <div class="ttm-topbar-wrapper clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ttm-topbar-content">
                            <ul class="top-contact text-left">
                                <li><i class="fa fa-envelope-o"></i><a href="#">biropbjss@gmail.com</a></li>
                            </ul>
                            <div class="topbar-right text-right">
                                <ul class="top-contact">
                                    <li><i class="fa fa-clock-o"></i>Office Hour: 07:30 wib - 16:30 wib</li>
                                </ul>
                                <div class="ttm-social-links-wrapper list-inline">
                                    <ul class="social-icons">
                                        <li><a href="#" class=" tooltip-bottom" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class=" tooltip-bottom" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class=" tooltip-bottom" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a class="ttm-btn ttm-btn-size-md  ttm-btn-bgcolor-skincolor" href="{{route('login')}}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ttm-topbar-wrapper end -->
        <div class="ttm-widget_header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex flex-row align-items-center">
                            <!-- site-branding -->
                            <div class="site-branding mr-auto">
                                <a class="home-link" href="{{route('index')}}" title="Biro Pengadaan Barang/Jasa" rel="home">
                                    <img id="logo-img" class="img-fluid" src="{{ asset('images/logo/logo_pbj.png')}}" alt="Biro Pengadaan Barang/Jasa">
                                </a>
                            </div><!-- site-branding end -->
                            <!-- widget-info -->
                            <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                <div class="widget_icon"><i class="flaticon-call"></i></div>
                                <div class="widget_content">
                                    <h5 class="widget_title">(0711) 356-094</h5>
                                    <p class="widget_desc"></p>
                                </div>
                            </div><!-- widget-info end -->
                            <!-- widget-info -->
                            <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                <div class="widget_icon"><i class="flaticon-global-1"></i></div>
                                <div class="widget_content">
                                    <h5 class="widget_title">Jl. Kapten A. Rivai No. 3</h5>
                                    <p class="widget_desc">Provinsi Sumatera Selatan</p>
                                </div>
                            </div><!-- widget-info end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="site-header-menu" class="site-header-menu">
            <div class="site-header-menu-inner ttm-stickable-header">
                <div class="container">
                    <!--site-navigation -->
                    <div id="site-navigation" class="site-navigation">
                        <div class="ttm-rt-contact">
                            <!-- header-icons -->
                            <div class="ttm-header-icons">
                                <div class="ttm-header-icon ttm-header-search-link">
                                    <a href="#"><i class="ti ti-search"></i></a>
                                    <div class="ttm-search-overlay">
                                        <form action="{{ route('search') }}" class="ttm-site-searchform" method="POST">
                                            @csrf
                                            <div class="w-search-form-h">
                                                <div class="w-search-form-row">
                                                    <div class="w-search-input">
                                                        <input type="search" class="field searchform-s" name="search" placeholder="Type Word Then Enter...">
                                                        <button type="submit">
                                                            <i class="ti ti-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- header-icons end -->

                        </div>
                        <div class="ttm-menu-toggle">
                            <input type="checkbox" id="menu-toggle-form" />
                            <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                <span class="toggle-block toggle-blocks-1"></span>
                                <span class="toggle-block toggle-blocks-2"></span>
                                <span class="toggle-block toggle-blocks-3"></span>
                            </label>
                        </div>
                        <nav id="menu" class="menu">

                            <ul class="dropdown">
                                <li class="active"><a href="{{route('index')}}">BERANDA</a></li>
                                @foreach($menulevel1 as $level1)
                                <li class="active" style="margin-left:-3px;">

                                    @if ($level1->id_laman == 0)
                                    <a href="#">{{ strtoupper($level1->nm_menu) }}</a>
                                    @endif


                                    <ul>
                                        @foreach ($menuLevel2 as $level2)
                                        @php
                                        // Pisahkan kode menu level 2 menjadi kode menu level 1 dan kode menu level 2
                                        $level2_code_parts = explode('.', $level2->kode_menu);
                                        $level2_code_menu1 = $level2_code_parts[0];
                                        $level2_code_menu2 = $level2_code_parts[1];
                                        $linkLevel2 = $level2->id_laman;
                                        @endphp
                                        @if ($level2_code_menu1 == $level1->kode_menu)

                                        @if ($linkLevel2 !='0')
                                        <li><a href="{{route('page',['slug'=>$level2->JLaman->slug_laman ])}}">{{ $level2->nm_menu }}</a></li>
                                        @elseif($linkLevel2 =='0')
                                        <li class="active"><a href="#">{{ $level2->nm_menu }}</a>
                                            <ul>
                                                @foreach ($menuLevel3 as $level3)

                                                @php
                                                $level3_code_parts = explode('.', $level3->kode_menu);
                                                $level3_code_menu1 = $level3_code_parts[0];
                                                $level3_code_menu2 = $level3_code_parts[1];
                                                $level3_code_menu3 = $level3_code_parts[2];
                                                $linkLevel3 = $level3->id_laman;
                                                @endphp

                                                @if ($level3_code_menu1 == $level1->kode_menu AND $level3_code_menu2 == $level2_code_menu2)
                                                <li style="margin-bottom:-15px;"><a href="{{route('page',['slug'=>$level3->JLaman->slug_laman ])}}">{{$level3->nm_menu}}</a></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif

                                        @endif
                                        @endforeach
                                    </ul>

                                </li>
                                @endforeach

                                <li class="active">
                                    <a href="{{url('page/kontak')}}">KONTAK</a>
                                </li>

                            </ul>
                        </nav>
                    </div><!-- site-navigation end-->
                </div>
            </div>
        </div>
    </div><!-- ttm-stickable-header-w end-->
</div>