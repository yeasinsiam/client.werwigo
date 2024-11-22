@php
$notActiveHotel = !isset($activeHotelSlug) || $activeHotelSlug != $hotel->slug;
@endphp

<article wire:ignore wire:key="item-{{ $id }}" id={{ $id }} aria-expanded="{{ $notActiveHotel ? 'false' : 'true' }}" data-hotel-id="{{ $hotel->id }}" class="grid grid-cols-6 border-2 rounded-lg shadow-lg group lg:grid-cols-4 ">
    {{-- _____Thumbnail_____ --}}
    <div class="relative col-start-1 col-end-7 row-start-1 row-end-2 toggle-details-btn lg:col-start-1 lg:col-end-2 lg:row-start-1 lg:row-end-3">
        <img alt="{{ $hotel->title }}" src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $hotel->thumbnail->getSrcset() }} class="object-cover w-full h-56 min-h-full rounded-t-lg lazyload lg:rounded-l-lg group-aria-expanded:lg:rounded-br-lg lg:rounded-tr-none" />

        <livewire:components.hotel.favorite-hotel-icon :wire:key="'fav-item-'.$hotel->id" :hotel="$hotel" :wrapperClass="'absolute top-3 right-3'" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'">

            {{-- <i class="absolute text-2xl text-white fal fa-heart top-3 right-3"></i> --}}
    </div>


    {{-- ____Ratings_____ --}}
    <div class="hidden lg:flex lg:col-start-4 lg:col-end-5 lg:row-start-1 lg:row-end-2 lg:px-2 lg:justify-end lg:border-b">

        <div class="relative flex flex-col items-end mt-3">
            <div class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  lg:text-white">
                {{ round(collect([$hotel->getRomanticRating(), $hotel->getIntimateRating(), $hotel->getLuxuryRating()])->avg(), 1) }}
            </div>
            <h5 class="text-[#000000] mt-1 text-[10px] leading-3 whitespace-nowrap font-medium">Couple Rating
            </h5>

            <div data-id='mobile-view-score-container' class="flex ">
                <button type="button" class="text-[#A1A1A1] underline text-[9px]">view
                    score</button>
                <div class="absolute hidden pb-2 -right-3 bottom-full">

                    <div class="flex flex-col gap-2 px-2 py-3 rounded-lg bg-white border  [box-shadow:0px_4px_14px_0px_rgba(0,0,0,0.10);]">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ $hotel->getRomanticRating() }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Romantic</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ $hotel->getIntimateRating() }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Intimate</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md ">
                                {{ $hotel->getLuxuryRating() }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Luxurious</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="flex flex-col items-center justify-center">
                <div
                    class=" flex items-center justify-center w-8 text-sm font-semibold text-[#000000] lg:text-white lg:bg-[#000000] rounded-md h-7 ">
                    {{ $hotel->getRomanticRating() }}
    </div>
    <span class="text-[10px]  font-normal  text-[#000000]">Romantic</span>
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class=" flex items-center justify-center w-8 text-sm font-semibold text-[#A929E5] bg-white lg:text-white lg:bg-[#A929E5] rounded-md h-7">
            {{ $hotel->getIntimateRating() }}
        </div>
        <span class="text-[10px]  font-normal  text-[#A929E5]">Intimate</span>
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class="flex items-center justify-center w-8 text-sm font-semibold text-black bg-white rounded-md lg:text-white lg:bg-black h-7">
            {{ $hotel->getLuxuryRating() }}
        </div>
        <span class="text-[10px]  font-normal  text-black">Luxury</span>
    </div>
    <div class="flex flex-col items-center justify-center">
        <i class="fal fa-heart text-[#000000] font-medium text-2xl"></i>
        <span class="text-[10px]  font-normal  text-[#000000]">Favorite</span>
    </div> --}}

    </div>

    {{-- ____Title___ --}}
    <div class="flex justify-between col-start-1 col-end-7 row-start-2 row-end-3 gap-3 px-3 pt-3 toggle-details-btn lg:col-start-2 lg:col-end-4 lg:row-start-1 lg:row-end-2 lg:pr-0 lg:pl-5">
        <div class="space-y-[1px] lg:border-b lg:pb-[10px] lg:w-full">
            <a href="#" class="block text-base font-medium lg:text-lg hover:underline hover:decoration-2 ">{{ $hotel->title }}</a>
            <div class=" space-x-[6px] [&>span]:text-[11px] [&>span]:font-medium flex flex-wrap items-center [&>span]:text-[#4C4B4B] ">
                <span>{{ $hotel->address }}</span>
                {{-- <i class="fas fa-circle text-[3px] text-[#4C4B4B]"></i>
                <span>Show on the map</span> --}}
            </div>
            <div class="flex gap-x-2 text-[12px] font-semibold text-[#000000] flex-wrap">

                @foreach ($hotel->categories as $categories)
                <span class="whitespace-nowrap">
                    {{ $categories->title }}
                </span>
                @endforeach

            </div>

        </div>
        <div class="relative flex flex-col items-end lg:hidden">
            <div class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  lg:text-white">
                {{ round(collect([$hotel->getRomanticRating(), $hotel->getIntimateRating(), $hotel->getLuxuryRating()])->avg(), 1) }}
            </div>
            <h5 class="text-[#000000] mt-1 text-[10px] leading-3 whitespace-nowrap font-medium">Couple Rating</h5>

            <div data-id='mobile-view-score-container' class="flex ">
                <button type="button" class="text-[#A1A1A1] underline text-[9px]">view
                    score</button>
                <div class="absolute hidden pb-2 -right-3 bottom-full">

                    <div class="flex flex-col gap-2 px-2 py-3 rounded-lg bg-white border  [box-shadow:0px_4px_14px_0px_rgba(0,0,0,0.10);]">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ $hotel->getRomanticRating() }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Romantic</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ $hotel->getIntimateRating() }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Intimate</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md ">
                                {{ $hotel->getLuxuryRating() }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Luxurious</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- ____Description___ --}}
    <div class="grid grid-cols-6 col-start-1 col-end-7 row-start-3 row-end-4 px-3 lg:block max-lg:group-aria-expanded:mt-3 lg:mt-3 lg:col-start-2 lg:col-end-5 lg:row-start-2 lg:row-end-3 lg:pl-5">


        {{-- __Tags__ --}}
        <div class="hidden col-span-5 max-lg:group-aria-expanded:block lg:block">
            <div class="flex flex-wrap gap-2 toggle-details-btn lg:max-w-lg">


                @foreach ($hotel->tags as $tag)
                <a href="#" class="text-[8px] font-medium bg-[#000000] text-white px-[6px] py-[2px] rounded-sm lg:text-[12px]">{{ $tag->title }}</a>
                @endforeach

            </div>
        </div>

        {{-- __Desc & Pricing & Booking__ --}}
        <div @class([ 'mt-5'=> $hotel->booking_type == 'direct',
            'flex items-end col-span-4 lg:col-span-5 lg:mt-0 lg:gap-x-5 lg:items-start lg:justify-between lg:pb-2',
            ])>

            {{-- __Desc__ --}}
            <div class="hidden toggle-details-btn lg:block lg:w-full">
                <p class="mt-[10px] text-[11px] text-[#525371] font-medium hidden lg:block">{{ $hotel->excerpt }}<a href="#" class="text-[#525371] font-semibold whitespace-nowrap"> Read
                        more</a> </p>
                <div class="flex justify-end mt-2 lg:justify-start">

                    <button class="max-lg:group-aria-expanded:hidden text-xs font-semibold text-[#000000] hover:underline">More
                        Details</button>
                </div>
            </div>

            {{-- __Price And Booking__ --}}
            <div toggle-details-ignore-on-desktop class="flex flex-col toggle-details-btn max-lg:group-aria-expanded:hidden lg:flex-row lg:gap-x-5">

                {{-- Price --}}
                <div class="flex flex-row items-end justify-between pb-4 mt-2 max-lg:group-aria-expanded:hidden lg:min-w-[250px] lg:flex-col lg:items-stretch lg:m-0 lg:p-0 lg:gap-y-3">

                    @switch($hotel->booking_type)
                    @case('direct')
                    {{-- (Mobile) --}}
                    <div class="flex justify-start lg:hidden ">
                        <h2 class=" text-[#000000] text-base font-medium ">
                            Direct Booking
                        </h2>
                        {{-- <h3 class=" text-xs font-bold text-[#000000] whitespace-nowrap lg:hidden">BEST
                                    PRICE</h3> --}}
                    </div>

                    <div class="max-lg:hidden space-y-[2px]"> {{-- (Desktop) --}}

                        <div class="flex justify-between ">
                            <h2 class="text-[#000000] text-[15px] font-medium ">
                                Direct Booking
                            </h2>
                            <h3 class="text-[15px] font-bold text-[#00BF5D] whitespace-nowrap ">BEST PRICE
                            </h3>
                        </div>
                        <div class="flex items-center gap-x-[6px]   ">
                            <p class="text-[#5D5D5D] text-[11px] font-medium"> Book directly from this place</p>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <a href="{{ $hotel->direct_booking_link }}" target="_blank" class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1 font-medium text-white rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]
                            px-3  py-[9px] lg:px-6 lg:py-[11px]">
                            Book Now</a>
                    </div>
                    @break

                    @case('request')
                    <div class="lg:hidden space-y-[2px]"> {{-- (Mobile) --}}
                        {{-- <div class="flex items-center justify-start gap-x-1 ">
                                    <h2 class="text-[#222] text-sm font-medium ">
                                        From {{ $hotel->booking_request_price_per_night }} €/night
                        </h2>
                    </div> --}}
                    <h2 class="text-[#000000] text-base font-medium lg:text-[15px]">
                        Booking Request
                    </h2>
                </div>
                <div class="max-lg:hidden space-y-[2px]"> {{-- (Desktop) --}}
                    <div class="flex justify-between ">
                        <h2 class="text-[#222] text-sm font-medium ">
                            From {{ $hotel->booking_request_price_per_night }} €/night
                        </h2>
                        {{-- <h3 class="text-[12.5px] font-bold text-[#DA5E5E]  ">-10%</h3> --}}
                    </div>
                    <div class="flex justify-between ">
                        <h2 class="text-[#000000] text-[15px] font-medium ">
                            Booking Request
                        </h2>
                        {{-- <h3 class="text-[15px] font-bold text-[#000000] whitespace-nowrap ">BEST PRICE
                                    </h3> --}}
                    </div>
                    <div class="flex items-center gap-x-[6px]   ">
                        <p class="text-[#5D5D5D] text-[11px] font-medium">Send online request and get confirm
                        </p>
                    </div>
                </div>

                {{-- {{ dd($hotel->booking_request_link) }} --}}

                <div class="hidden lg:block">
                    <a href="@if (filter_var($hotel->booking_request_link, FILTER_VALIDATE_EMAIL)) mailto:{{ $hotel->booking_request_link }} @elseif (is_numeric($hotel->booking_request_link))  tel:{{ $hotel->booking_request_link }} @else {{ $hotel->booking_request_link }} @endif" target="_blank" class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1 font-medium text-white rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]
                        px-3  py-[9px] lg:px-6 lg:py-[11px]">
                        Send Now</a>
                </div>
                @break

                @case('online')
                <div class="lg:hidden space-y-[2px]"> {{-- (Mobile) --}}
                    {{-- <h2 class="text-[#222] text-sm font-medium ">
                                    price variable
                                </h2> --}}
                    <h2 class="text-[#000000] text-base font-medium ">
                        Online Booking
                    </h2>
                </div>
                <div class="max-lg:hidden space-y-[2px]"> {{-- (Desktop) --}}
                    {{-- <h2 class="text-[#222] text-sm font-medium ">
                                    price variable
                                </h2> --}}
                    <h2 class="text-[#000000] text-[15px] font-medium ">
                        Online Booking
                    </h2>
                    <div class="flex items-center gap-x-[6px]  justify-between ">
                        <p class="text-[#5D5D5D] text-[10px] font-medium">Book it from another channel</p>



                        <div class="flex justify-end gap-2">
                            @foreach ($hotel->online_booking_links as $link)
                            <span class="text-black text-[11px] flex gap-1">
                                <img class="w-[21px] h-[21px]" src="{{ 'https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=' . $link . '&size=28' }}" alt="{{ str_replace('www.', '', parse_url($link)['host']) }}">
                            </span>
                            @endforeach
                        </div>

                        {{-- <div class="flex justify-end gap-2">
                                        @if ($hotel->online_booking_domains->contains('trip.com'))
                                            <span class="text-black text-[11px] flex gap-1">
                                                <img class="w-[21px] h-[21px]" src="/static/images/trip.png" alt="trip.com">
                                            </span>
                                        @endif

                                        @if ($hotel->online_booking_domains->contains('airbnb.com'))
                                            <span class="text-black text-[11px] flex gap-1">
                                                <img class="w-[21px] h-[21px]" src="/static/images/airbnb.png"
                                                    alt="airbnb.com">
                                            </span>
                                        @endif

                                        @if ($hotel->online_booking_domains->contains('booking.com'))
                                            <span class="text-black text-[11px] flex gap-1">
                                                <img class="w-[21px] h-[21px]" src="/static/images/booking.com.png"
                                                    alt="booking.com">
                                            </span>
                                        @endif
                                    </div> --}}

                    </div>
                </div>

                <div class="hidden lg:block">
                    <a @if ($hotel->online_booking_links->count() == 1)
                        href="{{ $hotel->online_booking_links->first() }}" @endif
                        target="_blank"
                        @if ($hotel->online_booking_links->count() > 1) data-id="show-booking-online-links" @endif
                        class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1
                        font-medium text-white px-6 rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1
                        focus:ring-[#000000]
                        py-[11px]">
                        Check Price</a>
                </div>
                @break

                @endswitch
            </div>
        </div>

    </div>

    {{-- Max User Count (Mobile) --}}
    <div class="flex flex-col justify-end col-span-2 pb-4 max-lg:group-aria-expanded:hidden lg:hidden">
        {{-- <div class="text-[#525371] font-medium  justify-end flex gap-2 pb-[2px]  items-center ">
                <i class="text-sm fas fa-user-alt"></i>
                <span class="text-[11px]"> 2 max</span>
            </div> --}}
        @if ($hotel->booking_type == 'direct')
        <div class="text-[#525371] font-medium  justify-end flex gap-2 pb-[2px]  items-center ">
            <h3 class="text-xs font-bold text-[#00BF5D] whitespace-nowrap ">BEST PRICE
            </h3>
        </div>
        @endif
        <div class="flex justify-end toggle-details-btn">
            <button class="text-sm text-[#222] font-semibold max-lg:group-aria-expanded:hidden hover:underline">More
                Details</button>
        </div>

    </div>
    </div>


    {{-- _____Additional Details_____ --}}

    <div @class([ 'hidden'=> $notActiveHotel,
        'col-start-1 col-end-7 row-start-4 row-end-5 p-3 more-details lg:row-start-3 lg:row-end-4 lg:pl-5',
        ])>
        {{-- ___Included___ --}}
        <div>
            <h4 class="text-base text-[#000000] font-medium mb-1 lg: hidden">Included</h4>
            <div class="space-x-3 ">
                <span class="text-[#525371] text-[8px] font-medium inline-flex items-start gap-1 lg:text-[12px]">
                    <i class="text-xs fas fa-user-alt lg:text-sm"></i>
                    2 max
                </span>

                @foreach ($hotel->services as $service)
                <span class="text-[#525371] text-[8px] font-medium inline-flex items-start  gap-1 lg:text-[12px]">
                    <i class="text-xs {{ $service->icon_class }} lg:text-sm"></i>
                    {{ $service->title }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- ___Long Description___ --}}
        <div class="mt-5">
            <h4 class="mb-2 text-lg font-medium">Description</h4>
            <div class="space-y-3">

                @foreach (explode("\r\n", $hotel->description) as $desc)
                <p class="text-[13px] text-[#525371] font-medium text-justify overflow-hidden text-ellipsis">
                    {{ $desc }}
                </p>
                @endforeach

            </div>

        </div>

        {{-- ______ --}}
        <div class="grid grid-cols-2 mt-5 gap-x-3 gap-y-5 lg:grid-cols-3 lg:[grid-template-rows:240px] lg:gap-x-5 ">
            <div class="flex flex-col">
                <h4 class="mb-2 text-lg font-medium">Where is</h4>
                <div class="flex-1">
                    <iframe class="w-full h-full border-0 rounded-lg" src="{{ $hotel->google_map_embed_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="flex flex-col">
                <h4 class="mb-2 text-lg font-medium">Photo</h4>
                <div data-id="show-hotel-gallery-popup" class="relative group">
                    <img class="lazyload block object-cover w-full h-36 lg:h-[205px] rounded-lg" alt="{{ $hotel->title }}" src={{ $hotel->gallery->first()->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $hotel->gallery->first()->getSrcset() }}>



                    @if ($hotel->gallery->count() > 1)
                    <div class="absolute inset-0 z-10 flex items-center justify-center w-full h-full text-white rounded-lg bg-black/40">
                        <span class=" text-[30px] text-white font-medium">{{ $hotel->gallery->count() - 1 }}+</span>

                    </div>
                    @endif
                </div>
            </div>


            <div class="flex flex-col justify-end space-y-5 max-lg:col-span-2 lg:space-y-5 lg:pt-9">

                {{-- Check-In & Check-Out --}}
                {{-- <div class="flex col-start-1 col-end-12 gap-2 lg:col-start-4 lg:col-end-8">
                    <div class="w-full border-2  rounded-r-lg overflow-hidden rounded-b-lg border-[#000000] ">
                        <button class="flex items-center w-full px-3 py-1 bg-white gap-x-3 lg:mt-1 ">
                            <i class="fa-light fa-calendar-days text-xl text-[#000000] "></i>
                            <div class="flex flex-col text-left">
                                <span class="text-[10px] text-[#9C9797] font-medium lg:hidden">Check In</span>
                                <span
                                    class="text-sm text-[#000000] whitespace-nowrap font-medium lg:text-sm lg:leading-normal">12
                                    May 2023</span>
                                <span class="text-[10px] text-[#2C2E3C] font-medium lg:text-xs">Wednesday</span>
                            </div>
                        </button>
                    </div>
                    <div class="w-full border-2 border-[#000000] rounded-r-lg overflow-hidden rounded-b-lg">
                        <button class="flex items-center w-full px-3 py-1 bg-white gap-x-3 lg:mt-1">
                            <i class="fa-light fa-calendar-days text-xl text-[#000000] "></i>
                            <div class="flex flex-col text-left">
                                <span class="text-[10px] text-[#9C9797] font-medium lg:hidden">Check Out</span>
                                <span
                                    class="text-sm text-[#000000] whitespace-nowrap font-medium lg:text-sm lg:leading-normal">12
                                    May 2023</span>
                                <span class="text-[10px] text-[#2C2E3C] font-medium lg:text-xs">Wednesday</span>
                            </div>
                        </button>
                    </div>
                </div> --}}

                <div class="flex flex-col gap-y-3">

                    @switch($hotel->booking_type)
                    @case('direct')
                    <div class=" space-y-[2px]"> {{-- (Desktop) --}}

                        <div class="flex justify-between ">
                            <h2 class="text-[#000000] text-[15px] font-medium ">
                                Direct Booking
                            </h2>
                            <h3 class="text-[15px] font-bold text-[#00BF5D] whitespace-nowrap ">BEST PRICE
                            </h3>
                        </div>
                        <div class="flex items-center gap-x-[6px]   ">
                            <p class="text-[#5D5D5D] text-[11px] font-medium"> Book directly from this place</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ $hotel->direct_booking_link }}" target="_blank" class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1 font-medium text-white px-6 rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]
                            py-[11px]">
                            Book Now</a>
                    </div>
                    @break

                    @case('request')
                    <div class=" space-y-[2px]"> {{-- (Desktop) --}}
                        <div class="flex justify-between ">
                            <h2 class="text-[#222] text-sm font-medium ">
                                From {{ $hotel->booking_request_price_per_night }} €/night
                            </h2>
                            {{-- <h3 class="text-[12.5px] font-bold text-[#DA5E5E]  ">-10%</h3> --}}
                        </div>
                        <div class="flex justify-between ">
                            <h2 class="text-[#000000] text-[15px] font-medium ">
                                Booking Request
                            </h2>
                            {{-- <h3 class="text-[15px] font-bold text-[#000000] whitespace-nowrap ">BEST PRICE
                                    </h3> --}}
                        </div>
                        <div class="flex items-center gap-x-[6px]   ">
                            <p class="text-[#5D5D5D] text-[11px] font-medium">Send online request and get confirm
                            </p>
                        </div>
                    </div>

                    <div>
                        <a href="@if (filter_var($hotel->booking_request_link, FILTER_VALIDATE_EMAIL)) mailto:{{ $hotel->booking_request_link }} @elseif (is_numeric($hotel->booking_request_link))  tel:{{ $hotel->booking_request_link }} @else {{ $hotel->booking_request_link }} @endif" target="_blank" class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1 font-medium text-white px-6 rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]
                            py-[11px]">
                            Send Now</a>
                    </div>
                    @break

                    @case('online')
                    <div class=" space-y-[2px]"> {{-- (Desktop) --}}
                        {{-- <h2 class="text-[#222] text-sm font-medium ">
                                    price variable
                                </h2> --}}
                        <h2 class="text-[#000000] text-[15px] font-medium ">
                            Online Booking
                        </h2>
                        <div class="flex items-center gap-x-[6px]  justify-between ">
                            <p class="text-[#5D5D5D] text-[10px] font-medium">Book it from another channel</p>

                            <div class="flex justify-end gap-2">
                                @foreach ($hotel->online_booking_links as $link)
                                <span class="text-black text-[11px] flex gap-1">
                                    <img class="w-[21px] h-[21px]" src="{{ 'https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=' . $link . '&size=28' }}" alt="{{ str_replace('www.', '', parse_url($link)['host']) }}">
                                </span>
                                @endforeach
                            </div>
                            {{-- <div class="flex justify-end gap-2">
                                        @if ($hotel->online_booking_domains->contains('trip.com'))
                                            <span class="text-black text-[11px] flex gap-1">
                                                <img class="w-[21px] h-[21px]" src="/static/images/trip.png" alt="trip.com">
                                            </span>
                                        @endif

                                        @if ($hotel->online_booking_domains->contains('airbnb.com'))
                                            <span class="text-black text-[11px] flex gap-1">
                                                <img class="w-[21px] h-[21px]" src="/static/images/airbnb.png"
                                                    alt="airbnb.com">
                                            </span>
                                        @endif

                                        @if ($hotel->online_booking_domains->contains('booking.com'))
                                            <span class="text-black text-[11px] flex gap-1">
                                                <img class="w-[21px] h-[21px]" src="/static/images/booking.com.png"
                                                    alt="booking.com">
                                            </span>
                                        @endif
                                    </div> --}}
                        </div>
                    </div>

                    <div>
                        <a @if ($hotel->online_booking_links->count() == 1)
                            href="{{ $hotel->online_booking_links->first() }}" @endif
                            target="_blank"
                            @if ($hotel->online_booking_links->count() > 1) data-id="show-booking-online-links" @endif
                            class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1
                            font-medium text-white px-6 rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1
                            focus:ring-[#000000]
                            py-[11px]">
                            Check Now</a>
                    </div>
                    @break

                    @endswitch
                </div>
            </div>
        </div>

    </div>


    @if ($hotel->booking_type == 'online' && $hotel->online_booking_links->count() > 1)
    {{-- Popup online booking links --}}
    <div data-id="show-booking-online-popup" class="hidden  w-screen h-screen bg-black/30 fixed inset-0 z-[999] ">

        <div class="flex items-center justify-center w-full h-full">
            <div class="px-5 w-96 lg:px-0">
                <div class="relative p-5 bg-[#f8f8f8] rounded-lg">

                    <button data-id="close-booking-online-popup" class="  absolute -right-3 -top-3 w-[30px] h-[30px] border border-white bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>
                    <h3 class="text-lg font-semibold text-center">Check now on</h3>
                    <div class="mt-5 space-y-2">
                        @foreach ($hotel->online_booking_links as $link)
                        @php
                        $host = str_replace('www.', '', parse_url($link)['host']);
                        @endphp
                        <a href="{{ $link }}" target="_blank" class="flex justify-between gap-1 p-4 bg-white rounded-lg ">
                            <div class="flex items-center gap-2">
                                <img class=" w-7 h-7" src="{{ 'https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=' . $link . '&size=28' }}" alt="{{ $host }}">
                                <span class="text-sm font-medium text-gray-500">{{ $host }}</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="text-xs font-medium text-gray-700 whitespace-nowrap">Check
                                    now</span>
                                <i class="text-sm far fa-angle-right"></i>
                            </div>

                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif


    {{-- Hotel Gallery Popup --}}
    <div data-id="hotel-gallery-popup" aria-expanded="false" class="w-screen h-screen hidden  fixed top-0 z-[999]
        overflow-y-scroll
        inset-0 bg-black/50">
        <div class="flex items-center justify-center w-full h-full">

            <div class="max-lg:px-6 w-full lg:max-w-[700px] -translate-y-5">
                <div class="relative p-4 pb-5 bg-white rounded-lg ">
                    {{-- Desktop Close Button --}}
                    <button class="handle-close  absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>

                    <div>
                        {{-- Gallery --}}
                        <div class="col-span-12 space-y-4 lg:col-start-1 lg:col-end-6">
                            <div data-id="hotel-details-thumb-slider-wrapper" class="relative">
                                <swiper-container slides-per-view='1' space-between='10' thumbs-swiper='#{{ $id }} [data-id="hotel-details-popup-mini-thumbs"]' navigation-prev-el='#{{ $id }} [data-id="hotel-details-thumb-slider-wrapper"] .swiper-navigation-left' navigation-next-el='#{{ $id }} [data-id="hotel-details-thumb-slider-wrapper"] .swiper-navigation-right'>


                                    @foreach ($hotel->gallery as $image)
                                    <swiper-slide>
                                        <img class="object-cover w-full min-h-full rounded-lg h-80 lazyload lg:h-full lg:aspect-video" alt="{{ $hotel->title }}" src={{ $image->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $image->getSrcset() }} />
                                    </swiper-slide>
                                    @endforeach

                                </swiper-container>
                                <div class="swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-[30px] h-[30px] z-20  bg-white/40 rounded-full flex justify-center items-center text-white duration-300 hover:bg-[#000000] aria-disabled:hidden">
                                    <i class="far fa-chevron-left"></i>
                                </div>
                                <div class="swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-[30px] h-[30px] z-20  bg-white/40 rounded-full flex justify-center items-center text-white duration-300 hover:bg-[#000000] aria-disabled:hidden ">
                                    <i class="far fa-chevron-right"></i>
                                </div>
                            </div>
                            {{-- Mini thumbs --}}
                            <div class="relative">
                                <swiper-container data-id="hotel-details-popup-mini-thumbs" slides-per-view='2' space-between='15' init="false">

                                    @foreach ($hotel->gallery as $image)
                                    <swiper-slide>
                                        <div class="relative w-full h-full group">
                                            <img class="object-cover w-full h-32 min-h-full rounded-lg lazyload lg:h-40" alt="{{ $hotel->title }}" src={{ $image->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $image->getSrcset() }} />


                                            <div class="load-more-text hidden group-data-[remaining='true']:flex absolute inset-0 z-10 w-full h-full bg-black/40 rounded-lg text-white  justify-center items-center">
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



</article>