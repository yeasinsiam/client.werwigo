@php

    $filters = [];

    if (request()->query('check-in')) {
        $filters['check-in'] = request()->query('check-in');
    } else {
        $filters['check-in'] = now()->format('m/d/Y');
    }
    if (request()->query('check-out')) {
        $filters['check-out'] = request()->query('check-out');
    } else {
        $filters['check-out'] = now()
            ->addDay()
            ->format('m/d/Y');
    }

    if (request()->query('adults')) {
        $filters['adults'] = request()->query('adults');
    } else {
        $filters['adults'] = 2;
    }

    if (request()->query('rooms')) {
        $filters['rooms'] = request()->query('rooms');
    } else {
        $filters['rooms'] = 1;
    }

@endphp
{{--
@php
    $ratingsCollection = collect(['romantic' => $hotel->parentHotel->romantic_avg, 'intimate' => $hotel->parentHotel->intimate_avg, 'luxury' => $hotel->parentHotel->luxury_avg]);
    $allSameRating = $ratingsCollection->every(function ($value) use ($ratingsCollection) {
        return $value === $ratingsCollection->first();
    });
    if (!$allSameRating) {
        $highestRating = $ratingsCollection->max();
        $highestRatingName = $ratingsCollection
            ->keys()
            ->filter(function ($key) use ($ratingsCollection, $highestRating) {
                return $ratingsCollection[$key] === $highestRating;
            })
            ->first();
    } else {
        $highestRatingName = $hotel->parentHotel->ratings->sortByDesc('created_at')->first()?->type;
    }

@endphp --}}


@extends('layouts.main.index')
@section('meta-title', $hotel->headline . ' - oooHotels')


@section('content')
    <section wire:ignore id="{{ $id }}" class="">


        {{-- _____Thumbnail mobile_____ --}}
        {{-- <div class="flex flex-col col-span-12 gap-5 lg:col-start-4 lg:col-end-13 lg:hidden">
            <div class="">
                <div class="relative overflow-hidden ">
                    <div data-id="hotel-listing-gallery-thumb-sliders-wrapper" class="relative group">
                        <swiper-container data-id="hotel-listing-gallery-thumb-sliders" init="false"
                            navigation-prev-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-left'
                            navigation-next-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-right'>
                            <swiper-slide wire:key='{{ $id }}-{{ $hotel->thumbnail->id }}-thumbs'>
                                <img alt="{{ $hotel->title }}"
                                    src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }}
                                    data-srcset={{ $hotel->thumbnail->getSrcset() }}
                                    class="object-cover w-full h-72 lg:h-80 lazyload " />
                            </swiper-slide>
                            @foreach ($hotel->gallery as $image)
                                <swiper-slide wire:key='{{ $id }}-{{ $image->id }}-thumbs'>
                                    <img alt="{{ $hotel->title }}"
                                        src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                        data-srcset={{ $image->getSrcset() }}
                                        class="object-cover w-full h-72 lg:h-80 lazyload " />
                                </swiper-slide>
                            @endforeach
                        </swiper-container>
                        <div
                            class="swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-7 h-7 z-20   rounded-full group-hover:opacity-100 flex justify-center items-center  duration-300  aria-disabled:hidden">
                            <i class="text-2xl leading-none text-white far fa-chevron-left"></i>
                        </div>
                        <div
                            class="swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-7 h-7 z-20   rounded-full group-hover:opacity-100 flex justify-center items-center  duration-300  aria-disabled:hidden ">
                            <i class="text-2xl leading-none text-white far fa-chevron-right"></i>
                        </div>
                    </div>


                </div>
            </div>
        </div> --}}
        <div class="grid max-w-[86rem] grid-cols-12 gap-5 px-3 mx-auto pt-4 lg:px-0">
            <div class="flex flex-col col-span-12 gap-5 lg:col-start-4 lg:col-end-13">

                {{-- Title and Desc --}}
                <div class="">
                    {{-- ____Headline___ --}}
                    <div class="space-y-[1px]">
                        <div class="relative flex items-center justify-between lg:justify-start lg:gap-3">
                            <h2 class="text-base font-medium ">
                                {{ $hotel->headline }}</h2>

                        </div>

                        <p class="text-[#797979] text-[13px] flex gap-1 items-center pt-1">
                            <b>{{ number_format($hotel->parentHotel->best_rating, 1) }}/10</b>
                            <i class="text-[3px] fas fa-circle leading-none"></i>
                            <span>
                                @switch($hotel->parentHotel->best_rating_type)
                                    @case('romantic')
                                        <span>{{ __('Romantic') }}</span>
                                    @break

                                    @case('intimate')
                                        <span>{{ __('Intimate') }}</span>
                                    @break

                                    @case('luxury')
                                        <span>{{ __('Luxurious') }}</span>
                                    @break
                                @endswitch
                            </span>
                            <i class="text-[3px] fas fa-circle leading-none"></i>
                            <span>{{ __('based on') }} <b class="text-black">{{ $hotelOpinionsParticipatesCount }}</b>
                                {{ __('travelers') }}</span>
                            <span class="flex items-center">
                                <i class="text-[3px] fas fa-circle leading-none"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 34 34"
                                    fill="none">
                                    <circle cx="17" cy="17" r="17" fill="white" />
                                    <path
                                        d="M26.2724 17.4046C26.2724 16.7337 26.2122 16.0886 26.1004 15.4692H17.189V19.1336H22.2812C22.0575 20.312 21.3866 21.3098 20.3802 21.9807V24.3634H23.451C25.2402 22.7119 26.2724 20.2862 26.2724 17.4046Z"
                                        fill="#4285F4" />
                                    <path
                                        d="M17.1896 26.6511C19.7443 26.6511 21.8861 25.8082 23.4516 24.3631L20.3808 21.9804C19.5378 22.5481 18.4626 22.8922 17.1896 22.8922C14.7295 22.8922 12.6393 21.2321 11.8909 18.9956H8.74268V21.4385C10.2996 24.5265 13.4908 26.6511 17.1896 26.6511Z"
                                        fill="#34A853" />
                                    <path
                                        d="M11.8903 18.9867C11.7011 18.4189 11.5892 17.8168 11.5892 17.1889C11.5892 16.561 11.7011 15.9588 11.8903 15.3911V12.9482H8.74206C8.09693 14.2213 7.72705 15.6578 7.72705 17.1889C7.72705 18.72 8.09693 20.1565 8.74206 21.4296L11.1935 19.52L11.8903 18.9867Z"
                                        fill="#FBBC05" />
                                    <path
                                        d="M17.1896 11.4946C18.5831 11.4946 19.8217 11.9763 20.8109 12.9053L23.5205 10.1957C21.8775 8.66464 19.7443 7.72705 17.1896 7.72705C13.4908 7.72705 10.2996 9.85168 8.74268 12.9483L11.8909 15.3912C12.6393 13.1547 14.7295 11.4946 17.1896 11.4946Z"
                                        fill="#EA4335" />
                                </svg>


                                <span class="leading-none">{{ $hotel->parentHotel->google_rating }}</span>
                                <span class="leading-none -mt-[2px] text-[16px] ml-[2px]">★</span>
                            </span>
                        </p>
                        {{-- <div class="flex items-center gap-2 ">
                        @foreach ($hotel->categories as $category)
                            <span class="text-xs font-semibold text-[#000000]">{{ $category->title }}</span>
                        @endforeach
                    </div> --}}
                        <div class="flex gap-2 pt-1">
                            <livewire:components.hotel.favorite-hotel-icon wire:key="item-{{ str()->uuid() }}"
                                :hotel="$hotel" :customerFavoriteHotels="$customerFavoriteHotels" :wrapperClass="' '" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'" />



                            <button type="button" id="open-map-popup"
                                class="flex group  items-center shadow justify-center gap-2 px-3 py-1  text-xs border border-[#E5E5E5] rounded-3xl hover:border-black hover:bg-black hover:text-white transition">

                                <i class="fas fa-map-marker"></i>
                                {{ __('View Location') }}

                            </button>
                        </div>
                    </div>
                    <div class="pt-3">
                        <h4 class="text-sm">{{ __('Description') }} </h4>
                        <div class="pt-3 text-xs text-[#6B7280] text-justify">
                            {{-- <p>{{ $hotel->excerpt }}</p> --}}
                            <p>{{ $hotel->description }}</p>
                        </div>
                    </div>
                </div>
                {{-- Amenities --}}
                {{-- <div class="">
                <h2 class="text-sm">Amenities</h2>
                <div class="grid grid-cols-3 gap-2 pt-3 lg:grid-cols-6">
                    @foreach ($hotel->services->take(5) as $service)
                        <div class="flex flex-col gap-1 items-center bg-[#F8F8F8] rounded-xl justify-center py-5  lg:py-4">
                            <i class="{{ $service->icon_class }} text-xl text-[#646464] lg:text-2xl"></i>
                            <span class="block text-[#646464] text-xs">{{ $service->title }}</span>
                        </div>
                    @endforeach
                    @if ($hotel->services->count() > 5)
                        <div id="more-service-popup-wrapper"
                            class="relative group bg-[#F8F8F8] rounded-xl  py-5   lg:py-4 ">
                            <button id="more-service-popup-btn" type="button"
                                class="flex items-center justify-center w-full h-full">
                                <span class="block text-[#646464] text-xs">+{{ $hotel->services->count() - 5 }}
                                    more</span>
                            </button>
                            <div id="more-service-popup"
                                class="absolute z-[99] right-0 hidden pt-3  group-hover:block group-focus:block top-full">
                                <ul class="w-full h-full p-2 bg-white rounded-lg shadow-xl">
                                    @foreach ($hotel->services->skip(5) as $service)
                                        <li class="flex items-center gap-2 px-3 py-1 ">
                                            <i class="text-sm far fa-check"></i>
                                            <span class="text-xs whitespace-nowrap">{{ $service->title }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    @endif
                </div>
            </div> --}}
                {{-- Gallery --}}
                <div class="">
                    <h2 class="text-sm">{{ __('Vibes') }}</h2>
                    <div id="gallery-list" class="relative mt-3">
                        <button type="button" data-id="prev"
                            class="absolute left-0 flex items-center justify-center h-full lg:hidden w-9 lg:w-12 bg-gradient-to-r from-white to-transparent">
                            <div
                                class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                                <i class="text-xs leading-none far fa-chevron-left"></i>
                            </div>
                        </button>

                        <ul
                            class="flex gap-3 overflow-x-auto overflow-y-hidden no-scrollbar lg:overflow-hidden lg:flex-wrap">
                            @foreach ($hotel->gallery as $image)
                                <li {{-- data-select="show-hotel-gallery-popup" --}} tabindex="-1" class="cursor-pointer shrink-0">
                                    <img alt="{{ $hotel->title }}"
                                        src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                        data-srcset={{ $image->getSrcset() }}
                                        class="object-cover w-28 h-44 rounded-xl lazyload ">
                                </li>
                            @endforeach
                            {{-- @foreach ($hotel->gallery as $image)
                            <li data-select="show-hotel-gallery-popup" class="shrink-0">
                                <img alt="{{ $hotel->title }}"
                                    src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                    data-srcset={{ $image->getSrcset() }}
                                    class="object-cover w-28 h-28 rounded-xl lazyload ">
                            </li>
                        @endforeach
                        @foreach ($hotel->gallery as $image)
                            <li data-select="show-hotel-gallery-popup" class="shrink-0">
                                <img alt="{{ $hotel->title }}"
                                    src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                    data-srcset={{ $image->getSrcset() }}
                                    class="object-cover w-28 h-28 rounded-xl lazyload ">
                            </li>
                        @endforeach --}}


                        </ul>
                        <button type="button" data-id="next"
                            class="absolute top-0 right-0 flex items-center justify-center h-full lg:hidden w-9 lg:w-12 bg-gradient-to-r from-transparent to-white">
                            <div
                                class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                                <i class="text-xs leading-none far fa-chevron-right"></i>
                            </div>
                        </button>
                    </div>
                </div>
                {{-- Tags (Desktop) --}}
                <div class="hidden lg:block ">
                    <h2 class="text-sm">{{ __('Tags') }}</h2>
                    <div class="flex flex-wrap gap-2 pt-3 ">
                        @foreach ($hotel->tags as $tag)
                            <span class="block text-[#646464] text-xs bg-[#F8F8F8] rounded-lg p-2 ">
                                {{ $tag->title }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @if ($hotelOpinions->count())
                    <div class="hidden lg:block ">
                        <h2 class="text-sm">{{ __('Opinions') }} ({{ __('based on') }}
                            {{ $hotelOpinionsParticipatesCount }}
                            {{ __('rating') }} {{ $hotelOpinionsParticipatesCount > 1 ? 's' : '' }})</h2>
                        <div class="pt-3 ">
                            {{-- <span class="block text-[#6B6B6B] text-xs">All opinion ({{ $hotelOpinions->count() }})</span> --}}
                            <div class="pr-1 mt-3 space-y-5 ">
                                @foreach ($hotelOpinions as $opinion)
                                    <div class="flex flex-col gap-2">
                                        <div class="flex justify-between">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ $hotel->admin->avatar->getUrl() }}"
                                                    class="w-[40px] h-[40px] rounded-full object-cover" />
                                                <div>

                                                    <h3 class="text-xs ">{{ $opinion->admin->username }}</h3>
                                                    <p class=" line-clamp-1 text-[#797979] text-[12px]">viaggiato qui
                                                        4 giorni fa</p>
                                                </div>
                                            </div>
                                            {{-- <h3 class="text-xs ">Date: {{ $opinion->created_at->format('d/m/Y') }}</h3> --}}
                                        </div>

                                        <p class="text-[#6B7280] text-[11px]">
                                            {{ $opinion->comment }}
                                        </p>
                                    </div>
                                @endforeach

                            </div>
                            {{-- <button type="button" class="pt-2 text-xs font-semibold hover:underline">Show all
                            opinion</button> --}}
                        </div>
                    </div>
                @endif

            </div>


            <div class="flex flex-col col-span-12 gap-5 lg:col-start-1 lg:col-end-4 lg:row-start-1">
                {{-- _____Thumbnail desktop_____ --}}
                <div class="hidden lg:block">
                    <div class="relative overflow-hidden rounded-lg">
                        <div data-id="hotel-listing-gallery-thumb-sliders-wrapper" class="relative group">
                            <swiper-container data-id="hotel-listing-gallery-thumb-sliders" init="false"
                                navigation-prev-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-left'
                                navigation-next-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-right'>


                                <swiper-slide wire:key='{{ $id }}-{{ $hotel->thumbnail->id }}-thumbs'>
                                    <img alt="{{ $hotel->title }}"
                                        src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }}
                                        data-srcset={{ $hotel->thumbnail->getSrcset() }}
                                        class="object-cover w-full h-72 lg:h-80 lazyload " />
                                    {{-- class="object-cover w-full h-64 min-h-fu7h-72 lazyload " /> --}}
                                </swiper-slide>
                                @foreach ($hotel->gallery as $image)
                                    <swiper-slide wire:key='{{ $id }}-{{ $image->id }}-thumbs'>
                                        <img alt="{{ $hotel->title }}"
                                            src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                            data-srcset={{ $image->getSrcset() }}
                                            class="object-cover w-full h-72 lg:h-80 lazyload " />
                                        {{-- class="object-cover w-full h-64 min-h-fu7h-72 lazyload " /> --}}
                                    </swiper-slide>
                                @endforeach
                            </swiper-container>
                            <div
                                class="swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-7 h-7 z-20   rounded-full group-hover:opacity-100 flex justify-center items-center  duration-300  aria-disabled:hidden">
                                <i class="text-2xl leading-none text-white far fa-chevron-left"></i>
                            </div>
                            <div
                                class="swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-7 h-7 z-20   rounded-full group-hover:opacity-100 flex justify-center items-center  duration-300  aria-disabled:hidden ">
                                <i class="text-2xl leading-none text-white far fa-chevron-right"></i>
                            </div>
                        </div>


                    </div>
                </div>
                {{-- Hotel title/address --}}
                {{-- <div class="space-y-[1px]">
                    <div class="relative flex items-center justify-between lg:justify-start lg:gap-3">
                        <h2 class="text-base font-medium ">
                            {{ $hotel->parentHotel->title }}</h2>
                    </div>
                    <p class="text-[#797979] text-[13px] flex items-center gap-1 pt-1">

                        <span class="flex items-center -ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 34 34"
                                fill="none">
                                <circle cx="17" cy="17" r="17" fill="white"></circle>
                                <path
                                    d="M26.2724 17.4046C26.2724 16.7337 26.2122 16.0886 26.1004 15.4692H17.189V19.1336H22.2812C22.0575 20.312 21.3866 21.3098 20.3802 21.9807V24.3634H23.451C25.2402 22.7119 26.2724 20.2862 26.2724 17.4046Z"
                                    fill="#4285F4"></path>
                                <path
                                    d="M17.1896 26.6511C19.7443 26.6511 21.8861 25.8082 23.4516 24.3631L20.3808 21.9804C19.5378 22.5481 18.4626 22.8922 17.1896 22.8922C14.7295 22.8922 12.6393 21.2321 11.8909 18.9956H8.74268V21.4385C10.2996 24.5265 13.4908 26.6511 17.1896 26.6511Z"
                                    fill="#34A853"></path>
                                <path
                                    d="M11.8903 18.9867C11.7011 18.4189 11.5892 17.8168 11.5892 17.1889C11.5892 16.561 11.7011 15.9588 11.8903 15.3911V12.9482H8.74206C8.09693 14.2213 7.72705 15.6578 7.72705 17.1889C7.72705 18.72 8.09693 20.1565 8.74206 21.4296L11.1935 19.52L11.8903 18.9867Z"
                                    fill="#FBBC05"></path>
                                <path
                                    d="M17.1896 11.4946C18.5831 11.4946 19.8217 11.9763 20.8109 12.9053L23.5205 10.1957C21.8775 8.66464 19.7443 7.72705 17.1896 7.72705C13.4908 7.72705 10.2996 9.85168 8.74268 12.9483L11.8909 15.3912C12.6393 13.1547 14.7295 11.4946 17.1896 11.4946Z"
                                    fill="#EA4335"></path>
                            </svg>

                            <span class="">{{ number_format($hotel->parentHotel->google_rating, 1) }}</span>
                        </span>
                        <span class="inline-flex items-center gap-1">
                            @php
                                $intval_google_rating = intval($hotel->parentHotel->google_rating);
                            @endphp

                            @for ($i = 1; $i <= $intval_google_rating; $i++)
                                <i class="fas fa-star text-[#F4BE18] text-xs"></i>
                            @endfor
                            @for ($i = 1; $i <= 5 - $intval_google_rating; $i++)
                                <i class="fas fa-star text-[#D1D1D6] text-xs"></i>
                            @endfor

                        </span>
                        <span class="text-[#1a73e8]">({{ $hotel->parentHotel->google_total_reviews }} reviews)</span>
                    </p>


                </div> --}}

                {{-- Map --}}
                {{-- <div class="flex flex-col ">
                    <h2 class="text-sm">Where is</h2>
                    <p class="text-xs font-medium  text-[#4C4B4B] ">
                        {{ $hotel->parentHotel->address }}
                    </p>
                    <button type="button" id="open-map-popup"
                        class="flex items-center justify-center gap-2 px-3 py-1 mt-2 text-xs transition bg-white border border-black shadow text-balck group rounded-3xl hover:bg-black hover:text-white">

                        <i class="fas fa-map-marker"></i>
                        View on the map

                    </button>




                </div> --}}

                {{-- Tags (Mobile) --}}
                <div class="lg:hidden">
                    <h2 class="text-sm">{{ __('Tags') }}</h2>
                    <div class="flex flex-wrap gap-2 pt-3 ">
                        @foreach ($hotel->tags as $tag)
                            <span class="block text-[#646464] text-xs bg-[#F8F8F8] rounded-lg p-2 ">
                                {{ $tag->title }}
                            </span>
                        @endforeach
                    </div>
                </div>

                {{-- Google Reviews --}}
                <div class="relative">
                    {{-- Google review --}}
                    {{-- <div class="p-5 flex justify-between rounded-xl [box-shadow:0px_0px_73px_0px_rgba(0,0,0,0.10)]">
                    <div class="flex flex-col justify-between gap-3">
                        <h2 class="text-sm">Google review</h2>
                        <h4 class="text-2xl font-semibold">{{ $hotel->parentHotel->google_rating }}</h4>
                    </div>

                    <div class="flex flex-col items-end justify-between gap-3">
                        <div class="flex gap-2">


                            @php
                                $intval_google_rating = intval($hotel->parentHotel->google_rating);
                            @endphp

                            @for ($i = 1; $i <= $intval_google_rating; $i++)
                                <i class="fas fa-star text-[#F4BE18] text-lg"></i>
                            @endfor
                            @for ($i = 1; $i <= 5 - $intval_google_rating; $i++)
                                <i class="fas fa-star text-[#D1D1D6] text-lg"></i>
                            @endfor

                        </div>
                        <div class="flex items-center ">
                            <span class="text-[10px] text-[#8E8E93]">based on
                                {{ $hotel->parentHotel->google_total_reviews }}
                                reviews</span>
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="17" cy="17" r="10" fill="white" />
                                <path
                                    d="M26.2726 17.4046C26.2726 16.7337 26.2124 16.0886 26.1006 15.4692H17.1892V19.1336H22.2814C22.0578 20.312 21.3869 21.3098 20.3805 21.9807V24.3634H23.4513C25.2404 22.7119 26.2726 20.2862 26.2726 17.4046Z"
                                    fill="#4285F4" />
                                <path
                                    d="M17.1901 26.6511C19.7448 26.6511 21.8866 25.8082 23.4521 24.3631L20.3813 21.9804C19.5383 22.5481 18.4631 22.8922 17.1901 22.8922C14.73 22.8922 12.6397 21.2321 11.8914 18.9956H8.74316V21.4385C10.3001 24.5265 13.4913 26.6511 17.1901 26.6511Z"
                                    fill="#34A853" />
                                <path
                                    d="M11.8905 18.9867C11.7013 18.4189 11.5895 17.8168 11.5895 17.1889C11.5895 16.561 11.7013 15.9588 11.8905 15.3911V12.9482H8.7423C8.09717 14.2213 7.72729 15.6578 7.72729 17.1889C7.72729 18.72 8.09717 20.1565 8.7423 21.4296L11.1938 19.52L11.8905 18.9867Z"
                                    fill="#FBBC05" />
                                <path
                                    d="M17.1901 11.4946C18.5835 11.4946 19.8222 11.9763 20.8114 12.9053L23.5209 10.1957C21.878 8.66464 19.7448 7.72705 17.1901 7.72705C13.4913 7.72705 10.3001 9.85168 8.74316 12.9483L11.8914 15.3912C12.6397 13.1547 14.73 11.4946 17.1901 11.4946Z"
                                    fill="#EA4335" />
                            </svg>
                        </div>
                    </div>

                </div> --}}

                    {{-- Couple Ratings --}}

                    {{-- <div class="flex justify-between py-5 mt-2 border-b border-black lg:border-none">
                    <div class="flex flex-col gap-3">
                        <h4 class="text-xl font-semibold">Rating</h4>
                        <div class="flex flex-col gap-1">
                            <h2 class="text-4xl text-[#000000] font-semibold">
                                {{ number_format(collect([$hotel->parentHotel->romantic_avg, $hotel->parentHotel->intimate_avg, $hotel->parentHotel->luxury_avg])->avg(), 1) }}/10
                            </h2>
                            <span class="text-xs text-[#6B6B6B]">All ratings (average)</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-end justify-between gap-5">
                        <div class="flex flex-col self-start">
                            <b class="text-[#646464] text-xs ">oooHotels Vibes Rating®</b>
                            <span class="text-xs text-[#646464]">based on: <b
                                    class="text-black">{{ $hotelOpinionsParticipatesCount }}</b> rating</span>
                        </div>
                        <div class="flex flex-col ">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm">Romantic</span>



                                    @if ($highestRatingName == 'romantic')
                                        <span
                                            class="pl-1 pr-[10px]  text-[10px] text-white bg-[#000000] rounded-lg rounded-br-3xl">BEST</span>
                                    @endif
                                </div>

                                <h5 class="text-base font-semibold">
                                    {{ number_format($hotel->parentHotel->romantic_avg, 1) }}/5
                                </h5>
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm">Intimate</span>
                                    @if ($highestRatingName == 'intimate')
                                        <span
                                            class="pl-1 pr-[10px]  text-[10px] text-white bg-[#000000] rounded-lg rounded-br-3xl">BEST</span>
                                    @endif
                                </div>
                                <h5 class="text-base font-semibold">
                                    {{ number_format($hotel->parentHotel->intimate_avg, 1) }}/5
                                </h5>
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm">Luxurious</span>
                                    @if ($highestRatingName == 'luxury')
                                        <span
                                            class="pl-1 pr-[10px]  text-[10px] text-white bg-[#000000] rounded-lg rounded-br-3xl">BEST</span>
                                    @endif

                                </div>
                                <h5 class="text-base font-semibold">
                                    {{ number_format($hotel->parentHotel->luxury_avg, 1) }}/5</h5>
                            </div>
                        </div>
                    </div>

                </div> --}}


                    {{-- Guest Review --}}
                    @if ($hotelOpinions->count())
                        <div class=" lg:hidden">
                            <h2 class="text-sm">{{ __('Opinions') }} ({{ $hotelOpinions->count() }})</h2>
                            <div class="pr-1 mt-3 space-y-5 ">
                                @foreach ($hotelOpinions as $opinion)
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ $hotel->admin->avatar->getUrl() }}"
                                                    class="w-[40px] h-[40px] rounded-full object-cover" />
                                                <div>

                                                    <h3 class="text-xs ">{{ $opinion->admin->username }}</h3>
                                                    <p class=" line-clamp-1 text-[#797979] text-[12px]">viaggiato qui
                                                        4 giorni fa</p>
                                                </div>
                                            </div>

                                            {{-- <h3 class="text-xs ">{{ __('Date') }}:
                                                {{ $opinion->created_at->format('d/m/Y') }}</h3> --}}
                                        </div>

                                        <p class="text-[#6B7280] text-[11px]">
                                            {{ $opinion->comment }}
                                        </p>
                                    </div>
                                @endforeach

                            </div>
                            {{-- <button type="button" class="pt-2 text-xs font-semibold hover:underline">Show all
                            opinion</button> --}}
                        </div>
                    @endif

                    {{-- Booking Button --}}
                    <div class="py-9 lg:py-[10px]"></div>
                    <div
                        class=" fixed  z-[99999] lg:z-[9999]    left-0  bottom-0 px-3 py-4  w-full {{--  lg:bottom-[55px] --}} lg:p-3 lg:py-5 bg-white [box-shadow:0px_-4px_63px_0px_rgba(0,0,0,0.10)]">
                        <div class="lg:max-w-[86rem] lg:mx-auto lg:flex lg:justify-between lg:items-center lg:gap-5">


                            <div class="flex items-center justify-between gap-2 lg:flex-1">
                                <span class="hidden text-sm text-[#646464] lg:flex-1 lg:block ">
                                    {{ __('Send booking request and get quote via email') }} </span>
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center gap-1 text-[10px]"><svg width="12" height="12"
                                            viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.57 3C8.57 4.62412 7.24912 5.945 5.625 5.945C4.00088 5.945 2.68 4.62412 2.68 3C2.68 1.37588 4.00088 0.055 5.625 0.055C7.24912 0.055 8.57 1.37588 8.57 3ZM7.18 3C7.18 2.14237 6.48263 1.445 5.625 1.445C4.76737 1.445 4.07 2.14237 4.07 3C4.07 3.85763 4.76737 4.555 5.625 4.555C6.48263 4.555 7.18 3.85763 7.18 3ZM0.055 11.25C0.055 8.79862 2.04863 6.805 4.5 6.805H6.75C9.20138 6.805 11.195 8.79862 11.195 11.25V11.945H9.805V11.25C9.805 9.56512 8.43488 8.195 6.75 8.195H4.5C2.81512 8.195 1.445 9.56512 1.445 11.25V11.945H0.055V11.25Z"
                                                fill="#808080" stroke="white" stroke-width="0.11" />
                                        </svg>
                                        {{ request()->query('adults') ?? 2 }}
                                    </span>
                                    <span class="flex items-center gap-1 text-[10px]">
                                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.18182 7.255H8.23682V7.2V2.4C8.23682 2.20282 8.31692 2.01345 8.45991 1.87364C8.60294 1.73378 8.7972 1.655 9 1.655H15.5455C16.1822 1.655 16.7927 1.90236 17.2426 2.34227C17.6925 2.78214 17.945 3.37847 17.945 4V11.2C17.945 11.3972 17.8649 11.5865 17.7219 11.7264C17.5789 11.8662 17.3846 11.945 17.1818 11.945C16.979 11.945 16.7848 11.8662 16.6417 11.7264C16.4987 11.5865 16.4186 11.3972 16.4186 11.2V8.8V8.745H16.3636H1.63636H1.58136V8.8V11.2C1.58136 11.3972 1.50126 11.5865 1.35827 11.7264C1.21524 11.8662 1.02098 11.945 0.818182 11.945C0.615379 11.945 0.421126 11.8662 0.278091 11.7264C0.135099 11.5865 0.055 11.3972 0.055 11.2V0.8C0.055 0.602818 0.135099 0.413455 0.278091 0.27364C0.421126 0.133784 0.61538 0.055 0.818182 0.055C1.02098 0.055 1.21524 0.133784 1.35827 0.27364C1.50126 0.413455 1.58136 0.602818 1.58136 0.8V7.2V7.255H1.63636H8.18182ZM16.3636 7.255H16.4186V7.2V4C16.4186 3.77284 16.3263 3.55523 16.1624 3.39499C15.9986 3.23479 15.7766 3.145 15.5455 3.145H9.81818H9.76318V3.2V7.2V7.255H9.81818H16.3636ZM6.24268 5.94948C5.84804 6.20731 5.38395 6.345 4.90909 6.345C4.2723 6.345 3.66183 6.09765 3.21192 5.65773C2.76205 5.21786 2.50955 4.62153 2.50955 4C2.50955 3.53648 2.65011 3.08327 2.91362 2.69766C3.17714 2.31204 3.55182 2.0113 3.99042 1.83367C4.42904 1.65603 4.91174 1.60953 5.37745 1.7001C5.84315 1.79068 6.27076 2.01422 6.60627 2.34227C6.94176 2.67031 7.17009 3.0881 7.26258 3.54275C7.35507 3.99739 7.30761 4.46865 7.12615 4.89699C6.94469 5.32534 6.63731 5.69166 6.24268 5.94948ZM5.39373 3.28878C5.25017 3.19499 5.08152 3.145 4.90909 3.145C4.6779 3.145 4.45594 3.23479 4.2921 3.39499C4.12821 3.55523 4.03591 3.77284 4.03591 4C4.03591 4.16938 4.08728 4.33486 4.18339 4.47549C4.27948 4.61611 4.41593 4.72552 4.57534 4.79008C4.73474 4.85464 4.91007 4.87151 5.07921 4.83862C5.24836 4.80572 5.40389 4.72449 5.52608 4.60501C5.64829 4.48552 5.73166 4.33313 5.76545 4.16704C5.79924 4.00094 5.78188 3.82878 5.71564 3.6724C5.64939 3.51603 5.5373 3.38258 5.39373 3.28878Z"
                                                fill="#808080" stroke="white" stroke-width="0.11" />
                                        </svg>
                                        {{ request()->query('rooms') ?? 1 }}
                                    </span>
                                    <span class="flex items-center gap-1 text-[10px]">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.33325 1.3335V3.3335" stroke="#808080" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.6667 1.3335V3.3335" stroke="#808080" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2.33325 6.06006H13.6666" stroke="#808080" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M14 5.66683V11.3335C14 13.3335 13 14.6668 10.6667 14.6668H5.33333C3 14.6668 2 13.3335 2 11.3335V5.66683C2 3.66683 3 2.3335 5.33333 2.3335H10.6667C13 2.3335 14 3.66683 14 5.66683Z"
                                                stroke="#808080" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10.4632 9.13314H10.4692" stroke="#808080" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10.4632 11.1331H10.4692" stroke="#808080" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M7.99691 9.13314H8.0029" stroke="#808080" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M7.99691 11.1331H8.0029" stroke="#808080" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.52962 9.13314H5.53561" stroke="#808080" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.52962 11.1331H5.53561" stroke="#808080" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                        @php
                                            $nightCount = $checkOut->diffInDays($checkIn);
                                        @endphp

                                        {{ $nightCount }} {{ __('night') }}{{ $nightCount > 1 ? 's' : '' }}
                                        ({{ $checkIn->format('d/m') }} -
                                        {{ $checkOut->format('d/m') }})
                                    </span>
                                </div>
                                <button data-id="change-filter-button-el" type="button"
                                    class="text-xs font-medium hover:underline "> {{ __('Change') }} </button>
                                <div id="change-filters-wrapper"
                                    data-filters="{{ !empty($filters) ? json_encode($filters) : '{}' }}"
                                    class="
        {{-- absolute hidden right-0 z-[999] pt-1 top-full w-auto --}}
          z-[99999]
hidden
        lg:w-screen lg:h-screen lg:fixed lg:inset-0 lg:bg-black/50

        max-lg:fixed max-lg:w-screen max-lg:overflow-x-hidden
        max-lg:overflow-y-scroll  max-lg:inset-0  max-lg:bg-white  max-lg:px-3 max-lg:py-10
       ">

                                    <div class=" lg:w-full lg:h-full lg:pt-28">
                                        <div class=" lg:max-w-sm lg:mx-auto lg min lg:max-h-4/5 lg:relative">


                                            {{-- mobile close btn --}}
                                            <div class="relative mb-7 lg:hidden pb-7">


                                                <button data-select="close-filter-btn"
                                                    class="absolute left-0 flex items-center justify-center w-7 h-7 rounded-full bg-[#f1f4f7]">
                                                    <i class="text-gray-500 fal fa-times"></i>
                                                </button>

                                                <h4 class="absolute top-0 text-lg font-bold -translate-x-1/2 left-2/4">
                                                    {{ __('Filters') }}
                                                </h4>
                                                <div class="absolute top-0 right-0">
                                                    <button data-select="reset-btn"
                                                        class=" hidden text-sm  cursor-pointe  text-[#000000] lg:!hidden">
                                                        {{ __('reset filters') }}</button>
                                                </div>
                                            </div>


                                            {{-- Desktop Close Button --}}
                                            <button data-select="close-filter-btn"
                                                class="max-lg:hidden absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                                                <i class="text-white far fa-times"></i>
                                            </button>

                                            <div
                                                class="bg-white lg:border-2 lg:rounded-lg lg:shadow-2xl lg:p-5 lg:w-full lg:h-full lg:flex lg:flex-col lg:gap-7">


                                                <div
                                                    class="flex flex-col gap-5 lg:w-full lg:h-full lg:flex-row lg:gap-10 lg:pr-2">

                                                    <div class="space-y-5">



                                                        {{-- Checkout and Check in --}}
                                                        <div data-id="checkout-and-checkin-filter" class="relative mt-5">
                                                            <h4 class="mb-1 text-base font-medium lg:text-sm">
                                                                {{ __('When') }}</h4>
                                                            <button data-id="toggle-calender-btn" type="button"
                                                                class="grid w-full grid-cols-2 gap-3 pt-2">
                                                                <div
                                                                    class="flex items-center justify-between gap-5 p-3 border rounded-lg ">
                                                                    <div class="flex flex-col text-left">
                                                                        <span
                                                                            class="text-xs text-[#9CA3AF]">DD/MM/YYYY</span>
                                                                        <span data-id="check-in"
                                                                            class="text-xs font-medium whitespace-nowrap">{{ __('Check in') }}</span>
                                                                    </div>
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 2V5" stroke="#292D32"
                                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M16 2V5" stroke="#292D32"
                                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M3.5 9.09009H20.5" stroke="#292D32"
                                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                                                            stroke="#292D32" stroke-width="1.5"
                                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15.6947 13.7H15.7037" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15.6947 16.7H15.7037" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M11.9955 13.7H12.0045" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M11.9955 16.7H12.0045" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M8.29431 13.7H8.30329" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M8.29431 16.7H8.30329" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between gap-5 p-3 border rounded-lg ">
                                                                    <div class="flex flex-col text-left">
                                                                        <span
                                                                            class="text-xs text-[#9CA3AF]">DD/MM/YYYY</span>
                                                                        <span data-id="check-out"
                                                                            class="text-xs font-medium whitespace-nowrap">{{ __('Check Out') }}</span>
                                                                    </div>
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 2V5" stroke="#292D32"
                                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M16 2V5" stroke="#292D32"
                                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M3.5 9.09009H20.5" stroke="#292D32"
                                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                                                            stroke="#292D32" stroke-width="1.5"
                                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15.6947 13.7H15.7037" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15.6947 16.7H15.7037" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M11.9955 13.7H12.0045" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M11.9955 16.7H12.0045" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M8.29431 13.7H8.30329" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M8.29431 16.7H8.30329" stroke="#292D32"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                            {{-- Calender --}}
                                                            <div data-id="calender-selector-wrapper"
                                                                class="absolute left-0 z-20 hidden w-full h-auto pt-2 top-full lg:w-auto">

                                                                <div
                                                                    class="px-6 py-3 bg-white border-2 rounded-lg lg:shadow-2xl">

                                                                    <div class="pb-3 border-b ">
                                                                        <div class="flex justify-between">

                                                                            <h4
                                                                                class="text-[13px] font-semibold lg:text-sm">
                                                                                {{ __('Select your check-in') }} <span
                                                                                    class="whitespace-nowrap">{{ __('and check-out dates') }}</span>
                                                                            </h4>
                                                                            <button class="close-dropdown-btn">
                                                                                <i class="text-lg far fa-times"></i>
                                                                            </button>
                                                                        </div>
                                                                        {{-- <p class="text-[10px] text-gray-500">See prices and availability for
                                                    your dates</p> --}}
                                                                    </div>
                                                                    <div class="flex justify-start lg:justify-center">
                                                                        <div data-id="calendar"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        {{-- Google rating filter --}}
                                                        <div data-id="guest-and-rooms-filter" class="mt-5">
                                                            <h4 class="mb-1 text-base font-medium lg:text-sm">
                                                                {{ __('Guests and rooms') }}
                                                            </h4>
                                                            <div class="flex flex-col gap-3 pt-2">

                                                                <div data-id="adults"
                                                                    class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-2">
                                                                        <svg width="15" height="16"
                                                                            viewBox="0 0 15 16" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.445 4C11.445 6.17562 9.67562 7.945 7.5 7.945C5.32438 7.945 3.555 6.17562 3.555 4C3.555 1.82438 5.32438 0.055 7.5 0.055C9.67562 0.055 11.445 1.82438 11.445 4ZM9.555 4C9.555 2.86662 8.63338 1.945 7.5 1.945C6.36662 1.945 5.445 2.86662 5.445 4C5.445 5.13338 6.36662 6.055 7.5 6.055C8.63338 6.055 9.555 5.13338 9.555 4ZM0.055 15C0.055 11.7214 2.72138 9.055 6 9.055H9C12.2786 9.055 14.945 11.7214 14.945 15V15.945H13.055V15C13.055 12.7636 11.2364 10.945 9 10.945H6C3.76362 10.945 1.945 12.7636 1.945 15V15.945H0.055V15Z"
                                                                                fill="#808080" stroke="white"
                                                                                stroke-width="0.11" />
                                                                        </svg>
                                                                        <span class="text-xs">{{ __('Adults') }}</span>
                                                                    </div>


                                                                    <div class="flex gap-2">
                                                                        <button data-id="adult-minus" type="button"
                                                                            class="w-8 h-8 flex justify-center items-center rounded-lg border border-black disabled:border-[#C9C9C9] disabled:text-[#C9C9C9]">
                                                                            <i class="text-sm fal fa-minus"></i>
                                                                        </button>
                                                                        <div data-id="adult-count"
                                                                            class="flex items-center justify-center border border-[#C9C9C9] rounded-lg w-8 h-8">
                                                                            2
                                                                        </div>
                                                                        <button data-id="adult-plus" type="button"
                                                                            class="flex items-center justify-center w-8 h-8 border border-black rounded-lg">
                                                                            <i class="text-sm fal fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div data-id="rooms"
                                                                    class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-2">
                                                                        <svg width="20" height="14"
                                                                            viewBox="0 0 20 14" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M9.09091 8.055H9.14591V8V2.66667C9.14591 2.44591 9.23559 2.23394 9.39563 2.07745C9.55571 1.92093 9.77309 1.83278 10 1.83278H17.2727C17.9819 1.83278 18.6617 2.10823 19.1627 2.59815C19.6638 3.08803 19.945 3.75219 19.945 4.44444V12.4444C19.945 12.6652 19.8553 12.8772 19.6953 13.0337C19.5352 13.1902 19.3178 13.2783 19.0909 13.2783C18.864 13.2783 18.6466 13.1902 18.4865 13.0337C18.3265 12.8772 18.2368 12.6652 18.2368 12.4444V9.77778V9.72278H18.1818H1.81818H1.76318V9.77778V12.4444C1.76318 12.6652 1.6735 12.8772 1.51346 13.0337C1.35338 13.1902 1.136 13.2783 0.909091 13.2783C0.682178 13.2783 0.464801 13.1902 0.304718 13.0337C0.144677 12.8772 0.055 12.6652 0.055 12.4444V0.888889C0.055 0.668132 0.144677 0.45616 0.304718 0.299675C0.464801 0.143149 0.682178 0.055 0.909091 0.055C1.136 0.055 1.35338 0.143149 1.51346 0.299675C1.6735 0.45616 1.76318 0.668132 1.76318 0.888889V8V8.055H1.81818H9.09091ZM18.1818 8.055H18.2368V8V4.44444C18.2368 4.19371 18.1349 3.95349 17.954 3.77658C17.7731 3.59971 17.528 3.50056 17.2727 3.50056H10.9091H10.8541V3.55556V8V8.055H10.9091H18.1818ZM6.93966 6.61565C6.50017 6.90278 5.98334 7.05611 5.45455 7.05611C4.74542 7.05611 4.06558 6.78066 3.56452 6.29074C3.06351 5.80086 2.78227 5.1367 2.78227 4.44444C2.78227 3.92818 2.93883 3.42341 3.23231 2.99396C3.5258 2.56448 3.94307 2.22956 4.43151 2.03174C4.91996 1.83392 5.4575 1.78214 5.97611 1.88301C6.49472 1.98387 6.97092 2.23281 7.34457 2.59815C7.7182 2.96348 7.97251 3.42879 8.07552 3.93517C8.17853 4.44153 8.12567 4.96641 7.92357 5.44348C7.72147 5.92056 7.37913 6.32853 6.93966 6.61565ZM5.98969 3.65932C5.83118 3.55576 5.64495 3.50056 5.45455 3.50056C5.19925 3.50056 4.95416 3.59971 4.77327 3.77658C4.59234 3.95349 4.49045 4.19371 4.49045 4.44444C4.49045 4.63141 4.54716 4.81407 4.65325 4.96932C4.75934 5.12455 4.90998 5.24536 5.08601 5.31665C5.26202 5.38793 5.45563 5.40657 5.6424 5.37024C5.82918 5.33391 6.00091 5.24422 6.13582 5.11231C6.27074 4.98039 6.36277 4.81216 6.40006 4.62882C6.43736 4.44548 6.41821 4.25545 6.34508 4.08283C6.27196 3.91022 6.14821 3.76288 5.98969 3.65932Z"
                                                                                fill="#808080" stroke="white"
                                                                                stroke-width="0.11" />
                                                                        </svg>

                                                                        <span class="text-xs">{{ __('Rooms') }}</span>
                                                                    </div>


                                                                    <div class="flex gap-2">
                                                                        <button type="button" data-id="rooms-minus"
                                                                            class="w-8 h-8 flex justify-center items-center rounded-lg border border-black disabled:border-[#C9C9C9] disabled:text-[#C9C9C9]">
                                                                            <i class="text-sm fal fa-minus"></i>
                                                                        </button>
                                                                        <div data-id="rooms-count"
                                                                            class="flex items-center justify-center border border-[#C9C9C9] rounded-lg w-8 h-8">
                                                                            1
                                                                        </div>
                                                                        <button type="button" data-id="rooms-plus"
                                                                            class="flex items-center justify-center w-8 h-8 border border-black rounded-lg">
                                                                            <i class="text-sm fal fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    </div>

                                                </div>




                                                <div
                                                    class="clear-both fixed z-10 left-0 bottom-0 w-full bg-white [box-shadow:0px_-4px_63px_0px_rgba(0,0,0,0.10)] lg:static lg:shadow-none p-5 lg:p-0 flex flex-col items-center gap-2 lg:flex-row  lg:justify-end  lg:gap-3 ">
                                                    <button data-select="apply-btn"
                                                        class="lg:order-2 w-full py-5   lg:w-auto lg:px-5 lg:py-2 text-[13px] bg-[#000000] text-white rounded-lg focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]">{{ __('Apply') }}
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                </div>
                            </div>

                            {{-- <div class="flex flex-col items-center gap-2 pt-3 lg:pt-0">
                                <button type="button"
                                    class="py-4  w-full block bg-[#000000] text-white rounded-xl lg:px-20 lg:text-sm">Send
                                    Request</button>

                                <span class="text-xs text-[#999] lg:hidden">Send request and get quote via email</span>



                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>




            {{-- Hotel Gallery Popup --}}
            <div data-id="hotel-gallery-popup" aria-expanded="false"
                class="w-screen h-screen hidden  fixed top-0 z-[99999999]
            overflow-y-scroll
            inset-0 bg-black/50">
                <div class="flex items-center justify-center w-full h-full">

                    <div class="max-lg:px-3 w-full lg:max-w-[700px] -translate-y-5">
                        <div class="relative p-4 pb-5 bg-white rounded-lg ">
                            {{-- Desktop Close Button --}}
                            <button
                                class="handle-close  absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                                <i class="text-white far fa-times"></i>
                            </button>

                            <div>
                                {{-- Gallery --}}
                                <div class="col-span-12 space-y-4 lg:col-start-1 lg:col-end-6">
                                    <div data-id="hotel-details-thumb-slider-wrapper" class="relative">
                                        <swiper-container slides-per-view='1' space-between='10'
                                            thumbs-swiper='#{{ $id }} [data-id="hotel-details-popup-mini-thumbs"]'
                                            navigation-prev-el='#{{ $id }} [data-id="hotel-details-thumb-slider-wrapper"] .swiper-navigation-left'
                                            navigation-next-el='#{{ $id }} [data-id="hotel-details-thumb-slider-wrapper"] .swiper-navigation-right'>


                                            @foreach ($hotel->gallery as $image)
                                                <swiper-slide>
                                                    <img class="object-cover w-full min-h-full rounded-lg h-80 lazyload lg:h-full lg:aspect-video"
                                                        alt="{{ $hotel->title }}"
                                                        src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                                        data-srcset={{ $image->getSrcset() }} />
                                                </swiper-slide>
                                            @endforeach

                                        </swiper-container>
                                        <div
                                            class="swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-[30px] h-[30px] z-20  bg-white/40 rounded-full flex justify-center items-center text-white duration-300 hover:bg-[#000000] aria-disabled:hidden">
                                            <i class="far fa-chevron-left"></i>
                                        </div>
                                        <div
                                            class="swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-[30px] h-[30px] z-20  bg-white/40 rounded-full flex justify-center items-center text-white duration-300 hover:bg-[#000000] aria-disabled:hidden ">
                                            <i class="far fa-chevron-right"></i>
                                        </div>
                                    </div>
                                    {{-- Mini thumbs --}}
                                    <div class="relative">
                                        <swiper-container data-id="hotel-details-popup-mini-thumbs" slides-per-view='2'
                                            space-between='15' init="false">

                                            @foreach ($hotel->gallery as $image)
                                                <swiper-slide>
                                                    <div class="relative w-full h-full group">
                                                        <img class="object-cover w-full h-32 min-h-full rounded-lg lazyload lg:h-40"
                                                            alt="{{ $hotel->title }}"
                                                            src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                                            data-srcset={{ $image->getSrcset() }} />


                                                        <div
                                                            class="load-more-text hidden group-data-[remaining='true']:flex absolute inset-0 z-10 w-full h-full bg-black/40 rounded-lg text-white  justify-center items-center">
                                                            <span class=" text-[30px] text-white font-medium"></span>

                                                        </div>
                                                    </div>
                                                </swiper-slide>
                                            @endforeach
                                        </swiper-container>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- map popup --}}
        <div id="map-popup-wrapper"
            class="z-[99999]
        lg:w-screen lg:h-screen lg:fixed lg:inset-0 lg:bg-black/50
                hidden
        max-lg:fixed max-lg:w-screen max-lg:overflow-x-hidden
        max-lg:overflow-y-scroll  max-lg:inset-0  max-lg:bg-white  max-lg:px-3 max-lg:py-5
       ">

            <div class=" lg:w-full lg:h-full lg:pt-28">
                <div class=" lg:max-w-2xl lg:mx-auto lg min lg:relative">


                    {{-- mobile close btn --}}
                    <div class="relative mb-7 lg:hidden pb-7">


                        <button data-select="close-filter-btn"
                            class="absolute left-0 flex items-center justify-center w-7 h-7 rounded-full bg-[#f1f4f7]">
                            <i class="text-gray-500 fal fa-times"></i>
                        </button>

                        <h4 class="absolute top-0 text-lg font-bold -translate-x-1/2 left-2/4">{{ __('Location') }}
                        </h4>

                    </div>


                    {{-- Desktop Close Button --}}
                    <button data-select="close-filter-btn"
                        class="max-lg:hidden absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>

                    <div
                        class="bg-white lg:border-2 lg:rounded-lg lg:shadow-2xl lg:p-5 lg:w-full h-[400px] lg:flex lg:flex-col lg:gap-7">

                        <iframe class="flex-1 w-full h-full border-0 rounded-lg"
                            src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_API_KEY') }}&q=place_id:{{ $hotel->parentHotel->google_place_id }}"
                            allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>

            </div>




        </div>

    </section>

@endsection




@prepend('header')
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css" />
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.css"
        rel="stylesheet">
@endprepend

@prepend('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
@endprepend
