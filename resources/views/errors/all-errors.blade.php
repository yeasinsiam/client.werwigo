@extends('layouts.main.index')
@section('meta-title', 'Favorites - oooHotels')


@section('content')

    <section class="px-3 mx-auto mt-5 max-w-[86rem] lg:px-0">

        <div class="flex justify-center py-20">
            <div class="space-y-2 ">
                <p class="font-semibold text-center">Server error.</p>
                <div class="flex justify-center">
                    <a href="{{ url()->previous() }}" class="px-3 py-1   bg-[#000000] text-white rounded-lg inline-block">Go
                        Back
                        safely.</a>
                </div>
            </div>

        </div>
    </section>
@endsection

@prepend('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css" />
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/themes/light.min.css" rel="stylesheet">
@endprepend

@prepend('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
@endprepend
