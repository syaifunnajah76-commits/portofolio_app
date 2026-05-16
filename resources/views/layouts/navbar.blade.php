<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm">
    <div class="container">
        <a class="navbar-brand text-info fw-bold" href="{{ route('beranda') }}">PortoTech.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto">
                <a class="nav-link {{ Route::is('beranda') ? 'active text-info' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                <a class="nav-link {{ Route::is('karya.*') ? 'active text-info' : '' }}" href="{{ route('karya.index') }}">Eksplorasi Karya</a>
            </div>
        </div>
    </div>
</nav>
