@php

    $hotelServices = \App\Models\HotelService::get();
    $hotelTags = \App\Models\HotelTag::get();
@endphp


<section id="hotel-filters-section-wrapper"
    class="group  pb-3  top-0 z-[999] bg-white  w-full  [&.sticky-to-top]:pt-[5px] [&.sticky-to-top]:pb-0  [&.sticky-to-top]:fixed [&.sticky-to-top]:shadow-lg">

    <div id="hotel-filters-section" class="border-b">
        <div class="max-w-[86rem] px-3  mx-auto  lg:px-0" {{-- data-filters="{{ !empty($filters) ? json_encode($filters) : '{}' }}" --}}>


            {{-- Filter --}}
            <div wire:ignore class="relative grid grid-cols-12 gap-2 ">


                {{-- Category Listing --}}
                <div class="relative flex-1 w-full col-span-12 " id="filter-category-list">



                    <ul class="flex gap-5 overflow-x-auto overflow-y-hidden no-scrollbar">
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-id="cat-item-all" data-select="cat-item" class='block h-full group'>
                                <input type="radio" name="category" value="" class="hidden peer group " />
                                <div @class([
                                    'relative group flex  h-full   text-black    justify-center items-center   text-sm  whitespace-nowrap  group-[&.reset]:!text-black',
                                    'peer-checked:font-bold group-[&.reset]:!font-normal ',
                                ])>
                                    <span data-id="inactive" class="static hidden p-0 px-1 text-sm top-full">
                                        {{ __('All') }} </span>
                                    <span data-id="active"
                                        class="static hidden p-0 px-1 text-sm top-full group-[&.reset]:!text-[#1a73e8]">
                                        {{ __('Reset') }}</span>

                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block group-[&.reset]:!hidden"></span>

                                </div>
                            </div>
                        </li>
                        {{-- sort result click --}}
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="sort-item" class='block h-full'>
                                <input type="radio" name="sort" value="new-added" class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full"> {{ __('New') }} </span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="sort-item" class='block h-full'>
                                <input type="radio" name="sort" value="best-rating" class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full"> {{ __('Best Rating') }} </span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="sort-item" class='block h-full'>
                                <input type="radio" name="sort" value="more-clicked" class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full"> {{ __('More Clicked') }} </span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="sort-item" class='block h-full'>
                                <input type="radio" name="sort" value="first-romantic" class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full"> {{ __('Romantic') }} </span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="sort-item" class='block h-full'>
                                <input type="radio" name="sort" value="first-intimate" class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full"> {{ __('Intimate') }} </span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="sort-item" class='block h-full'>
                                <input type="radio" name="sort" value="first-luxurious"
                                    class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full">{{ __('Luxurious') }}</span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>
                        {{-- Google Review --}}
                        <li class="shrink-0 cursor-pointer h-[40px]">
                            <div data-select="best-google-review-item" class='block h-full'>
                                <input type="radio" name="sort" value="best-google-review"
                                    class="hidden peer group" />
                                <div @class([
                                    'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                    'peer-checked:font-bold',
                                    'px-1 flex items-center gap-1',
                                ])>
                                    <span class="static p-0 text-sm top-full"> {{ __('Best Google Review') }} </span>
                                    <span
                                        class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>
                                </div>
                            </div>
                        </li>




                        {{-- Categories list --}}
                        @foreach ($hotelCategories as $hotelCategory)
                            <li class="shrink-0 cursor-pointer h-[40px]">
                                <div data-select="cat-item" class='block h-full'>
                                    <input type="radio" name="category" value="{{ $hotelCategory->slug }}"
                                        class="hidden peer group" />
                                    <div @class([
                                        'relative group flex w-full h-full   text-black    justify-center items-center  text-sm rounded-lg whitespace-nowrap',
                                        'peer-checked:font-bold',
                                        'px-1 flex items-center gap-1',
                                    ])>
                                        {{-- <i class="text-sm far fa-sort-numeric-down "></i> --}}
                                        <span class="static p-0 text-sm top-full">{{ $hotelCategory->title }}</span>
                                        <span
                                            class="absolute bottom-0 hidden w-full h-[2px] bg-black rounded-t group-peer-checked:block"></span>

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <button type="button" data-id="prev"
                        class="absolute top-0 left-0 flex items-center justify-center h-full w-9 lg:w-12 bg-gradient-to-r from-white to-transparent max-lg:!hidden">
                        <div
                            class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                            <i class="text-xs leading-none far fa-chevron-left"></i>
                        </div>
                    </button>
                    <button type="button" data-id="next"
                        class="absolute top-0 right-0 flex items-center justify-center h-full w-9 lg:w-12 bg-gradient-to-r from-transparent to-white  max-lg:!hidden">
                        <div
                            class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                            <i class="text-xs leading-none far fa-chevron-right"></i>
                        </div>
                    </button>
                </div>
            </div>








        </div>
    </div>
</section>
