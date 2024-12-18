<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ $type_menu === 'region' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('region.index') }}"><i class="fas fa-globe"></i> <span>Region</span></a>
            </li>
            <li class="{{ $type_menu === 'kendaraan' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kendaraan.index') }}"><i class="fas fa-truck"></i> <span>Kendaraan</span></a>
            </li>
            <li class="{{ $type_menu === 'pemesanan' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('pemesanan.index') }}"><i class="far fa-file-alt"></i> <span>Pemesanan</span></a>
            </li>
            @if(auth()->user()->level == 2 || auth()->user()->level == 3)
            <li class="{{ $type_menu === 'approve_pemesanan' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('pemesanan.approvePage') }}"><i class="far fa-file-alt"></i> <span>Approve Pemesanan</span></a>
            </li>
            @endif
            {{-- <li class="{{ $type_menu === 'user' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('user.index') }}"><i class="far fa-file-alt"></i> <span>User</span></a>
            </li> --}}
        </ul>
    </aside>
</div>
