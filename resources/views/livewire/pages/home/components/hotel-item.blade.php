@php
    $hideOoohCategoryBadge = isset($hideOoohCategoryBadge) ? $hideOoohCategoryBadge : false;
    $hideFavButton = isset($hideFavButton) ? $hideFavButton : false;
    $id = 'item-' . $hotel->id;
    // $customerFavoriteHotels
    $gallery = $hotel->gallery;
@endphp





<article wire:ignore wire:key="{{ $id }}" id="{{ $id }}" {{-- href="{{ route('hotels.show', [$hotel->slug, 'check-in' => $checkIn, 'check-out' => $checkOut, 'adults' => $adults, 'rooms' => $rooms]) }}" --}}
    data-select="single-hotel-item" class="relative h-full bg-white group">

    <a href="{{ route('hotels.show', $hotel->slug) }}" data-id="link">


        {{-- _____Thumbnail_____ --}}
        <div class="relative overflow-hidden lg:rounded-t-lg">


            <div data-id="hotel-listing-gallery-thumb-sliders-wrapper" class="relative group">
                <swiper-container data-id="hotel-listing-gallery-thumb-sliders" init="false"
                    navigation-prev-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-left'
                    navigation-next-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-right'>


                    <swiper-slide wire:key='{{ $id }}-{{ $hotel->thumbnail->id }}-thumbs'>
                        <img alt="{{ $hotel->parentHotel->title }}"
                            src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }}
                            data-srcset={{ $hotel->thumbnail->getSrcset() }}
                            class="object-cover w-full h-[200px] lg:rounded-lg lazyload " />
                        {{-- class="object-cover w-full min-h-full h-[200px] lazyload " /> --}}
                    </swiper-slide>
                    @foreach ($gallery as $image)
                        <swiper-slide wire:key='{{ $id }}-{{ $image->id }}-thumbs'>
                            <img alt="{{ $hotel->parentHotel->title }}"
                                src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                                data-srcset={{ $image->getSrcset() }}
                                class="object-cover w-full h-[200px] lg:rounded-lg lazyload " />
                            {{-- class="object-cover w-full min-h-full h-[200px] lazyload " /> --}}
                        </swiper-slide>
                    @endforeach
                </swiper-container>
                <div
                    class=" lg:opacity-0 swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-7 h-7 z-20  bg-white/90 rounded-full group-hover:opacity-100 flex justify-center items-center text-black duration-300 hover:bg-[#000000] hover:text-white aria-disabled:hidden">
                    <i class="text-xs leading-none far fa-chevron-left"></i>
                </div>
                <div
                    class="lg:opacity-0 swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-7 h-7 z-20  bg-white/90 rounded-full group-hover:opacity-100 flex justify-center items-center text-black duration-300 hover:bg-[#000000] hover:text-white aria-disabled:hidden ">
                    <i class="text-xs leading-none far fa-chevron-right"></i>
                </div>
            </div>



            {{-- @if (!$hideOoohCategoryBadge)
            <div class="absolute z-10 flex gap-2 top-3 left-3">
                @php
                    $iconAbleCategories = $hotel->categories->filter(function ($category) {
                        return $category->svg !== null && $category->svg !== '';
                    });
                @endphp
                @if ($iconAbleCategories->isNotEmpty())
                    @foreach ($iconAbleCategories as $iconAbleCategory)
                        <span
                            class="flex items-center justify-center h-8 px-4 text-sm font-bold text-white bg-white rounded-lg ">
                            {!! $iconAbleCategory->svg_active !!}</span>
                    @endforeach

                @endif
            </div>
        @endif --}}


            {{-- @if (!$hideFavButton) --}}
            {{-- <livewire:components.hotel.favorite-hotel-icon wire:key="item-{{ str()->uuid() }}" :hotel="$hotel"
            :customerFavoriteHotels="$customerFavoriteHotels" :wrapperClass="'absolute z-10 top-3 right-3'" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'" /> --}}
            {{-- @endif --}}
        </div>

        <div class="flex justify-between gap-3 px-3 pt-3 lg:px-0">

            <div class="flex items-center gap-2">
                <div class="shrink-0">
                    <img src="{{ $hotel->admin->avatar->getUrl() }}"
                        class="w-[40px] h-[40px] rounded-full object-cover" />
                </div>
                <div class="">
                    <h3 class="text-[15px] font-medium leading-4 line-clamp-2">{{ $hotel->admin->username }}</h3>
                    <p class=" line-clamp-1 text-[#797979] text-[13px]">{{ __('traveled here') }}
                        {{ $hotel->created_at->diffForHumans() }}</p>
                    </p>
                </div>
            </div>
        </div>



        {{-- ____Info___ --}}
        <div class="flex justify-between gap-3 px-3 py-3 lg:px-0">

            <div class="flex gap-3">
                {{-- <div class="shrink-0">
                <img src="{{ $hotel->admin->avatar->getUrl() }}" class="w-[50px] h-[50px] rounded-full object-cover" />
            </div> --}}

                <div class="">
                    <h3 class="text-[15px] font-medium leading-4 line-clamp-2">{{ $hotel->headline }}</h3>
                    {{-- <p class="text-[13px] line-clamp-1 pt-1">Uploaded by <b>{{ $hotel->admin->username }}</b></p> --}}
                    <p class="text-[#797979] text-[13px] line-clamp-1 pt-[2px]">
                        <b>{{ $hotel->parentHotel->title }}</b>,
                        {{ $hotel->parentHotel->address }}
                    </p>
                    <p class="text-[#797979] text-[13px] flex gap-1 items-center">
                        @if ($hotel->parentHotel->ratings->isNotEmpty())
                            {{-- @php
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
                                    $highestRatingName = $hotel->parentHotel->ratings->sortByDesc('created_at')->first()->type;
                                }
                            @endphp --}}

                            <b>{{ number_format($hotel->parentHotel->best_rating, 1) }}/10</b>
                            <i class="text-[3px] fas fa-circle leading-none"></i>
                            @switch($hotel->parentHotel->best_rating_type)
                                @case('romantic')
                                    <span>Romantic</span>
                                @break

                                @case('intimate')
                                    <span>Intimate</span>
                                @break

                                @case('luxury')
                                    <span>Luxurious</span>
                                @break
                            @endswitch
                        @else
                            <b>New</b>
                        @endif
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
                            {{-- <i class="fas fa-star text-[#F4BE18] leading-none text-[13px] ml-[2px]"></i> --}}
                        </span>
                    </p>
                </div>


            </div>

            {{-- <div class="space-y-[1px] w-full overflow-hidden">
            <div class="flex items-center justify-between">
                <h3
                    class="flex-1 block overflow-hidden text-base font-medium text-ellipsis whitespace-nowrap hover:underline hover:decoration-2 ">
                    {{ $hotel->parentHotel->title }}</h3>
                <livewire:components.hotel.favorite-hotel-icon wire:key="item-{{ str()->uuid() }}" :hotel="$hotel"
                    :customerFavoriteHotels="$customerFavoriteHotels" :wrapperClass="'[&>button]:!bg-transparent'" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'" />
            </div>
            <p
                class=" text-ellipsis overflow-hidden w-full whitespace-nowrap  text-[11px] font-medium  text-[#4C4B4B] ">
                {{ $hotel->address }}
            </p>

            <div class="flex items-center gap-1 text-xs ">
                @if ($hotel->ratings->isNotEmpty())
                    @php
                        $ratingsCollection = collect(['romantic' => $hotel->romantic_avg, 'intimate' => $hotel->intimate_avg, 'luxury' => $hotel->luxury_avg]);
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
                            $highestRatingName = $hotel->ratings->sortByDesc('created_at')->first()->type;
                        }
                    @endphp
                    <span><b>
                            {{ number_format(collect([$hotel->romantic_avg, $hotel->intimate_avg, $hotel->luxury_avg])->avg(), 1) }}/10</b>
                        average</span>
                    <i class="text-[3px] fas fa-circle leading-none"></i>
                    @switch($highestRatingName)
                        @case('romantic')
                            <span>😍 Romantic</span>
                        @break

                        @case('intimate')
                            <span>💓 Intimate</span>
                        @break

                        @case('luxury')
                            <span>✨ Luxurious</span>
                        @break
                    @endswitch
                @else
                    <span><b>New</b> (no ratings)</span>
                @endif
                <i class="text-[3px] fas fa-circle leading-none"></i>
                <div class="flex items-center ">
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


                    <span>{{ $hotel->google_rating }}</span>
                    <i class="fas fa-star text-[#F4BE18] leading-none text-[13px] ml-[2px]"></i>
                </div>
            </div>
            <div
                class="text-[12px] font-semibold text-[#000000] w-full overflow-hidden text-ellipsis whitespace-nowrap">
                {!! $hotel->categories->pluck('title')->implode('&nbsp;&nbsp;&nbsp;') !!}
            </div>

        </div> --}}
            {{-- <div class="relative flex flex-col items-end ">
            <livewire:components.hotel.favorite-hotel-icon wire:key="item-{{ str()->uuid() }}" :hotel="$hotel"
                :customerFavoriteHotels="$customerFavoriteHotels" :wrapperClass="'[&>button]:!bg-transparent'" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'" /> --}}
            {{-- @endif --}}
            {{-- @if ($hotel->ratings->isNotEmpty())
                @php
                    $romanticRating = $hotel->romantic_avg;
                    $intimateRating = $hotel->intimate_avg;
                    $luxuryRating = $hotel->luxury_avg;

                    $array = [
                        'romantic' => $romanticRating,
                        'intimate' => $intimateRating,
                        'luxury' => $luxuryRating,
                    ];

                    $collection = collect($array);

                    $allSameRating = $collection->every(function ($value) use ($collection) {
                        return $value === $collection->first();
                    });

                    if (!$allSameRating) {
                        $highestRating = $collection->max();
                        $highestRatingName = $collection
                            ->keys()
                            ->filter(function ($key) use ($collection, $highestRating) {
                                return $collection[$key] === $highestRating;
                            })
                            ->first();
                    } else {
                        $latestRatingType = $hotel->ratings->sortByDesc('created_at')->first()->type;
                        // $latestRating = $array[$latestRatingType];
                    }

                @endphp
            @endif --}}
            {{-- <div
                class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  ">
                @if ($hotel->ratings->isNotEmpty())
                    {{ number_format(collect([$romanticRating, $intimateRating, $luxuryRating])->avg(), 1) }}

                @else
                    <i class="fas fa-asterisk"></i>
                @endif
            </div> --}}
            {{-- <h5 class="text-[#000000] mt-1 text-xs leading-3 whitespace-nowrap font-medium">
                @if ($hotel->ratings->isNotEmpty())
                    @if (!$allSameRating)
                        {{ ucfirst($highestRatingName == 'luxury' ? 'luxurious' : $highestRatingName) }}
                    @else
                        {{ ucfirst($latestRatingType == 'luxury' ? 'luxurious' : $latestRatingType) }}
                    @endif
                @else
                    New
                @endif
            </h5> --}}


            {{-- <h5 class="text-[#000000] mt-1 text-[10px] leading-3 whitespace-nowrap font-medium">Couple Rating
            </h5> --}}

            {{-- <div data-id='view-score-container' class="flex ">
                <button type="button" class="text-[#A1A1A1] underline text-[10px] whitespace-nowrap">view
                    all</button>
                <div class="absolute right-0 z-20 hidden pb-2 bottom-full">

                    <div
                        class="flex flex-col gap-x-2 px-2 py-1 rounded-lg bg-white border  [box-shadow:0px_4px_14px_0px_rgba(0,0,0,0.10);]">
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[10px]  font-normal  ">Romantic</span>
                            <span class="flex items-center text-[10px]  justify-center font-bold  rounded-md  ">
                                {{ number_format($romanticRating, 1) }}/5
                            </span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[10px]  font-normal  ">Intimate</span>
                            <span class="flex items-center text-[10px]  justify-center font-bold  rounded-md  ">
                                {{ number_format($intimateRating, 1) }}/5
                            </span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[10px]  font-normal  ">Luxurious</span>
                            <span class="flex items-center text-[10px]  justify-center font-bold  rounded-md  ">
                                {{ number_format($luxuryRating, 1) }}/5
                            </span>
                        </div> --}}
            {{-- <div class="flex flex-col items-center justify-center">
                            <div
                                class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ number_format($intimateRating, 1) }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Intimate</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div
                                class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md ">
                                {{ number_format($luxuryRating, 1) }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Luxurious</span>
                        </div> --}}
            {{-- </div>
                </div>
            </div> --}}

            {{-- </div> --}}
        </div>

        {{--
    <div class="flex justify-between p-3">
        <a href="#" class="block text-sm text-[#74737A] font-medium">More details...</a> --}}
        {{-- <div class="flex items-center gap-1">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.4067 7.51794C14.4067 6.99673 14.3599 6.49557 14.2731 6.01446H7.35037V8.86105H11.3062C11.1325 9.7765 10.6113 10.5516 9.82944 11.0728V12.9238H12.215C13.6048 11.6408 14.4067 9.75645 14.4067 7.51794Z"
                    fill="#4285F4" />
                <path
                    d="M7.35103 14.7007C9.33562 14.7007 10.9995 14.0459 12.2156 12.9233L9.8301 11.0723C9.17525 11.5134 8.33998 11.7807 7.35103 11.7807C5.43994 11.7807 3.81618 10.491 3.23484 8.75365H0.789177V10.6514C1.99864 13.0503 4.47771 14.7007 7.35103 14.7007Z"
                    fill="#34A853" />
                <path
                    d="M3.23415 8.74691C3.08714 8.30589 3.00028 7.83814 3.00028 7.35034C3.00028 6.86255 3.08714 6.3948 3.23415 5.95378V4.05605H0.788491C0.287332 5.04501 0 6.16092 0 7.35034C0 8.53976 0.287332 9.65568 0.788491 10.6446L2.6929 9.1612L3.23415 8.74691Z"
                    fill="#FBBC05" />
                <path
                    d="M7.35103 2.92676C8.43353 2.92676 9.39576 3.30096 10.1642 4.02263L12.2691 1.91776C10.9928 0.728337 9.33562 -1.52588e-05 7.35103 -1.52588e-05C4.47771 -1.52588e-05 1.99864 1.65047 0.789177 4.05604L3.23484 5.95376C3.81618 4.21641 5.43994 2.92676 7.35103 2.92676Z"
                    fill="#EA4335" />
            </svg>
            <span>3.2</span>
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.95627 1.09434C8.17952 0.645021 8.82048 0.645022 9.04373 1.09434L10.867 4.76392C10.9554 4.94185 11.1252 5.06527 11.3218 5.09437L15.3752 5.69441C15.8715 5.76788 16.0696 6.37747 15.7112 6.72864L12.7847 9.59661C12.6428 9.73567 12.5779 9.93537 12.6109 10.1313L13.2928 14.1717C13.3763 14.6664 12.8578 15.0432 12.4131 14.8109L8.78109 12.9138C8.60499 12.8218 8.39501 12.8218 8.21891 12.9138L4.58695 14.8109C4.14223 15.0432 3.62368 14.6664 3.70718 14.1717L4.38907 10.1313C4.42213 9.93537 4.35725 9.73567 4.21534 9.59661L1.28878 6.72864C0.930437 6.37747 1.12851 5.76788 1.62482 5.69441L5.67821 5.09437C5.87475 5.06527 6.04462 4.94185 6.13303 4.76392L7.95627 1.09434Z"
                    fill="#FCD503" />
            </svg>

        </div> --}}
        {{-- </div> --}}


    </a>


    <div data-id="details-popup" {{-- flex --}} class="hidden">
        <div class="fixed  flex justify-end inset-0 w-screen h-screen z-[99]      bg-white/80 ">



            <div data-id="left-sidebar" class="flex-1 h-full ">
                <iframe data-id="map" class="hidden w-full h-full border-0 pt-[50px] pb-14 bg-white"
                    src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_API_KEY') }}&q=place_id:{{ $hotel->parentHotel->google_place_id }}"
                    allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div data-id="sidebar"
                class="relative flex items-center justify-start bg-white flex-1 h-full max-w-[553px] mx-auto duration-500 translate-x-full ">
                <div
                    class="flex-1 h-full max-w-[455px]  pl-3 pr-4 overflow-x-hidden overflow-y-auto pt-[65px] pb-24 shadow-sm">

                    {{-- Title and Desc --}}
                    <div class="">
                        {{-- ____Headline___ --}}
                        <div class="space-y-[1px]">
                            <div class="relative flex items-start justify-between ">
                                <h2 class="text-base font-medium ">
                                    {{ $hotel->headline }}</h2>


                                <button type="button" data-id="close-popup" class="px-1 text-lg">&#10005</button>

                            </div>

                            <p class="text-[#797979] text-[13px] flex gap-1 items-center">
                                @if ($hotel->parentHotel->ratings->isNotEmpty())
                                    <b>{{ number_format($hotel->parentHotel->best_rating, 1) }}/10</b>
                                    <i class="text-[3px] fas fa-circle leading-none"></i>
                                    @switch($hotel->parentHotel->best_rating_type)
                                        @case('romantic')
                                            <span> {{ __('Romantic') }} </span>
                                        @break

                                        @case('intimate')
                                            <span> {{ __('Intimate') }} </span>
                                        @break

                                        @case('luxury')
                                            <span> {{ __('Luxurious') }} </span>
                                        @break
                                    @endswitch
                                    <i class="text-[3px] fas fa-circle leading-none"></i>
                                    <span> {{ __('based on') }} <b
                                            class="text-black">{{ $hotel->parentHotel->opinions->unique('admin_id')->count() }}</b>
                                        {{ __('travelers') }} </span>
                                    <span class="flex items-center">
                                        <i class="text-[3px] fas fa-circle leading-none"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 34 34" fill="none">
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
                                @else
                                    <b>{{ __('New') }}</b>
                                @endif
                            </p>

                            <div class="flex gap-2 pt-1">
                                <livewire:components.hotel.favorite-hotel-icon wire:key="item-{{ str()->uuid() }}"
                                    :hotel="$hotel" :customerFavoriteHotels="$customerFavoriteHotels" :wrapperClass="' '" :iconClass="'w-6 h-6'"
                                    :activeIconClass="'!w-8 !h-8'" />

                                <button type="button" data-id="open-map-popup"
                                    class="flex group  items-center shadow justify-center gap-2 px-3 py-1  text-xs border border-[#E5E5E5] rounded-3xl hover:border-black hover:bg-black hover:text-white transition">

                                    <i class="fas fa-map-marker"></i>
                                    {{ __('View Location') }}

                                </button>

                            </div>
                        </div>
                        <div class="pt-3">
                            <h4 class="text-sm"> {{ __('Description') }} </h4>
                            <div class="pt-3 text-xs text-[#6B7280] text-justify">
                                {{-- <p>{{ $hotel->excerpt }}</p> --}}
                                <p>{{ $hotel->description }}</p>
                            </div>
                        </div>

                        {{-- Gallery --}}
                        {{-- <div class="pt-3" data-id="popup-details-gallery">
                            <h2 class="text-sm"> {{ __('Gallery') }} </h2>
                            <div class="relative mt-3">
                                <button type="button" data-id="prev"
                                    class="absolute left-0 flex items-center justify-center h-full lg:hidden w-9 lg:w-12 bg-gradient-to-r from-white to-transparent">
                                    <div
                                        class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                                        <i class="text-xs leading-none far fa-chevron-left"></i>
                                    </div>
                                </button>

                                <ul class="flex gap-3 overflow-x-auto overflow-y-hidden no-scrollbar ">
                                    @foreach ($gallery as $galleryImage)
                                        <li data-select="show-hotel-gallery-popup" tabindex="-1"
                                            class="cursor-pointer shrink-0">
                                            <img alt="{{ $hotel->title }}"
                                                src={{ $galleryImage->responsiveImages()->getPlaceholderSvg() }}
                                                data-srcset={{ $galleryImage->getSrcset() }}
                                                class="object-cover w-28 h-28 rounded-xl lazyload ">
                                        </li>
                                    @endforeach
                                </ul>
                                <button type="button" data-id="next"
                                    class="absolute top-0 right-0 flex items-center justify-center h-full {{ $gallery->count() < 3 ? 'lg:hidden' : '' }} w-9 lg:w-12 bg-gradient-to-r from-transparent to-white">
                                    <div
                                        class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                                        <i class="text-xs leading-none far fa-chevron-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div> --}}

                        <div class="pt-3">
                            <h2 class="text-sm"> {{ __('Tags') }} </h2>
                            <div class="flex flex-wrap gap-2 pt-3 ">
                                @foreach ($hotel->tags as $tag)
                                    <span class="block text-[#646464] text-xs bg-[#F8F8F8] rounded-lg p-2 ">
                                        {{ $tag->title }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        @if ($hotel->parentHotel->opinions->count())
                            <div class="pt-3 ">
                                <h2 class="text-sm"> {{ __('Opinions') }}
                                    ({{ $hotel->parentHotel->opinions->count() }})</h2>
                                <div class="pr-1 mt-3 space-y-5 ">
                                    @foreach ($hotel->parentHotel->opinions as $opinion)
                                        <div class="flex flex-col gap-2">
                                            <div class="flex justify-between">
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ $hotel->admin->avatar->getUrl() }}"
                                                        class="w-[30px] h-[30px] rounded-full object-cover" />
                                                    <h3 class="text-xs ">{{ $opinion->admin->username }}</h3>
                                                </div>

                                                <h3 class="text-xs "> {{ __('Date') }} :
                                                    {{ $opinion->created_at->format('d/m/Y') }}
                                                </h3>
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
                    </div>

                </div>
                {{-- <div class="absolute top-0 w-screen h-full bg-white left-full"> </div> --}}
            </div>

        </div>

    </div>


</article>
