@props(['heading'])

<section class="section">
    <div class="section-header">
        <h1>{{ $heading }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            @if (isset($breadcrumb))
            {{ $breadcrumb }}
            @endif
        </div>
    </div>

    <div class="section-body">
        {{ $slot }}
    </div>
</section>