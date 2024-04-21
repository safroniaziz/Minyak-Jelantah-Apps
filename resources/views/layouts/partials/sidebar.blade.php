<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="header" style="font-weight:bold;">MENU UTAMA </li>
<li class="{{ set_active('beranda') }}">
    <a href="{{ route('beranda') }}">
        <i class="fa fa-info-circle"></i>
        <span>Informasi Beranda</span>
    </a>
</li>

<li class="{{ set_active('pengumuman') }}">
    <a href="{{ route('pengumuman') }}">
        <i class="fa fa-bullhorn"></i>
        <span>Informasi Pengumuman</span>
    </a>
</li>

<li class="{{ set_active(['mitra','mitra.create','mitra.edit']) }}">
    <a href="{{ route('mitra') }}">
        <i class="fa fa-users"></i>
        <span>Data Mitra</span>
    </a>
</li>

<li class="{{ set_active(['kurir','kurir.create','kurir.edit']) }}">
    <a href="{{ route('kurir') }}">
        <i class="fa fa-user"></i>
        <span>Data Kurir (Pengepul)</span>
    </a>
</li>

<li class="{{ set_active(['administrator','administrator.create','administrator.edit']) }}">
    <a href="{{ route('administrator') }}">
        <i class="fa fa-user-gear"></i>
        <span>Data Administrator</span>
    </a>
</li>

<li class="{{ set_active(['narahubung']) }}">
    <a href="{{ route('narahubung') }}">
        <i class="fa fa-address-book"></i>
        <span>Kontak Narahubung</span>
    </a>
</li>

<li>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out text-danger"></i>{{__('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>


