<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="navigation-header">
                <span>Main</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Main"></i>
            </li>
            <li class="nav-item {{ request()->segment(1)=='' ? 'active':'' }}">
                <a href="{{route('auth')}}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Beranda">Beranda</span>
                </a>
            </li>
            @if (Auth::user()->level==1)
            <li class="navigation-header">
                <span>Master</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Master"></i>
            </li>

            <li class="nav-item {{ request()->segment(1)=='TTDDokumen' ? 'active ':'' }}">
                <a href=" {{route('ttddokumen.index')}}">
                    <i class="feather icon-edit"></i>
                    <span class="menu-title" data-i18n="Tanda Tangan Dokumen">TTD Dokumen</span>
                </a>
            </li>
            <li class="nav-item {{ request()->segment(1)=='unitbidang' ? 'active ':'' }}">
                <a href=" {{route('unitbidang.index')}}">
                    <i class="feather icon-edit"></i>
                    <span class="menu-title" data-i18n="Data Unit Bidang">Data Unit Bidang</span>
                </a>
            </li>
            <li class="nav-item {{ request()->segment(1)=='pegawai' ? 'active':'' }}">
                <a href="{{route('pegawai.index')}}">
                    <i class="feather icon-edit"></i>
                    <span class="menu-title" data-i18n="Data Pegawai">Data Pegawai</span>
                </a>
            </li>


            <li class="nav-item {{ request()->segment(1)=='jenisnpd' || request()->segment(1)=='jenisdokumen' || request()->segment(1)=='mappingjenisnpd' ? 'open':'' }}">
                <a href="#">
                    <i class="feather icon-edit"></i>
                    <span class="menu-title" data-i18n="Data Parameter">Data NPD / Dokumen</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(1)=='jenisnpd' )? 'active':'';}}">
                        <a class="menu-item" href="{{route('jenisnpd.index')}}" data-i18n="Jenis NPD">Jenis NPD</a>
                    </li>
                    <li class="{{ (request()->segment(1)=='jenisdokumen' )? 'active':'';}}">
                        <a class="menu-item" href="{{route('jenisdokumen.index')}}" data-i18n="Jenis Dokumen">Jenis Dokumen</a>
                    </li>
                    <li class="{{ (request()->segment(1)=='mappingjenisnpd' )? 'active':'';}}">
                        <a class="menu-item" href="{{route('mappingjenisnpd.index')}}" data-i18n="Mapping NPD/ Dokumen">Mapping NPD/ Dokumen</a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span>ANGGARAN</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Transaksi"></i>
            </li>
            <li class="nav-item {{ (request()->segment(1)=='dpa') || (request()->segment(1)=='dparincian')  ? 'active':'' }}">
                <a href="{{route('dpa.index')}}">
                    <i class="feather icon-clipboard"></i><span class="menu-title" data-i18n="DPA">DPA</span>
                </a>
            </li>
            @endif

            <li class="navigation-header">
                <span>NPD</span>
                <i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Master"></i>
            </li>

            <li class="nav-item {{ request()->segment(1)=='npd' ? 'active ':'' }}">
                <a href=" {{route('npd.index')}}">
                    <i class="feather icon-edit"></i>
                    <span class="menu-title" data-i18n="Data Unit Bidang">NPD</span>
                </a>
            </li>
        </ul>
    </div>
</div>