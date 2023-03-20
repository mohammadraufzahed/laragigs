<h1> {{ $heading }}</h1>

@php
@endphp

@if (!$listing)
    <h1>Listing Not found</h1>
@else
    <h2>{{ $listing['title'] }}</h2>
    <p>{{ $listing['description'] }}</p>
@endif
