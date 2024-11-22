@php
    $id = $id . '-desktop-details-popup';
@endphp

<div wire:ignore id="{{ $id }}" aria-expanded="false" {{-- <div id="hotel-gallery-popup" role="dialog" aria-expanded="false" --}}
    class="w-screen h-screen hidden  fixed top-0 z-[999]
        overflow-y-scroll
        inset-0 bg-black/50 !p-0 !m-0">
    <div class="flex items-center justify-center w-full h-full">

        <div class="max-w-5xl ">
            <div class="relative p-4 pb-5 bg-white rounded-lg ">
                {{-- Desktop Close Button --}}
                <button
                    class="handle-close  absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                    <i class="text-white far fa-times"></i>
                </button>

                <div class="grid grid-cols-12 gap-5">
                    {{-- Gallery --}}
                    <div class="col-span-4 space-y-4 lg:col-start-1 lg:col-end-6">
                        <div data-id="hotel-details-thumb-slider-wrapper" class="relative">
                            <swiper-container slides-per-view='1' space-between='10'
                                thumbs-swiper='#{{ $id }} [data-id="desktop-hotel-details-popup-mini-thumbs"]'
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
                            <swiper-container data-id="desktop-hotel-details-popup-mini-thumbs" slides-per-view='2'
                                space-between='15' init="false">

                                @foreach ($hotel->gallery as $image)
                                    <swiper-slide>
                                        <div class="relative w-full h-full group">
                                            <img class="object-cover w-full h-32 min-h-full rounded-lg lazyload "
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
                    {{-- details --}}
                    <div class="col-span-7">
                        {{-- ____Title___ --}}
                        <div data-id="show-hotel-desktop-details-popup"
                            class="flex justify-between row-start-2 row-end-3 gap-3 ">
                            <div class="space-y-[1px] w-3/4 overflow-hidden">
                                <a href="#"
                                    class="block w-full text-base font-medium hover:underline hover:decoration-2 ">{{ $hotel->title }}</a>
                                <p class="  text-[11px] font-medium  text-[#4C4B4B] ">
                                    {{-- <span>{{ $hotel->address }}</span> --}}
                                    {{ $hotel->address }}

                                </p>
                                <div class="text-[12px] font-semibold text-[#000000] w-full ">

                                    {!! $hotel->categories->pluck('title')->implode('&nbsp;&nbsp;&nbsp;') !!}



                                </div>

                            </div>
                            <div class="relative flex flex-col items-end ">
                                <div
                                    class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  ">
                                    {{ round(collect([$hotel->getRomanticRating(), $hotel->getIntimateRating(), $hotel->getLuxuryRating()])->avg(), 1) }}
                                </div>
                                <h5 class="text-[#000000] mt-1 text-[10px] leading-3 whitespace-nowrap font-medium">
                                    Couple Rating
                                </h5>

                                <div data-id='mobile-view-score-container' class="flex ">
                                    <button type="button" class="text-[#A1A1A1] underline text-[9px]">view
                                        score</button>
                                    <div class="absolute z-20 hidden pb-2 -right-3 top-full">

                                        <div
                                            class="flex flex-col gap-2 px-2 py-3 rounded-lg bg-white border  [box-shadow:0px_4px_14px_0px_rgba(0,0,0,0.10);]">
                                            <div class="flex flex-col items-center justify-center">
                                                <div
                                                    class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                                    {{ $hotel->getRomanticRating() }}
                                                </div>
                                                <span class="text-[10px]  font-normal  text-[#74737A]">Romantic</span>
                                            </div>
                                            <div class="flex flex-col items-center justify-center">
                                                <div
                                                    class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                                    {{ $hotel->getIntimateRating() }}
                                                </div>
                                                <span class="text-[10px]  font-normal  text-[#74737A]">Intimate</span>
                                            </div>
                                            <div class="flex flex-col items-center justify-center">
                                                <div
                                                    class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md ">
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
                        {{-- <div class="grid grid-cols-6 col-start-1 col-end-7 row-start-3 row-end-4 px-3 pt-3">


                            <div class="hidden col-span-5 group-aria-expanded:block ">
                                <div data-id="show-hotel-desktop-details-popup" class="flex flex-wrap gap-2 ">


                                    @foreach ($hotel->tags as $tag)
                                        <a href="#"
                                            class="text-[10px] font-medium bg-[#000000] text-white px-[6px] py-[2px] rounded-sm ">{{ $tag->title }}</a>
                                    @endforeach

                                </div>
                            </div>


                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
