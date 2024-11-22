@php
    $hideOoohCategoryBadge = isset($hideOoohCategoryBadge) ? $hideOoohCategoryBadge : false;
@endphp

<article wire:ignore wire:key="item-{{ $id }}" id={{ $id }} data-select="single-hotel-item"
    class="relative h-full bg-white rounded-lg shadow-lg group">



    {{-- _____Thumbnail_____ --}}
    <div class="relative overflow-hidden rounded-t-lg">


        <div data-id="hotel-listing-gallery-thumb-sliders-wrapper" class="relative group">
            <swiper-container data-id="hotel-listing-gallery-thumb-sliders" init="false"
                navigation-prev-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-left'
                navigation-next-el='#{{ $id }} [data-id="hotel-listing-gallery-thumb-sliders-wrapper"] .swiper-navigation-right'>

                <swiper-slide wire:key='{{ $id }}-{{ $hotel->thumbnail->id }}-thumbs'>
                    <img alt="{{ $hotel->title }}" src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }}
                        data-srcset={{ $hotel->thumbnail->getSrcset() }} class="object-cover w-full h-60 lazyload " />
                    {{-- class="object-cover w-full min-h-full h-60 lazyload " /> --}}
                </swiper-slide>
                @foreach ($hotel->gallery as $image)
                    <swiper-slide wire:key='{{ $id }}-{{ $image->id }}-thumbs'>
                        <img alt="{{ $hotel->title }}" src={{ $image->responsiveImages()->getPlaceholderSvg() }}
                            data-srcset={{ $image->getSrcset() }} class="object-cover w-full h-60 lazyload " />
                        {{-- class="object-cover w-full min-h-full h-60 lazyload " /> --}}
                    </swiper-slide>
                @endforeach
            </swiper-container>
            <div
                class="opacity-0 swiper-navigation-left absolute top-1/2 -mt-[15px] left-3 w-7 h-7 z-20  bg-white/90 rounded-full group-hover:opacity-100 flex justify-center items-center text-black duration-300 hover:bg-[#000000] hover:text-white aria-disabled:hidden">
                <i class="text-xs leading-none far fa-chevron-left"></i>
            </div>
            <div
                class="opacity-0 swiper-navigation-right absolute top-1/2 -mt-[15px] right-3 w-7 h-7 z-20  bg-white/90 rounded-full group-hover:opacity-100 flex justify-center items-center text-black duration-300 hover:bg-[#000000] hover:text-white aria-disabled:hidden ">
                <i class="text-xs leading-none far fa-chevron-right"></i>
            </div>
        </div>



        @if (!$hideOoohCategoryBadge)
            <div class="absolute z-10 top-3 left-3">
                @if ($hotel->categories->find(1))
                    <span class="inline-block text-sm rounded-lg font-bold px-1 py-2 bg-[#000000] text-white"><svg
                            width="65" height="17" viewBox="0 0 65 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M61.2398 1.12245C59.1712 0.534443 57.0207 2.14069 57.1565 4.30339C57.1905 4.83403 57.281 6.51199 57.53 8.21863C57.5442 8.32189 57.5611 8.42515 57.5753 8.52841C57.7451 9.60976 57.9601 10.8833 58.5629 11.8212C59.59 13.416 60.6285 11.5401 61.0388 10.4903C61.07 10.41 61.1011 10.3326 61.1266 10.2666C61.8396 8.44236 64.1855 1.96573 61.2398 1.12245Z"
                                fill="white"></path>
                            <path
                                d="M57.7959 12.5841C56.8168 11.5229 56.4744 9.35156 56.3188 8.35626C56.316 8.33618 56.3131 8.31324 56.3103 8.29316C56.2962 8.2989 56.2848 8.30463 56.2707 8.31037C55.0596 8.80085 54.0239 8.51115 53.1976 7.94609L53.1863 4.01939C53.1835 2.50205 51.9667 1.27729 50.4698 1.28016C48.9729 1.28302 47.7646 2.51639 47.7703 4.03373L47.8014 15.6102C47.8042 17.1275 49.021 18.3523 50.5179 18.3466C52.0148 18.3437 53.2231 17.1103 53.2174 15.593L53.209 12.2744C54.703 13.1263 56.3924 12.9914 57.7959 12.5841Z"
                                fill="white"></path>
                            <path
                                d="M59.9663 18.404C61.2603 18.404 62.3093 17.3407 62.3093 16.029C62.3093 14.7174 61.2603 13.6541 59.9663 13.6541C58.6723 13.6541 57.6233 14.7174 57.6233 16.029C57.6233 17.3407 58.6723 18.404 59.9663 18.404Z"
                                fill="white"></path>
                            <path
                                d="M15.4807 11.7783C15.4807 12.8568 15.3165 13.8177 14.9911 14.6609C14.6657 15.5042 14.2073 16.2127 13.6159 16.7864C13.0245 17.36 12.3171 17.796 11.4936 18.0914C10.6702 18.3869 9.75336 18.536 8.74033 18.536C7.7273 18.536 6.81048 18.3783 5.98704 18.0656C5.1636 17.753 4.45617 17.3055 3.86477 16.7233C3.27336 16.141 2.81495 15.4325 2.48954 14.5978C2.16412 13.7632 2 12.8252 2 11.7812C2 10.7543 2.16129 9.82498 2.48954 8.99031C2.81495 8.15563 3.27336 7.44716 3.86477 6.86489C4.45617 6.28263 5.1636 5.83517 5.98704 5.52253C6.81048 5.20988 7.7273 5.05212 8.74033 5.05212C9.75336 5.05212 10.6702 5.21275 11.4936 5.534C12.3171 5.85525 13.0245 6.30844 13.6159 6.89071C14.2073 7.47297 14.6657 8.18144 14.9911 9.01612C15.3165 9.84793 15.4807 10.7715 15.4807 11.7783ZM6.47657 11.7783C6.47657 12.8396 6.67748 13.6513 7.08213 14.2164C7.48395 14.7814 8.04705 15.0654 8.76863 15.0654C9.4902 15.0654 10.042 14.7785 10.4268 14.2049C10.8117 13.6312 11.0069 12.8224 11.0069 11.7783C11.0069 10.7342 10.8088 9.93111 10.4155 9.36605C10.0194 8.801 9.46473 8.5199 8.74316 8.5199C8.02159 8.5199 7.46414 8.80387 7.07081 9.36605C6.67182 9.93111 6.47657 10.7342 6.47657 11.7783Z"
                                fill="white"></path>
                            <path
                                d="M30.5573 11.7783C30.5573 12.8568 30.3932 13.8177 30.0678 14.6609C29.7424 15.5042 29.284 16.2127 28.6926 16.7864C28.1011 17.36 27.3937 17.796 26.5703 18.0914C25.7468 18.3869 24.83 18.536 23.817 18.536C22.804 18.536 21.8871 18.3783 21.0637 18.0656C20.2403 17.753 19.5328 17.3055 18.9414 16.7233C18.35 16.141 17.8916 15.4325 17.5662 14.5978C17.2408 13.7632 17.0767 12.8252 17.0767 11.7812C17.0767 10.7543 17.238 9.82498 17.5662 8.99031C17.8916 8.15563 18.35 7.44716 18.9414 6.86489C19.5328 6.28263 20.2403 5.83517 21.0637 5.52253C21.8871 5.20988 22.804 5.05212 23.817 5.05212C24.83 5.05212 25.7468 5.21275 26.5703 5.534C27.3937 5.85525 28.1011 6.30844 28.6926 6.89071C29.284 7.47297 29.7424 8.18144 30.0678 9.01612C30.3932 9.84793 30.5573 10.7715 30.5573 11.7783ZM21.5532 11.7783C21.5532 12.8396 21.7541 13.6513 22.1588 14.2164C22.5606 14.7814 23.1237 15.0654 23.8453 15.0654C24.5669 15.0654 25.1186 14.7785 25.5035 14.2049C25.8883 13.6312 26.0836 12.8224 26.0836 11.7783C26.0836 10.7342 25.8855 9.93111 25.4922 9.36605C25.096 8.801 24.5414 8.5199 23.8198 8.5199C23.0982 8.5199 22.5408 8.80387 22.1475 9.36605C21.7485 9.93111 21.5532 10.7342 21.5532 11.7783Z"
                                fill="white"></path>
                            <path
                                d="M45.6339 11.7783C45.6339 12.8568 45.4697 13.8177 45.1443 14.6609C44.8189 15.5042 44.3605 16.2127 43.7691 16.7864C43.1777 17.36 42.4703 17.796 41.6468 18.0914C40.8234 18.3869 39.9066 18.536 38.8935 18.536C37.8805 18.536 36.9637 18.3783 36.1402 18.0656C35.3168 17.753 34.6094 17.3055 34.018 16.7233C33.4266 16.141 32.9682 15.4325 32.6427 14.5978C32.3173 13.7632 32.1532 12.8252 32.1532 11.7812C32.1532 10.7543 32.3145 9.82498 32.6427 8.99031C32.9682 8.15563 33.4266 7.44716 34.018 6.86489C34.6094 6.28263 35.3168 5.83517 36.1402 5.52253C36.9637 5.20988 37.8805 5.05212 38.8935 5.05212C39.9066 5.05212 40.8234 5.21275 41.6468 5.534C42.4703 5.85525 43.1777 6.30844 43.7691 6.89071C44.3605 7.47297 44.8189 8.18144 45.1443 9.01612C45.4697 9.84793 45.6339 10.7715 45.6339 11.7783ZM36.6298 11.7783C36.6298 12.8396 36.8307 13.6513 37.2353 14.2164C37.6371 14.7814 38.2003 15.0654 38.9218 15.0654C39.6434 15.0654 40.1952 14.7785 40.58 14.2049C40.9649 13.6312 41.1601 12.8224 41.1601 11.7783C41.1601 10.7342 40.962 9.93111 40.5687 9.36605C40.1725 8.801 39.6179 8.5199 38.8964 8.5199C38.1748 8.5199 37.6173 8.80387 37.224 9.36605C36.825 9.93111 36.6298 10.7342 36.6298 11.7783Z"
                                fill="white"></path>
                        </svg></span>
                @endif
            </div>
        @endif

        <livewire:components.hotel.favorite-hotel-icon wire:key="{{ str()->uuid() }}" :hotel="$hotel"
            :wrapperClass="'absolute z-10 top-3 right-3'" :iconClass="'w-6 h-6'" :activeIconClass="'!w-8 !h-8'">
    </div>




    {{-- ____Title___ --}}
    <div class="flex justify-between gap-3 px-3 pt-3 ">
        <div class="space-y-[1px] w-3/4 overflow-hidden">
            <a href="#"
                class="block w-full overflow-hidden text-base font-medium text-ellipsis whitespace-nowrap hover:underline hover:decoration-2 ">{{ $hotel->title }}</a>
            <p
                class=" text-ellipsis overflow-hidden w-full whitespace-nowrap  text-[11px] font-medium  text-[#4C4B4B] ">
                {{ $hotel->address }}
            </p>
            <div
                class="text-[12px] font-semibold text-[#000000] w-full overflow-hidden text-ellipsis whitespace-nowrap">

                {!! $hotel->categories->pluck('title')->implode('&nbsp;&nbsp;&nbsp;') !!}



            </div>

        </div>
        <div class="relative flex flex-col items-end ">
            <div
                class="flex items-center justify-center w-7 h-7 rounded-t-lg rounded-br-lg text-xs font-semibold text-white bg-[#000000]  ">
                {{ number_format(collect([$hotel->getRomanticRating(), $hotel->getIntimateRating(), $hotel->getLuxuryRating()])->avg(), 1) }}
            </div>
            <h5 class="text-[#000000] mt-1 text-[10px] leading-3 whitespace-nowrap font-medium">Couple Rating
            </h5>

            <div data-id='view-score-container' class="flex ">
                <button type="button" class="text-[#A1A1A1] underline text-[9px]">view
                    score</button>
                <div class="absolute z-20 hidden pb-2 -right-3 bottom-full">

                    <div
                        class="flex flex-col gap-2 px-2 py-3 rounded-lg bg-white border  [box-shadow:0px_4px_14px_0px_rgba(0,0,0,0.10);]">
                        <div class="flex flex-col items-center justify-center">
                            <div
                                class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ number_format($hotel->getRomanticRating(), 1) }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Romantic</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div
                                class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md  ">
                                {{ number_format($hotel->getIntimateRating(), 1) }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Intimate</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div
                                class="flex items-center justify-center text-sm font-semibold text-[#74737A] rounded-md ">
                                {{ number_format($hotel->getLuxuryRating(), 1) }}
                            </div>
                            <span class="text-[10px]  font-normal  text-[#74737A]">Luxurious</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="flex justify-between p-3">
        <a href="#" class="block text-sm text-[#74737A] font-medium">More details...</a>
        <div class="flex items-center gap-1">
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

        </div>
    </div>




</article>
