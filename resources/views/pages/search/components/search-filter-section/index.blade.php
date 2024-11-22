 {{-- @php
    if (!isset($queryCheckIn) || !$queryCheckIn) {
        $queryCheckIn = now();
    }
    if (!isset($queryCheckOut) || !$queryCheckOut) {
        $queryCheckOut = now()->addDay();
    }
@endphp --}}


 <section class="max-w-5xl px-3 mx-auto mt-10 lg:px-0" wire:ignore>
     <div class="bg-white rounded-lg gap-x-2 gap-y-4 lg:py-4 lg:pt-5 lg:px-5 lg:border-2 lg:shadow-lg">

         @if (request()->routeIs('search'))
             {{-- Mobile Toggle Search Filter --}}
             <div class="mb-5 lg:hidden">
                 {{-- <div class="flex justify-end">
                     <button data-main-id="reset-btn"
                         class="hidden  text-sm font-medium text-[#000000] justify-self-end">Reset</button>
                 </div> --}}
                 <div tabindex="-1" id="mobile-listing-filter-toggle-btn"
                     class="w-full h-full mt-1 px-5 py-[10px] rounded-lg bg-[#000000] flex justify-between items-center text-sm font-medium text-white focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]">
                     Filters

                     <div class="flex items-center gap-x-2">
                         {{-- <button data-id="reset-btn" class="hidden text-sm font-medium text-[#ffffffa6] ">Reset</button> --}}
                         <i class="text-lg far fa-sliders-h"></i>
                     </div>

                 </div>
             </div>
         @endif


         <div id="listing-filters"
             class="hidden lg:!block [&.slide-down]:block [&.slide-down]:fixed [&.slide-down]:w-screen [&.slide-down]:overflow-x-hidden [&.slide-down]:overflow-y-scroll  [&.slide-down]:inset-0 z-[999] [&.slide-down]:bg-white  [&.slide-down]:px-6 [&.slide-down]:py-10"
             {{--
         @class([


             //  'hidden lg:!block' => request()->routeIs('search'),
         ])
          --}}>

             <div class="flex justify-between lg:hidden">


                 <button data-main-id="close-mobile-filter-btn"
                     class="flex items-center justify-center w-7 h-7 rounded-full bg-[#f1f4f7]">
                     <i class="text-gray-500 fal fa-times"></i>
                 </button>

                 <h4 class="text-lg font-bold">Filters</h4>
                 <div>
                     <button data-main-id="reset-btn"
                         class=" hidden text-sm font-medium text-[#000000] justify-self-end">Reset</button>
                 </div>
             </div>

             <form id="hotel-search-form" class="grid grid-cols-1 gap-2 mt-5 lg:mt-0 lg:grid-cols-12 lg:gap-x-3"
                 method="GET">
                 {{-- Search --}}
                 <div class="relative lg:col-span-12 " data-id="hotel-search-input-wrapper">
                     <label class="relative block ">
                         {{-- <i
                             class="fal fa-location-arrow   text-lg absolute top-2/4 left-5 text-gray-500 [transform:translateY(-50%)]"></i> --}}
                         <svg class="absolute top-2/4 left-5 text-gray-500 [transform:translateY(-50%)]" width="20"
                             height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M23 1L15.3 22.0202L10.9 12.5611L1 8.35709L23 1Z" stroke="#64748B" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" />
                         </svg>

                         <input type="text" placeholder="Where to?" name="query" autocomplete="off"
                             class="px-11 pr-10 w-full py-[15px] border-2 rounded-lg text-sm placeholder:text-md focus:border-[#000000] focus:outline-none text-gray-500 " />
                         <i data-id="down-arrow"
                             class=" fal fa-angle-down   cursor-pointer text-xl absolute top-2/4 right-5  [transform:translateY(-50%)]"></i>
                         <i data-id="remove-search"
                             class=" fal fa-times  hidden cursor-pointer text-lg absolute top-2/4 right-5 text-gray-500 [transform:translateY(-50%)]"></i>
                     </label>
                     <div data-id="search-suggestion" class="absolute z-40 hidden w-full pt-1 top-full">
                         <ul class="p-2 bg-white border rounded-lg shadow-lg " tabindex="-1">
                             {{-- <li class="text-sm text-[#5B5B5B] py-1 px-2 hover:underline" tabindex="-1">Rokon</li> --}}
                         </ul>
                     </div>

                 </div>
                 {{-- <div class="relative lg:col-span-12 " data-id="hotel-search-input-wrapper">
                     <label class="relative block ">
                         <input type="text" placeholder="Where to?" name="query" autocomplete="off"
                             class="px-5 pr-10 w-full py-[15px] border-2 rounded-lg text-sm placeholder:text-md focus:border-[#000000] focus:outline-none text-gray-500 " />
                         <i data-id="remove-search"
                             class=" fal fa-times  hidden cursor-pointer text-lg absolute top-2/4 right-5 text-gray-500 [transform:translateY(-50%)]"></i>
                     </label>
                     <div data-id="search-suggestion" class="absolute z-40 hidden w-full pt-1 top-full">
                         <ul class="p-2 bg-white border rounded-lg shadow-lg " tabindex="-1">
                         </ul>
                     </div>

                 </div> --}}

                 {{-- Check-out and Cehck-in --}}
                 {{-- @include('pages.search.components.search-filter-section.components.checkout-checking', [
                    'queryCheckIn' => $queryCheckIn,
                    'queryCheckOut' => $queryCheckOut,
                ]) --}}

                 {{-- <div class="lg:col-span-2">
                     <button type="submit" id="hotel-search-btn"
                         class=" w-full h-full text-md flex justify-center items-center whitespace-nowrap gap-x-1 font-medium text-white px-6 py-3 rounded-md bg-[#000000] focus:ring-2 focus:ring-offset-1 focus:ring-[#000000]
                               lg:py-[11px]">Search</button>
                 </div> --}}
             </form>



             <div class="flex items-center gap-1 mt-7 lg:hidden">
                 <h4 class="font-bold">Couple Rating</h4>
                 <span class="text-[11px] font-bold text-[#596372]">( Score is 1 to 5 )</span>
             </div>
             <div @class([
                 'grid grid-cols-1 gap-5 mt-5',
                 'lg:grid-cols-7' => request()->routeIs('search'),
                 'lg:grid-cols-6' => !request()->routeIs('search'),
             ])>
                 {{-- Range Slider Filter --}}
                 <div class="col-span-2">
                     {{-- Romantic scoring --}}
                     @include('pages.search.components.search-filter-section.components.filters.romantic-scoring-filter')
                 </div>
                 <div class="col-span-2">
                     {{-- Intimate scoring --}}
                     @include('pages.search.components.search-filter-section.components.filters.intimate-scoring-filter')
                 </div>
                 <div class="col-span-2">
                     {{-- Luxury scoring --}}
                     @include('pages.search.components.search-filter-section.components.filters.luxury-scoring-filter')
                 </div>
                 @if (request()->routeIs('search'))
                     <div class="col-span-2 lg:col-span-1">
                         @include('pages.search.components.search-filter-section.components.filters.more-filters')
                     </div>
                 @endif
             </div>


             <div class="flex mt-7 lg:hidden">
                 {{-- <button type="button" data-main-id="close-mobile-filter-btn"
                     class=" px-2 py-1 text-xs rounded-md font-medium  text-white bg-[#000000] justify-self-end">Close
                     Filters</button> --}}
                 <button type="button" data-main-id="close-mobile-filter-btn"
                     class="text-[#EA4335]  bg-[#fdeceb] flex w-full justify-center py-3 px-2 rounded-lg gap-2">
                     {{-- <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path d="M6.56006 14.62L4.00006 12.06L6.56006 9.5" stroke="#EA4335" stroke-width="1.5"
                             stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                         <path d="M14.2402 12.06H4.07023" stroke="#EA4335" stroke-width="1.5" stroke-miterlimit="10"
                             stroke-linecap="round" stroke-linejoin="round" />
                         <path d="M12.2402 20C16.6602 20 20.2402 17 20.2402 12C20.2402 7 16.6602 4 12.2402 4"
                             stroke="#EA4335" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                             stroke-linejoin="round" />
                     </svg> --}}


                     <span class="text-sm">Close filters</span>
                 </button>
             </div>

         </div>


     </div>
 </section>
