<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="navigation-header">
                <span>Main</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Main"></i>
            </li>
            <li class="nav-item ">
                <a href="{{route('panel.index')}}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Beranda">Beranda</span>
                </a>
            </li>



            <li class="nav-item">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="menu-title" data-i18n="Post">Post</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item">
                        <a href="{{route('kategori.index')}}">
                            <i class="feather icon-edit"></i>
                            <span class="menu-title" data-i18n="Kategori">Kategori Post</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('post.index')}}">
                            <i class="feather icon-edit"></i>
                            <span class="menu-title" data-i18n="Post">Post</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fa fa-photo"></i>
                    <span class="menu-title" data-i18n="Galeri">Galeri</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item">
                        <a href="{{route('photo.index')}}">
                            <i class="fa fa-photo"></i>
                            <span class="menu-title" data-i18n="Photo">Photo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('video.index')}}">
                            <i class="fa fa-youtube-play"></i>
                            <span class="menu-title" data-i18n="Video">Video</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('laman.index')}}">
                    <i class="fa fa-clone"></i>
                    <span class="menu-title" data-i18n="Laman">Laman</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('dokumen.index')}}">
                    <i class="fa fa-th-large"></i>
                    <span class="menu-title" data-i18n="Dokumen">Dokumen</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('datapengaduan.index')}}">
                    <i class="fa fa-th-large"></i>
                    <span class="menu-title" data-i18n="Pengaduan">Pengaduan</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>Setting</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Pengaturan"></i>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span class="menu-title" data-i18n="Pengaturan">Pengaturan</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item">
                        <a href="{{route('slideshow.index')}}">
                            <i class="fa fa-photo"></i>
                            <span class="menu-title" data-i18n="Slide Show">Slide Show</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('linkterkait.index') }}">
                            <i class="fa fa-link"></i>
                            <span class="menu-title" data-i18n="Link Terkait">Link Terkait</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="navigation-header">
                <span>MENU</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Pengaturan"></i>
            </li>

            @foreach($menulevel1 as $level1)
            <li class="nav-item">
                <a href="#">
                    <i class="{{ $level1->icon_menu }}"></i>
                    <span class="menu-title" data-i18n="{{ $level1->nm_menu }}">{{ $level1->nm_menu }}</span>
                </a>
                @foreach ($menuLevel2 as $level2)

                @php
                // Pisahkan kode menu level 2 menjadi kode menu level 1 dan kode menu level 2
                $level2_code_parts = explode('.', $level2->kode_menu);
                $level2_code_menu1 = $level2_code_parts[0];
                $level2_code_menu2 = $level2_code_parts[1];
                $linkLevel2 = $level2->id_laman;
                @endphp
                @if ($level2_code_menu1 == $level1->kode_menu)
                <ul class="menu-content">
                    <li class="nav-item ">
                        @if ($linkLevel2 !='0')
                        <a href="{{ ($linkLevel2 == 0) ? '#' :  route('lamandetail.show',$level2->JLaman->slug_laman) }}">
                            <span class="menu-title" title="{{ $level2->nm_menu }}" data-i18n="{{ $level2->nm_menu }}">{{ $level2->nm_menu }}</span>
                        </a>


                        @elseif($linkLevel2 =='0')
                    <li class="has-sub is-shown">
                        <a class="menu-item" href="#" title="{{ $level2->nm_menu }}" data-i18n="{{ $level2->nm_menu }}">{{ $level2->nm_menu }}</a>


                        @foreach ($menuLevel3 as $level3)

                        @php
                        $level3_code_parts = explode('.', $level3->kode_menu);
                        $level3_code_menu1 = $level3_code_parts[0];
                        $level3_code_menu2 = $level3_code_parts[1];
                        $level3_code_menu3 = $level3_code_parts[2];
                        $linkLevel3 = $level3->id_laman;
                        @endphp

                        @if ($level3_code_menu1 == $level1->kode_menu AND $level3_code_menu2 == $level2_code_menu2)
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{ ($linkLevel3 == 0) ? '#' :  route('lamandetail.show',$level3->JLaman->slug_laman) }}" title="{{ $level3->nm_menu }}" data-i18n="{{ $level3->nm_menu }}">{{$level3->nm_menu}}</a></li>
                        </ul>
                        @endif

                        @endforeach

                    </li>
                    @endif
            </li>
        </ul>
        @endif

        @endforeach
        </li>
        @endforeach

        </ul>
    </div>
</div>