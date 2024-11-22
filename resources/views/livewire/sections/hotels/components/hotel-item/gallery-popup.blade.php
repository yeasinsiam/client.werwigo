@php
    $id = $id . '-gallery-popup';
@endphp

{{-- Hotel Gallery Popup --}}
<div wire:ignore id="{{ $id }}" role="dialog" aria-expanded="false" {{-- <div id="hotel-gallery-popup" role="dialog" aria-expanded="false" --}}
    class="w-screen h-screen hidden  fixed top-0 z-[999]
        overflow-y-scroll
        inset-0 bg-black/50 !p-0 !m-0">
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
