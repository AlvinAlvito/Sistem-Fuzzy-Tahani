<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="/images/logo.png" alt="">
        </div>

        <span class="logo_name">MASPLUS</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li>
                <a href="{{ Auth::user()->role === 'siswa' ? '/siswa' : '/admin' }}" 
                   class="{{ Request::is(Auth::user()->role === 'siswa' ? 'siswa' : 'admin') ? 'active' : '' }}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Beranda</span>
                </a>
            </li>
    
            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="/admin/data-siswa" class="{{ Request::is('admin/data-siswa') ? 'active' : '' }}">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/fuzzifikasi" class="{{ Request::is('admin/fuzzifikasi') ? 'active' : '' }}">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Fuzzifikasi</span>
                    </a>
                </li>
            @endif
    
            <li>
                <a href="{{ Auth::user()->role === 'siswa' ? '/siswa/rekomendasi' : '/admin/rekomendasi' }}" 
                   class="{{ Request::is(Auth::user()->role === 'siswa' ? 'siswa/rekomendasi' : 'admin/rekomendasi') ? 'active' : '' }}">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Rekomendasi</span>
                </a>
            </li>
            <li>
                <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="link-name">Halaman Depan</span>
                </a>
            </li>
        </ul>
    
        <ul class="logout-mode">
            <li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <a href="#" onclick="document.getElementById('logout-form').submit(); return false;">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a>
                </form>
            </li>
    
            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
    
</nav>
