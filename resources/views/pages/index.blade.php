@extends('layouts.main.index')
@section('meta-title', 'Home - oooHotels')



@section('content')

    {{-- _________ Search Box_____________ --}}
    @include('components.sections.hotel-search-filter-section.index', [
        'hotelCategories' => $hotelCategories,
    ])



    {{-- Hotel item section --}}
    <livewire:pages.home.hotel-listing-seciton :favoriteHotels="$favoriteHotels" :hotelCategories="$hotelCategories" />

@endsection




@prepend('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css" />
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.css"
        rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/themes/light.min.css" rel="stylesheet"> --}}
@endprepend

@prepend('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
@endprepend
