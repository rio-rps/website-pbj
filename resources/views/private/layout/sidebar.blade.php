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
                <a href="{{route('pengaduan.index')}}">
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




        </ul>
    </div>
</div>