@extends('layouts.main.index')
@section('meta-title', 'Search - oooHotels')

@section('content')

    {{-- ______________ Sidebar Filters______________ --}}
    {{-- @include('pages.search.components.search-filter-section.index') --}}
    <section class="max-w-5xl px-3 mx-auto mt-10 lg:px-0">
        {{-- <div class="bg-white rounded-lg gap-x-2 gap-y-4 lg:py-4 lg:pt-5 lg:px-5 lg:border-2 lg:shadow-lg"> --}}
        @include('components.sections.hotel-search-filter-section.index')

        {{-- </div> --}}
    </section>

    {{-- ________________ ( Hotel Listing )___________ --}}
    <section class="max-w-5xl px-3 mx-auto mt-5 lg:px-0">

        {{-- ______________Hotes______________ --}}
        <livewire:sections.hotel-listing.index />

    </section>


@endsection



@prepend('header')
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
@endprepend

@prepend('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
@endprepend
