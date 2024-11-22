@php
$notActiveHotel = !isset($activeHotelSlug) || $activeHotelSlug != $hotel->slug;
$hideOoohCategoryBadge = isset($hideOoohCategoryBadge) ? $hideOoohCategoryBadge : false;
@endphp

<article wire:ignore wire:key="item-{{ $id }}" id={{ $id }} data-select="single-hotel-listing" aria-expanded="{{ $notActiveHotel ? 'false' : 'true' }}" data-hotel-id="{{ $hotel->id }}" class="relative group">

    <div data-id="main-wrapper" class="w-full ">
        <div class="relative grid h-full grid-cols-6 bg-white border-2 rounded-lg shadow-lg">


            {{-- _____Thumbnail_____ --}}
            <div class="relative col-start-1 col-end-7 row-start-1 row-end-2 overflow-hidden rounded-t-lg">


                <div data-id="hotel-listing-gallery-thumb-sliders-wrapper" class="relative group">
                    <swiper-container data-id="hotel-listing-gallery-thumb-sliders" init='false' {{-- slides-per-view='1'
                        space-between='10' pagination='true' --}} slide navigation-prev-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-left' navigation-next-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-right'>

                        <swiper-slide wire:key='{{ $id }}-{{ $hotel->thumbnail->id }}-thumbs'>
                            <img alt="{{ $hotel->title }}" src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $hotel->thumbnail->getSrcset() }} class="object-cover w-full aspect-square lazyload " />
                            {{-- class="object-cover w-full min-h-full h-60 lazyload " /> --}}
                        </swiper-slide>
                        @foreach ($hotel->gallery as $image)
                        <swiper-slide wire:key='{{ $id }}-{{ $image->id }}-thumbs'>
                            <img alt="{{ $hotel->title }}" src={{ $image->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $image->getSrcset() }} class="object-cover w-full aspect-square lazyload " />
                            {{-- class="object-cover w-full min-h-full h-60 lazyload " /> --}}
                        </swiper-slide>
                        @endforeach
                    </swiper-container>
                    <div class="opacity-0 swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-[30px] h-[30px] z-20  bg-white/90 rounded-full group-hover:opacity-100 flex justify-center items-center text-black duration-300 hover:bg-[#000000] hover:text-white aria-disabled:hidden">
                        <i class="text-xs leading-none far fa-chevron-left"></i>
                    </div>
                    <div class="opacity-0 swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-[30px] h-[30px] z-20  bg-white/90 rounded-full group-hover:opacity-100 flex justify-center items-center text-black duration-300 hover:bg-[#000000] hover:text-white aria-disabled:hidden ">
                        <i class="text-xs leading-none far fa-chevron-right"></i>
                    </div>
                </div>



                @if (!$hideOoohCategoryBadge)
                <div class="absolute z-10 top-3 left-3">
                    @if ($hotel->categories->find(1))
                    <span class="inline-block text-sm rounded-lg font-bold px-1 py-2 bg-[#000000] text-white"><svg width="65" height="17" viewBox="0 0 65 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M61.2398 1.12245C59.1712 0.534443 57.0207 2.14069 57.1565 4.30339C57.1905 4.83403 57.281 6.51199 57.53 8.21863C57.5442 8.32189 57.5611 8.42515 57.5753 8.52841C57.7451 9.60976 57.9601 10.8833 58.5629 11.8212C59.59 13.416 60.6285 11.5401 61.0388 10.4903C61.07 10.41 61.1011 10.3326 61.1266 10.2666C61.8396 8.44236 64.1855 1.96573 61.2398 1.12245Z" fill="white"></path>
                            <path d="M57.7959 12.5841C56.8168 11.5229 56.4744 9.35156 56.3188 8.35626C56.316 8.33618 56.3131 8.31324 56.3103 8.29316C56.2962 8.2989 56.2848 8.30463 56.2707 8.31037C55.0596 8.80085 54.0239 8.51115 53.1976 7.94609L53.1863 4.01939C53.1835 2.50205 51.9667 1.27729 50.4698 1.28016C48.9729 1.28302 47.7646 2.51639 47.7703 4.03373L47.8014 15.6102C47.8042 17.1275 49.021 18.3523 50.5179 18.3466C52.0148 18.3437 53.2231 17.1103 53.2174 15.593L53.209 12.2744C54.703 13.1263 56.3924 12.9914 57.7959 12.5841Z" fill="white"></path>
                            <path d="M59.9663 18.404C61.2603 18.404 62.3093 17.3407 62.3093 16.029C62.3093 14.7174 61.2603 13.6541 59.9663 13.6541C58.6723 13.6541 57.6233 14.7174 57.6233 16.029C57.6233 17.3407 58.6723 18.404 59.9663 18.404Z" fill="white"></path>
                            <path d="M15.4807 11.7783C15.4807 12.8568 15.3165 13.8177 14.9911 14.6609C14.6657 15.5042 14.2073 16.2127 13.6159 16.7864C13.0245 17.36 12.3171 17.796 11.4936 18.0914C10.6702 18.3869 9.75336 18.536 8.74033 18.536C7.7273 18.536 6.81048 18.3783 5.98704 18.0656C5.1636 17.753 4.45617 17.3055 3.86477 16.7233C3.27336 16.141 2.81495 15.4325 2.48954 14.5978C2.16412 13.7632 2 12.8252 2 11.7812C2 10.7543 2.16129 9.82498 2.48954 8.99031C2.81495 8.15563 3.27336 7.44716 3.86477 6.86489C4.45617 6.28263 5.1636 5.83517 5.98704 5.52253C6.81048 5.20988 7.7273 5.05212 8.74033 5.05212C9.75336 5.05212 10.6702 5.21275 11.4936 5.534C12.3171 5.85525 13.0245 6.30844 13.6159 6.89071C14.2073 7.47297 14.6657 8.18144 14.9911 9.01612C15.3165 9.84793 15.4807 10.7715 15.4807 11.7783ZM6.47657 11.7783C6.47657 12.8396 6.67748 13.6513 7.08213 14.2164C7.48395 14.7814 8.04705 15.0654 8.76863 15.0654C9.4902 15.0654 10.042 14.7785 10.4268 14.2049C10.8117 13.6312 11.0069 12.8224 11.0069 11.7783C11.0069 10.7342 10.8088 9.93111 10.4155 9.36605C10.0194 8.801 9.46473 8.5199 8.74316 8.5199C8.02159 8.5199 7.46414 8.80387 7.07081 9.36605C6.67182 9.93111 6.47657 10.7342 6.47657 11.7783Z" fill="white"></path>
                            <path d="M30.5573 11.7783C30.5573 12.8568 30.3932 13.8177 30.0678 14.6609C29.7424 15.5042 29.284 16.2127 28.6926 16.7864C28.1011 17.36 27.3937 17.796 26.5703 18.0914C25.7468 18.3869 24.83 18.536 23.817 18.536C22.804 18.536 21.8871 18.3783 21.0637 18.0656C20.2403 17.753 19.5328 17.3055 18.9414 16.7233C18.35 16.141 17.8916 15.4325 17.5662 14.5978C17.2408 13.7632 17.0767 12.8252 17.0767 11.7812C17.0767 10.7543 17.238 9.82498 17.5662 8.99031C17.8916 8.15563 18.35 7.44716 18.9414 6.86489C19.5328 6.28263 20.2403 5.83517 21.0637 5.52253C21.8871 5.20988 22.804 5.05212 23.817 5.05212C24.83 5.05212 25.7468 5.21275 26.5703 5.534C27.3937 5.85525 28.1011 6.30844 28.6926 6.89071C29.284 7.47297 29.7424 8.18144 30.0678 9.01612C30.3932 9.84793 30.5573 10.7715 30.5573 11.7783ZM21.5532 11.7783C21.5532 12.8396 21.7541 13.6513 22.1588 14.2164C22.5606 14.7814 23.1237 15.0654 23.8453 15.0654C24.5669 15.0654 25.1186 14.7785 25.5035 14.2049C25.8883 13.6312 26.0836 12.8224 26.0836 11.7783C26.0836 10.7342 25.8855 9.93111 25.4922 9.36605C25.096 8.801 24.5414 8.5199 23.8198 8.5199C23.0982 8.5199 22.5408 8.80387 22.1475 9.36605C21.7485 9.93111 21.5532 10.7342 21.5532 11.7783Z" fill="white"></path>
                            <path d="M45.6339 11.7783C45.6339 12.8568 45.4697 13.8177 45.1443 14.6609C44.8189 15.5042 44.3605 16.2127 43.7691 16.7864C43.1777 17.36 42.4703 17.796 41.6468 18.0914C40.8234 18.3869 39.9066 18.536 38.8935 18.536C37.8805 18.536 36.9637 18.3783 36.1402 18.0656C35.3168 17.753 34.6094 17.3055 34.018 16.7233C33.4266 16.141 32.9682 15.4325 32.6427 14.5978C32.3173 13.7632 32.1532 12.8252 32.1532 11.7812C32.1532 10.7543 32.3145 9.82498 32.6427 8.99031C32.9682 8.15563 33.4266 7.44716 34.018 6.86489C34.6094 6.28263 35.3168 5.83517 36.1402 5.52253C36.9637 5.20988 37.8805 5.05212 38.8935 5.05212C39.9066 5.05212 40.8234 5.21275 41.6468 5.534C42.4703 5.85525 43.1777 6.30844 43.7691 6.89071C44.3605 7.47297 44.8189 8.18144 45.1443 9.01612C45.4697 9.84793 45.6339 10.7715 45.6339 11.7783ZM36.6298 11.7783C36.6298 12.8396 36.8307 13.6513 37.2353 14.2164C37.6371 14.7814 38.2003 15.0654 38.9218 15.0654C39.6434 15.0654 40.1952 14.7785 40.58 14.2049C40.9649 13.6312 41.1601 12.8224 41.1601 11.7783C41.1601 10.7342 40.962 9.93111 40.5687 9.36605C40.1725 8.801 39.6179 8.5199 38.8964 8.5199C38.1748 8.5199 37.6173 8.80387 37.224 9.36605C36.825 9.93111 36.6298 10.7342 36.6298 11.7783Z" fill="white"></path>
                        </svg></span>
                    @endif
                </div>
                @endif

                <livewire:components.hotel.favorite-hotel-icon wire:key="{{ str()->uuid() }}" :hotel="$hotel" :wrapperClass="'absolute z-10 top-3 right-3'" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'">
            </div>




            {{-- ____Ratings_____ --}}
            {{-- <div class="hidden">

                <div class="relative flex flex-col items-end mt-3">
                    <div
                        class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  ">
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



    </div> --}}

    {{-- ____Title___ --}}
    <div data-id="show-hotel-desktop-details-popup" class="flex justify-between col-start-1 col-end-7 row-start-2 row-end-3 gap-3 px-3 pt-3 toggle-details-btn">
        <div class="space-y-[1px] w-3/4 overflow-hidden">
            <a href="#" class="block w-full overflow-hidden text-base font-medium text-ellipsis whitespace-nowrap hover:underline hover:decoration-2 ">{{ $hotel->title }}</a>
            <p class=" text-ellipsis overflow-hidden w-full whitespace-nowrap  text-[11px] font-medium  text-[#4C4B4B] ">
                {{-- <span>{{ $hotel->address }}</span> --}}
                {{ $hotel->address }}

            </p>
            <div class="text-[12px] font-semibold text-[#000000] w-full overflow-hidden text-ellipsis whitespace-nowrap">

                {!! $hotel->categories->pluck('title')->implode('&nbsp;&nbsp;&nbsp;') !!}


                {{-- @foreach ($hotel->categories as $categories)
                            <span class="min-w-full overflow-hidden whitespace-nowrap text-ellipsis">
                                {{ $categories->title }}
                </span>
                @endforeach --}}

            </div>

        </div>
        <div class="relative flex flex-col items-end ">
            <div class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  ">
                {{ round(collect([$hotel->getRomanticRating(), $hotel->getIntimateRating(), $hotel->getLuxuryRating()])->avg(), 1) }}
            </div>
            <h5 class="text-[#000000] mt-1 text-[10px] leading-3 whitespace-nowrap font-medium">Couple Rating
            </h5>

            <div data-id='mobile-view-score-container' class="flex ">
                <button type="button" class="text-[#A1A1A1] underline text-[9px]">view
                    score</button>
                <div class="absolute z-20 hidden pb-2 -right-3 bottom-full">

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
    <div class="grid grid-cols-6 col-start-1 col-end-7 row-start-3 row-end-4 px-3 pt-3">


        {{-- __Tags__ --}}
        <div class="hidden col-span-5 group-aria-expanded:block ">
            <div data-id="show-hotel-desktop-details-popup" class="flex flex-wrap gap-2 toggle-details-btn ">


                @foreach ($hotel->tags as $tag)
                <a href="#" class="text-[10px] font-medium bg-[#000000] text-white px-[6px] py-[2px] rounded-sm ">{{ $tag->title }}</a>
                @endforeach

            </div>
        </div>

        {{-- __Desc & Pricing & Booking__ --}}
        <div @class(['flex items-end col-span-4 '])>

                    {{-- __Desc__ --}}
                    <div data-id="show-hotel-desktop-details-popup" class="hidden toggle-details-btn ">
                        <p class="mt-[10px] text-[11px] text-[#525371] font-medium hidden ">
                            {{ $hotel->excerpt }}<a href="#"
                                class="text-[#525371] font-semibold whitespace-nowrap">
                                Read
                                more</a> </p>
                        <div class="flex justify-end mt-2 ">

                            <button
                                class="group-aria-expanded:hidden text-xs font-semibold text-[#000000] hover:underline">More
                                Details</button>
                        </div>
                    </div>

                    {{-- __Price And Booking__ --}}
                    <div toggle-details-ignore-on-desktop data-id="show-hotel-desktop-details-popup"
                        class="flex flex-col toggle-details-btn group-aria-expanded:hidden ">

                        {{-- Price --}}
                        <div class="flex flex-row items-end justify-between pb-4 mt-2 group-aria-expanded:hidden">

                            @switch($hotel->booking_type)
                                @case(' direct') {{-- (Mobile) --}} <div class="space-y-[2px]">
            <h2 class="text-sm text-[#000000] lg:text-base font-medium ">
                Direct Booking
            </h2>
        </div>
        @break

        @case('request')
        <div class="space-y-[2px]"> {{-- (Mobile) --}}
            {{-- <div class="flex items-center justify-start gap-x-1 ">
                                    <h2 class="text-[#222] text-sm font-medium ">
                                        From {{ $hotel->booking_request_price_per_night }} €/night
            </h2>
        </div> --}}
        <h2 class="text-[#000000] text-base font-medium ">
            Booking Request
        </h2>
    </div>
    <div class="hidden space-y-[2px]"> {{-- (Desktop) --}}
        <div class="flex justify-between ">
            <h2 class="text-[#222] text-sm font-medium ">
                From {{ $hotel->booking_request_price_per_night }} €/night
            </h2>
        </div>
        <div class="flex justify-between ">
            <h2 class="text-[#000000] text-[15px] font-medium ">
                Booking Request
            </h2>

        </div>
        <div class="flex items-center gap-x-[6px]   ">
            <p class="text-[#5D5D5D] text-[11px] font-medium">Send online request and get
                confirm
            </p>
        </div>
    </div>
    @break

    @case('online')
    <div class="space-y-[2px]"> {{-- (Mobile) --}}

        <h2 class="text-sm text-[#000000] lg:text-base font-medium ">
            Online Booking
        </h2>
    </div>
    @break
    @endswitch
    </div>
    </div>

    </div>

    {{-- Max User Count (Mobile) --}}
    <div class="flex flex-col justify-end col-span-2 pb-4 group-aria-expanded:hidden ">

        @if ($hotel->booking_type == 'direct')
        <div class="text-[#525371] font-medium  justify-end flex gap-2 pb-[2px]  items-center ">
            {{-- // <h3 class="text-xs font-bold text-[#00BF5D] whitespace-nowrap ">BEST PRICE
                            </h3> --}}
        </div>
        @endif
        <div data-id="show-hotel-desktop-details-popup" class="flex justify-end toggle-details-btn">
            <button class="text-[13px] whitespace-nowrap lg:text-sm text-[#222] font-semibold group-aria-expanded:hidden hover:underline">More
                Details</button>
        </div>

    </div>
    </div>


    {{-- _____Additional Details_____ --}}

    <div @class([ 'hidden'=> $notActiveHotel,
        'col-start-1 col-end-7 row-start-4 row-end-5 p-3 more-details ',
        ])>
        {{-- ___Included___ --}}
        <div>
            <h4 class="text-base text-[#000000] font-medium mb-1  hidden">Included</h4>
            <div class="flex flex-wrap items-center gap-3 ">
                <span class="text-[#525371] text-[10px] font-medium inline-flex items-center gap-1 ">
                    <i class="text-sm fas fa-user-alt "></i>
                    2 max
                </span>

                @foreach ($hotel->services as $service)
                <span class="text-[#525371] text-[10px] font-medium inline-flex items-center  gap-[5px] ">
                    <i class="text-sm {{ $service->icon_class }} "></i>
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
        <div class="grid grid-cols-2 mt-5 gap-x-3 gap-y-5 ">
            <div class="flex flex-col">
                <h4 class="mb-2 text-lg font-medium">Where is</h4>
                <div class="flex-1">
                    <iframe class="w-full h-full border-0 rounded-lg" src="{{ $hotel->google_map_embed_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="flex flex-col">
                <h4 class="mb-2 text-lg font-medium">Photo</h4>
                <div data-id="show-hotel-gallery-popup" class="relative group">
                    <img class="block object-cover w-full rounded-lg lazyload h-36" alt="{{ $hotel->title }}" src={{ $hotel->gallery->first()->responsiveImages()->getPlaceholderSvg() }} data-srcset={{ $hotel->gallery->first()->getSrcset() }}>



                    @if ($hotel->gallery->count() > 1)
                    <div class="absolute inset-0 z-10 flex items-center justify-center w-full h-full text-white rounded-lg bg-black/40">
                        <span class=" text-[30px] text-white font-medium">{{ $hotel->gallery->count() - 1 }}+</span>

                    </div>
                    @endif
                </div>
            </div>


            <div class="flex flex-col justify-end col-span-2 space-y-5">

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
                            {{-- // <h3 class="text-[15px] font-bold text-[#00BF5D] whitespace-nowrap ">BEST PRICE
                                            </h3> --}}
                        </div>
                        <div class="flex items-center gap-x-[6px]   ">
                            <p class="text-[#5D5D5D] text-[11px] font-medium"> Book directly from this place
                            </p>
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
                            <p class="text-[#5D5D5D] text-[11px] font-medium">Send online request and get
                                confirm
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
                        <a @if ($hotel->online_booking_links->count() == 1) href="{{ $hotel->online_booking_links->first() }}" @endif
                            target="_blank"
                            @if ($hotel->online_booking_links->count() > 1) data-id="show-booking-online-links" @endif
                            class="w-full h-full text-sm flex justify-center items-center whitespace-nowrap gap-x-1 font-medium text-white px-6 rounded-md bg-[#000000] focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]
                            py-[11px]">
                            Check Now</a>
                    </div>
                    @break

                    @endswitch
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>

</article>