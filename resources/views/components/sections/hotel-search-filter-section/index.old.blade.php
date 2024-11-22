@php

    $hotelServices = \App\Models\HotelService::get();
    // $hotelCategories = \App\Models\HotelCategory::get();
    $hotelTags = \App\Models\HotelTag::get();

    $filters = [];
    if (request()->query('romantic-scoring-from')) {
        $filters['romantic-scoring-from'] = request()->query('romantic-scoring-from');
    }
    if (request()->query('romantic-scoring-to')) {
        $filters['romantic-scoring-to'] = request()->query('romantic-scoring-to');
    }
    if (request()->query('intimate-scoring-from')) {
        $filters['intimate-scoring-from'] = request()->query('intimate-scoring-from');
    }
    if (request()->query('intimate-scoring-to')) {
        $filters['intimate-scoring-to'] = request()->query('intimate-scoring-to');
    }
    if (request()->query('luxurious-scoring-from')) {
        $filters['luxurious-scoring-from'] = request()->query('luxurious-scoring-from');
    }
    if (request()->query('luxurious-scoring-to')) {
        $filters['luxurious-scoring-to'] = request()->query('luxurious-scoring-to');
    }

    if (request()->query('booking-type')) {
        $filters['booking-type'] = request()->query('booking-type');
    }
    if (request()->query('category')) {
        $filters['category'] = request()->query('category');
    }

    // if (request()->query('active_category')) {
    //     $filters['categories'] = [request()->query('active_category')];
    // }

    if (request()->query('tags')) {
        $filters['tags'] = request()->query('tags');
    }

    if (request()->query('amenities')) {
        $filters['amenities'] = request()->query('amenities');
    }

    if (request()->query('query')) {
        $filters['query'] = request()->query('query');
    }
    if (request()->query('google-rating')) {
        $filters['google-rating'] = request()->query('google-rating');
    }

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

    if (request()->query('rating-from')) {
        $filters['rating-from'] = request()->query('rating-from');
    }
    if (request()->query('rating-to')) {
        $filters['rating-to'] = request()->query('rating-to');
    }
    if (request()->query('active-sort')) {
        $filters['active-sort'] = request()->query('active-sort');
    }

@endphp


<section wire:ignore id="hotel-filters-section-wrapper"
    class="group   top-0 z-[999] bg-white  w-full [&.sticky-to-top]:fixed [&.sticky-to-top]:shadow-lg">
    {{-- <h1 data-select='hotel-listing-filtered-hide' class=" text-2xl font-semibold leading-[35px] lg:leading-none">Book your
            next <span class="text-[#000000]">Travel
                Vibes</span>
        </h1> --}}
    <div id="hotel-filters-section"
        class="max-w-[86rem] px-3 py-[20px] mx-auto  lg:px-0 group-[&.sticky-to-top]:py-[10px]"
        data-filters="{{ !empty($filters) ? json_encode($filters) : '{}' }}">


        {{-- Filter --}}
        <div class="relative grid grid-cols-12 gap-2 ">


            {{-- Category Listing --}}
            <div class="relative flex-1 w-full col-span-12 lg:col-span-11" id="filter-category-list">
                <button type="button" data-id="prev"
                    class="absolute left-0 flex items-center justify-center h-full w-9 lg:w-12 bg-gradient-to-r from-white to-transparent ">
                    <div
                        class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                        <i class="text-xs leading-none far fa-chevron-left"></i>
                    </div>
                </button>

                <ul class="flex gap-2 overflow-x-auto overflow-y-hidden no-scrollbar ">
                    {{-- <li class=" shrink-0">
                        <button type="button" data-select="show-filter"
                            class="relative flex gap-1  items-center justify-center w-full h-full  text-sm border border-[#BABABA] rounded-lg whitespace-nowrap px-4 ">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                    stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M22 22L20 20" stroke="#000" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span>Search</span>
                        </button>
                    </li> --}}
                    {{-- <li class=" shrink-0 w-[40px] h-[40px] ">
                        <button type="button" data-select="show-filter"
                            class="relative flex gap-2 lg:gap-0 items-center justify-center w-full h-full  text-sm bg-[#F8F8F8] rounded-lg whitespace-nowrap ">
                            <svg width="30" height="30" class="w-[20px] h-[20px]" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                    stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 22L20 20" stroke="#000" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </li> --}}
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-id="cat-item-all" data-select="cat-item" class='block h-full'>
                            <input type="radio" name="category" value="" class="hidden peer" />
                            <div @class([
                                'relative group flex  h-full w-[50px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('All') }}</span>

                            </div>
                        </div>
                    </li>
                    {{-- sort result click --}}
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="sort-item" class='block h-full'>
                            <input type="radio" name="sort" value="new-added" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('New') }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="sort-item" class='block h-full'>
                            <input type="radio" name="sort" value="best-rating" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('Best Rating') }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="sort-item" class='block h-full'>
                            <input type="radio" name="sort" value="more-clicked" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('More Clicked') }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="sort-item" class='block h-full'>
                            <input type="radio" name="sort" value="first-romantic" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('Romantic') }} Romantic</span>
                            </div>
                        </div>
                    </li>
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="sort-item" class='block h-full'>
                            <input type="radio" name="sort" value="first-intimate" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('Intimate') }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="sort-item" class='block h-full'>
                            <input type="radio" name="sort" value="first-luxurious" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('Luxurious') }}</span>
                            </div>
                        </div>
                    </li>
                    {{-- Google Review --}}
                    <li class="shrink-0 cursor-pointer h-[40px]">
                        <div data-select="best-google-review-item" class='block h-full'>
                            <input type="radio" name="sort" value="best-google-review" class="hidden peer" />
                            <div @class([
                                'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                'px-3 flex items-center gap-1',
                            ])>
                                <span class="static p-0 text-sm top-full"> {{ __('Best Google Review') }}</span>
                            </div>
                        </div>
                    </li>

                    {{-- Categories list --}}
                    @foreach ($hotelCategories as $hotelCategory)
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="cat-item" class='block h-full'>
                                <input type="radio" name="category" value="{{ $hotelCategory->slug }}"
                                    class="hidden peer" />
                                <div @class([
                                    'relative group flex w-full h-full min-w-[100px]  text-black    justify-center items-center  bg-[#EDEDED] text-sm rounded-lg whitespace-nowrap',
                                    ' peer-checked:text-white peer-checked:bg-black peer-checked:border-[#000000]',
                                    'px-3 flex items-center gap-1',
                                ])>
                                    {{-- <i class="text-sm far fa-sort-numeric-down "></i> --}}
                                    <span class="static p-0 text-sm top-full">{{ $hotelCategory->title }}</span>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <button type="button" data-id="next"
                    class="absolute top-0 right-0 flex items-center justify-center h-full w-9 lg:w-12 bg-gradient-to-r from-transparent to-white ">
                    <div
                        class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                        <i class="text-xs leading-none far fa-chevron-right"></i>
                    </div>
                </button>
            </div>
        </div>

        {{-- <div class="relative grid grid-cols-12 gap-2 ">

            <div class="col-span-3 lg:col-span-1 group-[&.sticky-to-top]:hidden">
                <button type="button" data-select="show-filter"
                    class="relative flex gap-2 lg:gap-0 items-center justify-center w-full h-[80px]  text-sm border border-[#BABABA] rounded-lg whitespace-nowrap ">
                    <svg width="30" height="30" class="w-[30px] h-[30px] lg:w-[25px] lg:h-[25px]"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                            stroke="#74737A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22 22L20 20" stroke="#74737A" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span class="absolute block pt-1 text-xs text-gray-400 top-full ">Where to</span>
                </button>
            </div>
            <div class="relative flex-1 w-full col-span-9 lg:col-span-11 group-[&.sticky-to-top]:col-span-12"
                id="filter-category-list">
                <button type="button" data-id="prev"
                    class="absolute left-0 flex items-center justify-center h-full pb-2 w-9 lg:w-12 bg-gradient-to-r from-white to-transparent group-[&.sticky-to-top]:pb-0">
                    <div
                        class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                        <i class="text-xs leading-none far fa-chevron-left"></i>
                    </div>
                </button>

                <ul class="flex gap-2 pb-5 overflow-x-auto overflow-y-hidden no-scrollbar group-[&.sticky-to-top]:pb-0">
                    <li class="hidden shrink-0 w-[40px] h-[40px] group-[&.sticky-to-top]:block">
                        <button type="button" data-select="show-filter"
                            class="relative flex gap-2 lg:gap-0 items-center justify-center w-full h-full  text-sm border border-[#BABABA] rounded-lg whitespace-nowrap ">
                            <svg width="30" height="30" class="w-[20px] h-[20px]" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                    stroke="#74737A" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M22 22L20 20" stroke="#74737A" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </li>
                    @foreach ($hotelCategories as $hotelCategory)
                        <li class="shrink-0 h-[80px] cursor-pointer group-[&.sticky-to-top]:h-[40px]">
                            <div data-select="cat-item" class='block h-full'>
                                <input type="radio" name="category" value="{{ $hotelCategory->slug }}"
                                    class="hidden peer" />
                                <div @class([
                                    'relative group flex w-full h-full min-w-[100px]  text-gray-400    justify-center items-center  border border-[#BABABA] text-sm rounded-lg whitespace-nowrap',
                                    ' peer-checked:text-[#000000] peer-checked:border-[#000000]',
                                    'group-[&.sticky-to-top]:px-3',
                                ])>

                                    <div class="w-full h-full  group-[&.sticky-to-top]:hidden">
                                        <img class="w-[140px] h-full  object-cover shrink-0 rounded-lg"
                                            src="{{ $hotelCategory->icon->getUrl() }}"
                                            alt="{{ $hotelCategory->title }}">
                                    </div>

                                    <span
                                        class="absolute pt-1 text-xs top-full group-[&.sticky-to-top]:static group-[&.sticky-to-top]:p-0">{{ $hotelCategory->title }}</span>

                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
                <button type="button" data-id="next"
                    class="absolute top-0 right-0 flex items-center justify-center h-full pb-2 w-9 lg:w-12 bg-gradient-to-r from-transparent to-white group-[&.sticky-to-top]:pb-0">
                    <div
                        class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                        <i class="text-xs leading-none far fa-chevron-right"></i>
                    </div>
                </button>
            </div>
        </div> --}}
















        {{-- <div class="grid grid-cols-12 gap-2">

        <div class="col-span-3 lg:col-span-1">
            <button type="button" data-select="show-filter"
                class="relative flex items-center justify-center w-full h-[5rem]  text-sm border rounded-lg whitespace-nowrap">
                <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                        stroke="#74737A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M22 22L20 20" stroke="#74737A" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="block absolute top-full text-[9px]">Where to</span>
            </button>
        </div>
        <div class="relative flex-1 w-full col-span-9 lg:col-span-11" id="filter-category-list">
            <button type="button" data-id="prev"
                class="absolute left-0 flex items-center justify-center h-full pb-2 w-9 lg:w-12 bg-gradient-to-r from-white to-transparent">
                <div
                    class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                    <i class="text-xs leading-none far fa-chevron-left"></i>
                </div>
            </button>

            <ul class="flex gap-2 pb-2 overflow-x-auto overflow-y-hidden no-scrollbar">
                @foreach ($hotelCategories as $hotelCategory)
                    <li>
                        <label class='block '>
                            <input type="radio" name="category" value="{{ $hotelCategory->slug }}"
                                class="hidden peer" />
                            <div @class([
                                'group flex h-[5rem] px-4 w-full  justify-center items-center  border text-sm rounded-lg whitespace-nowrap',
                                'peer-checked:bg-[#000000] peer-checked:text-white' => !$hotelCategory->svg,
                            ])>
                                @if ($hotelCategory->svg)
                                    <div class="group-peer-checked:hidden">
                                        {!! $hotelCategory->svg !!}
                                    </div>
                                    <div class="hidden group-peer-checked:block">
                                        {!! $hotelCategory->svg_active !!}
                                    </div>
                                @else
                                    {{ $hotelCategory->title }}
                                @endif
                            </div>
                        </label>
                    </li>
                @endforeach


            </ul>
            <button type="button" data-id="next"
                class="absolute top-0 right-0 flex items-center justify-center h-full pb-2 w-9 lg:w-12 bg-gradient-to-r from-transparent to-white">
                <div
                    class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                    <i class="text-xs leading-none far fa-chevron-right"></i>
                </div>
            </button>
        </div>
    </div> --}}




        <div data-id="more-filters-wrapper"
            class="
        {{-- absolute hidden right-0 z-[999] pt-1 top-full w-auto --}}
          z-[99999]
    hidden
        lg:w-screen lg:h-screen lg:fixed lg:inset-0 lg:bg-black/50

        max-lg:fixed max-lg:w-screen max-lg:overflow-x-hidden
        max-lg:overflow-y-scroll  max-lg:inset-0  max-lg:bg-white  max-lg:px-2 max-lg:py-10
       ">

            <div class="lg:flex lg:justify-center lg:items-center lg:w-full lg:h-full">
                <div class=" lg:max-w-5xl lg:max-h-4/5 lg:relative">


                    {{-- mobile close btn --}}
                    <div class="relative mb-7 lg:hidden pb-7">


                        <button data-select="close-filter-btn"
                            class="absolute left-0 flex items-center justify-center w-7 h-7 rounded-full bg-[#f1f4f7]">
                            <i class="text-gray-500 fal fa-times"></i>
                        </button>

                        <h4 class="absolute top-0 text-lg font-bold -translate-x-1/2 left-2/4">Filters</h4>
                        <div class="absolute top-0 right-0">
                            <button data-select="reset-btn"
                                class=" hidden text-sm  cursor-pointe  text-[#000000] lg:!hidden">reset
                                filters</button>
                        </div>
                    </div>


                    {{-- Desktop Close Button --}}
                    <button data-select="close-filter-btn"
                        class="max-lg:hidden absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>

                    <div
                        class="bg-white lg:border-2 lg:rounded-lg lg:shadow-2xl lg:p-5 lg:w-full lg:h-full lg:flex lg:flex-col">


                        <div
                            class="flex flex-col gap-5 lg:overflow-y-auto lg:w-full lg:h-full lg:flex-row lg:gap-10 lg:pr-2">



                            <div class="space-y-5 lg:w-2/4">

                                {{-- Search wrapper --}}
                                <div class="">
                                    <div class="flex items-center justify-between gap-1 pb-2 ">
                                        <div class="flex items-center gap-1">
                                            <h4 class="font-medium text-[15px]">Where to</h4>
                                        </div>

                                    </div>
                                    <div class="relative flex-1" data-id="hotel-search-filter-wrapper">
                                        <label class="relative block ">
                                            <svg class="absolute top-2/4 left-4 text-gray-500 [transform:translateY(-50%)]"
                                                width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                                    stroke="#74737A" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M22 22L20 20" stroke="#74737A" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <input type="text" placeholder="Type here (city, address...)"
                                                name="query" autocomplete="off"
                                                class="px-10  overflow-hidden text-ellipsis  w-full py-[15px] border-2 rounded-lg text-xs placeholder:text-md focus:border-[#000000] focus:outline-none text-gray-500 " />


                                            <div
                                                class="flex gap-2 items-center  absolute top-2/4 right-4 [transform:translateY(-50%)]">
                                                <i data-id="search-down-arrow"
                                                    class="text-xl cursor-pointer fal fa-angle-down"></i>
                                                <i data-id="remove-search"
                                                    class="hidden pr-1 text-lg cursor-pointer fal fa-times"></i>
                                            </div>


                                        </label>
                                        <div data-id="search-suggestion"
                                            class="absolute z-40 hidden w-full pt-1 top-full">
                                            <ul class="p-2 bg-white border rounded-lg shadow-lg " tabindex="-1">
                                                {{-- <li class="text-sm text-[#5B5B5B] py-1 px-2 hover:underline" tabindex="-1">Rokon</li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                {{-- Checkout and Check in --}}
                                <div data-id="checkout-and-checkin-filter" class="relative mt-5">
                                    <h4 class="mb-1 text-base font-medium lg:text-sm">When</h4>
                                    <button data-id="toggle-calender-btn" type="button"
                                        class="grid w-full grid-cols-2 gap-3 pt-2">
                                        <div class="flex items-center justify-between gap-5 p-3 border rounded-lg ">
                                            <div class="flex flex-col text-left">
                                                <span class="text-xs text-[#9CA3AF]">DD/MM/YYYY</span>
                                                <span data-id="check-in"
                                                    class="text-xs font-medium whitespace-nowrap">Check in</span>
                                            </div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 2V5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M16 2V5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M3.5 9.09009H20.5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.6947 13.7H15.7037" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.6947 16.7H15.7037" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.9955 13.7H12.0045" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.9955 16.7H12.0045" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8.29431 13.7H8.30329" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8.29431 16.7H8.30329" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="flex items-center justify-between gap-5 p-3 border rounded-lg ">
                                            <div class="flex flex-col text-left">
                                                <span class="text-xs text-[#9CA3AF]">DD/MM/YYYY</span>
                                                <span data-id="check-out"
                                                    class="text-xs font-medium whitespace-nowrap">Check Out</span>
                                            </div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 2V5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M16 2V5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M3.5 9.09009H20.5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.6947 13.7H15.7037" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.6947 16.7H15.7037" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.9955 13.7H12.0045" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.9955 16.7H12.0045" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8.29431 13.7H8.30329" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8.29431 16.7H8.30329" stroke="#292D32" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </button>
                                    {{-- Calender --}}
                                    <div data-id="calender-selector-wrapper"
                                        class="absolute left-0 z-20 hidden w-full h-auto pt-2 top-full lg:w-auto">

                                        <div class="px-6 py-3 bg-white border-2 rounded-lg lg:shadow-2xl">

                                            <div class="pb-3 border-b ">
                                                <div class="flex justify-between">

                                                    <h4 class="text-[13px] font-semibold lg:text-sm">Select your
                                                        Check-in <span class="whitespace-nowrap">and Check-out
                                                            dates</span></h4>
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



                                {{-- Google clicked filter --}}
                                <div data-id="guest-and-rooms-filter" class="mt-5">
                                    <h4 class="mb-1 text-base font-medium lg:text-sm">Guests and rooms</h4>
                                    <div class="flex flex-col gap-3 pt-2">

                                        <div data-id="adults" class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <svg width="15" height="16" viewBox="0 0 15 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.445 4C11.445 6.17562 9.67562 7.945 7.5 7.945C5.32438 7.945 3.555 6.17562 3.555 4C3.555 1.82438 5.32438 0.055 7.5 0.055C9.67562 0.055 11.445 1.82438 11.445 4ZM9.555 4C9.555 2.86662 8.63338 1.945 7.5 1.945C6.36662 1.945 5.445 2.86662 5.445 4C5.445 5.13338 6.36662 6.055 7.5 6.055C8.63338 6.055 9.555 5.13338 9.555 4ZM0.055 15C0.055 11.7214 2.72138 9.055 6 9.055H9C12.2786 9.055 14.945 11.7214 14.945 15V15.945H13.055V15C13.055 12.7636 11.2364 10.945 9 10.945H6C3.76362 10.945 1.945 12.7636 1.945 15V15.945H0.055V15Z"
                                                        fill="#808080" stroke="white" stroke-width="0.11" />
                                                </svg>
                                                <span class="text-xs">Adults</span>
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
                                        <div data-id="rooms" class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <svg width="20" height="14" viewBox="0 0 20 14"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.09091 8.055H9.14591V8V2.66667C9.14591 2.44591 9.23559 2.23394 9.39563 2.07745C9.55571 1.92093 9.77309 1.83278 10 1.83278H17.2727C17.9819 1.83278 18.6617 2.10823 19.1627 2.59815C19.6638 3.08803 19.945 3.75219 19.945 4.44444V12.4444C19.945 12.6652 19.8553 12.8772 19.6953 13.0337C19.5352 13.1902 19.3178 13.2783 19.0909 13.2783C18.864 13.2783 18.6466 13.1902 18.4865 13.0337C18.3265 12.8772 18.2368 12.6652 18.2368 12.4444V9.77778V9.72278H18.1818H1.81818H1.76318V9.77778V12.4444C1.76318 12.6652 1.6735 12.8772 1.51346 13.0337C1.35338 13.1902 1.136 13.2783 0.909091 13.2783C0.682178 13.2783 0.464801 13.1902 0.304718 13.0337C0.144677 12.8772 0.055 12.6652 0.055 12.4444V0.888889C0.055 0.668132 0.144677 0.45616 0.304718 0.299675C0.464801 0.143149 0.682178 0.055 0.909091 0.055C1.136 0.055 1.35338 0.143149 1.51346 0.299675C1.6735 0.45616 1.76318 0.668132 1.76318 0.888889V8V8.055H1.81818H9.09091ZM18.1818 8.055H18.2368V8V4.44444C18.2368 4.19371 18.1349 3.95349 17.954 3.77658C17.7731 3.59971 17.528 3.50056 17.2727 3.50056H10.9091H10.8541V3.55556V8V8.055H10.9091H18.1818ZM6.93966 6.61565C6.50017 6.90278 5.98334 7.05611 5.45455 7.05611C4.74542 7.05611 4.06558 6.78066 3.56452 6.29074C3.06351 5.80086 2.78227 5.1367 2.78227 4.44444C2.78227 3.92818 2.93883 3.42341 3.23231 2.99396C3.5258 2.56448 3.94307 2.22956 4.43151 2.03174C4.91996 1.83392 5.4575 1.78214 5.97611 1.88301C6.49472 1.98387 6.97092 2.23281 7.34457 2.59815C7.7182 2.96348 7.97251 3.42879 8.07552 3.93517C8.17853 4.44153 8.12567 4.96641 7.92357 5.44348C7.72147 5.92056 7.37913 6.32853 6.93966 6.61565ZM5.98969 3.65932C5.83118 3.55576 5.64495 3.50056 5.45455 3.50056C5.19925 3.50056 4.95416 3.59971 4.77327 3.77658C4.59234 3.95349 4.49045 4.19371 4.49045 4.44444C4.49045 4.63141 4.54716 4.81407 4.65325 4.96932C4.75934 5.12455 4.90998 5.24536 5.08601 5.31665C5.26202 5.38793 5.45563 5.40657 5.6424 5.37024C5.82918 5.33391 6.00091 5.24422 6.13582 5.11231C6.27074 4.98039 6.36277 4.81216 6.40006 4.62882C6.43736 4.44548 6.41821 4.25545 6.34508 4.08283C6.27196 3.91022 6.14821 3.76288 5.98969 3.65932Z"
                                                        fill="#808080" stroke="white" stroke-width="0.11" />
                                                </svg>

                                                <span class="text-xs">Rooms</span>
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





                                {{-- ratings --}}
                                <div class="flex items-center justify-between gap-1 pb-1">
                                    <div class="flex items-center gap-1">
                                        <h4 class="font-medium text-[15px]">Rating</h4>
                                        <span class="text-[11px] font-medium text-gray-500">( range from 1 to 10
                                            )</span>
                                    </div>
                                </div>

                                <d data-id="romantic-scoring-filter" class="flex items-center gap-3 mt-3 group">
                                    <span class="text-[#0F172A] text-sm font-medium pt-8 w-[68px]">Romantic</span>

                                    <div class="relative flex-1 pt-2">
                                        <input type="text" />

                                        <div class="flex justify-between pt-1">
                                            {{-- <span class="text-[#596372] text-xs">€</span>
                                        <span class="text-[#596372] text-xs">€€€</span> --}}
                                        </div>
                                    </div>
                                </d iv>

                                <div data-id="intimate-scoring-filter" class="flex items-center gap-3 mt-5 group">
                                    <span class="text-[#0F172A] text-sm font-medium pt-8  w-[68px]">Intimate</span>

                                    <div class="relative flex-1 pt-2">
                                        <input type="text" />

                                        <div class="flex justify-between pt-1">
                                            {{-- <span class="text-[#596372] text-xs">€</span>
                                        <span class="text-[#596372] text-xs">€€€</span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div data-id="luxurious-scoring-filter" class="flex items-center gap-3 mt-5 group">

                                    <span class="text-[#0F172A] text-sm font-medium pt-8 w-[68px]">Luxurious</span>

                                    <div class="relative flex-1 pt-2">
                                        <input type="text" />

                                        <div class="flex justify-between pt-1">
                                            {{-- <span class="text-[#596372] text-xs">€</span>
                                        <span class="text-[#596372] text-xs">€€€</span> --}}
                                        </div>
                                    </div>
                                </div>


                                {{-- <div data-id="categories-filter" class="mt-5">
                                <h4 class="mb-1 text-base font-semibold lg:text-sm">Vibes</h4>
                                <div class="flex flex-col gap-2 pt-3 border-t lg:gap-5 lg:flex-row">
                                    <ul class="flex flex-wrap w-full gap-2">



                                        <li>
                                            <label class="">
                                                <input type="checkbox" name="categories[]" value="all"
                                                    class="hidden peer" />
                                                <span
                                                    class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">All
                                                </span>
                                            </label>
                                        </li>

                                        @foreach ($hotelCategories as $hotelCategory)
                                            <li>
                                                <label class="">
                                                    <input type="checkbox" name="categories[]"
                                                        value="{{ $hotelCategory->slug }}" class="hidden peer" />
                                                    <span
                                                        class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">{{ $hotelCategory->title }}</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> --}}
                                {{-- <div data-id="booking-type-filter" class="mt-7 ">
                                    <h4 class="mb-1 text-base font-medium lg:text-sm">Booking Type</h4>
                                    <div class="flex flex-col gap-2 pt-3 lg:gap-5 lg:flex-row">
                                        <ul class="flex flex-wrap w-full gap-2">


                                            <li>
                                                <label class="">
                                                    <input type="checkbox" name="booking_type[]" value="all"
                                                        class="hidden peer" />
                                                    <span
                                                        class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">All
                                                    </span>
                                                </label>
                                            </li>

                                            <li>
                                                <label class="">
                                                    <input type="checkbox" name="booking_type[]" value="direct"
                                                        class="hidden peer" />
                                                    <span
                                                        class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">Direct
                                                        Booking</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label class="">
                                                    <input type="checkbox" name="booking_type[]" value="request"
                                                        class="hidden peer" />
                                                    <span
                                                        class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">Booking
                                                        Request</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label class="">
                                                    <input type="checkbox" name="booking_type[]" value="online"
                                                        class="hidden peer" />
                                                    <span
                                                        class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">Online
                                                        Booking</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}


                            </div>
                            <div class="space-y-5 lg:w-2/4">

                                {{-- Google rating filter --}}
                                <div data-id="google-ratings-filter" data-filter-value='4'
                                    class="flex flex-col flex-wrap justify-between lg:flex-row lg:items-center">
                                    <h4 class="mb-1 text-[15px] font-medium ">Google Review</h4>
                                    <div class="flex items-center gap-2">
                                        <i data-id="1" data-select="rating-stars"
                                            class="fal fa-star text-[#8A8A8A]  text-xl cursor-pointer"></i>
                                        <i data-id="2" data-select="rating-stars"
                                            class="fal fa-star text-[#8A8A8A] text-xl cursor-pointer"></i>
                                        <i data-id="3" data-select="rating-stars"
                                            class="fal fa-star text-[#8A8A8A] text-xl cursor-pointer"></i>
                                        <i data-id="4" data-select="rating-stars"
                                            class="fal fa-star text-[#8A8A8A] text-xl cursor-pointer"></i>
                                        <i data-id="5" data-select="rating-stars"
                                            class="fal fa-star text-[#8A8A8A] text-xl cursor-pointer"></i>
                                    </div>
                                </div>

                                {{-- tags --}}
                                <div data-id="tags-filter" class="">
                                    <h4 class="mb-1 text-[15px] font-medium ">Tags</h4>
                                    <div class="flex flex-col gap-2 pt-3 lg:gap-5 lg:flex-row">
                                        <ul class="flex flex-wrap w-full gap-2">

                                            @foreach ($hotelTags as $tag)
                                                <li>
                                                    <label class="">
                                                        <input type="checkbox" name="tags[]"
                                                            value="{{ $tag->slug }}" class="hidden peer" />
                                                        <span
                                                            class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">{{ $tag->title }}</span>
                                                    </label>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div data-id="amenities-filter" class="">
                                    <h4 class="mb-1 text-[15px] font-medium">Amenities</h4>
                                    <div class="flex flex-col gap-2 pt-3 lg:gap-5 lg:flex-row">
                                        <ul class="grid justify-between w-full grid-cols-2 gap-y-2">

                                            @foreach ($hotelServices as $service)
                                                <li>
                                                    <label
                                                        class="relative flex items-center text-xs text-black cursor-pointer gap-x-2">
                                                        <input type="checkbox" name="amenities[]"
                                                            value="{{ $service->slug }}"
                                                            class="absolute opacity-0 peer" />
                                                        <span
                                                            class="w-[18px] h-[18px]  shadow-lg rounded-sm  bg-white block border border-gray-400
                        relative peer-checked:after:absolute peer-checked:after:top-[2px] peer-checked:after:left-[6px] peer-checked:after:w-[5px] peer-checked:after:h-[10px] peer-checked:after:border-white peer-checked:bg-[#000000] peer-checked:border-transparent peer-checked:after:border-r-2 peer-checked:after:border-b-2 peer-checked:after:rotate-45
                        "></span>

                                                        {{ $service->title }}
                                                    </label>
                                                </li>
                                            @endforeach

                                        </ul>


                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="pt-28 lg:hidden"></div>

                        <div
                            class="clear-both fixed z-50 left-0 bottom-0 w-full bg-white [box-shadow:0px_-4px_63px_0px_rgba(0,0,0,0.10)] lg:static lg:shadow-none p-5 lg:p-0 flex flex-col items-center gap-2 lg:flex-row  lg:justify-end  lg:gap-3 lg:mt-5">
                            <button data-select="apply-btn"
                                class="lg:order-2 w-full py-5   lg:w-auto lg:px-5 lg:py-2 text-[13px] bg-[#000000] text-white rounded-lg focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]">Apply
                                & Search</button>
                            <div class="flex justify-center ">
                                <button data-select="reset-btn"
                                    class="hidden text-sm  cursor-pointe  text-[#000000]">Reset
                                    Filters</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>
</section>
