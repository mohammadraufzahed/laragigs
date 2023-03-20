<h1> {{ $heading }}</h1>

@php
@endphp

@if (count($listings) == 0)
    <h1>No Listings</h1>
@else
    @foreach ($listings as $listing)
        <h2><a href="/{{ $listing['id'] }}">{{ $listing['title'] }}</a></h2>
        <p>{{ $listing['description'] }}</p>
    @endforeach
@endif
