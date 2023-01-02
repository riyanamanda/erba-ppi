<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">Erba</a>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-header">General</li>
        <li class="{{ request()->segment(1) === null ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->segment(1) === 'pasien' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pasien.index') }}">
                <i class="fas fa-user-injured"></i>
                <span>Data Pasien</span>
            </a>
        </li>
        <li class="{{ request()->segment(1) === 'surveilans' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('surveilans.index') }}">
                <i class="fas fa-poll-h"></i>
                <span>Surveilans</span>
            </a>
        </li>

        <li class="menu-header">Master Data</li>
        <li class="{{ request()->segment(1) === 'dokter' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dokter.index') }}">
                <i class="fas fa-user-md"></i>
                <span>Data Dokter</span>
            </a>
        </li>
        <li class="{{ request()->segment(1) === 'ruang-rawat-inap' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ruang-rawat-inap.index') }}">
                <i class="fas fa-procedures"></i>
                <span>Ruang Rawat Inap</span>
            </a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://rs-erba.go.id/" target="_blank" rel="noreferrer"
            class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-globe"></i> Official Website
        </a>
    </div>
</aside>