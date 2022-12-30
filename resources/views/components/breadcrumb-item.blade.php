@props(['url'])

@if (isset($url))
<div class="breadcrumb-item">
    <a href="{{ $url }}">{{ $slot }}</a>
</div>
@else
<div class="breadcrumb-item active">{{ $slot }}</div>
@endif