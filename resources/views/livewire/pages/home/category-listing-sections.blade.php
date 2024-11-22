{{-- <section id="category-filter-hotels-section" data-active-hotel-ids="@json($allHotelIdsOfActiveCategories)" --}}
<section id="category-filter-hotels-section" @class(['max-w-5xl px-3 mx-auto mt-7 lg:px-0'])>
    {{-- Category names --}}
    <div class="relative " data-id="category-list">
        <button type="button" data-id="prev"
            class="absolute left-0 flex items-center justify-center h-full pb-2 w-9 lg:w-12 bg-gradient-to-r from-white to-transparent">
            <div
                class="  w-7 h-7 z-20 border   bg-white rounded-full group-hover:opacity-100 flex justify-center border-gray-400 items-center hover:shadow-lg text-black duration-300 hover:bg-[#000000] hover:border-[#000000] hover:text-white ">
                <i class="text-xs leading-none far fa-chevron-left"></i>
            </div>
        </button>

        <ul class="flex gap-2 pb-2 overflow-x-auto overflow-y-hidden no-scrollbar">
            <li wire:key='categories-list-all'><button type="button" wire:click="handleResetActiveCategories"
                    @class([
                        'block h-[5rem] px-4 border text-sm rounded-lg whitespace-nowrap',
                        '!bg-[#000000] !text-white' => !$activeCategory,
                    ])>All</button></li>
            @foreach ($hotelCategories as $hotelCategory)
                <li wire:key='categories-list-{{ $hotelCategory->slug }}'><button type="button"
                        wire:click="handleSetActiveCategory({{ $hotelCategory->id }})" @class([
                            'block  h-[5rem] px-4 border text-sm rounded-lg whitespace-nowrap',
                            // 'block  px-2 py-[6px] bg-[#F2F2F2] text-sm rounded-lg whitespace-nowrap',
                            '!bg-[#000000] !text-white' => $activeCategory == $hotelCategory->slug,
                            '!bg-white ' => $hotelCategory->svg,
                            // '!py-[17.5px]' => $hotelCategory->svg,
                        ])
                        {{-- class="h-[5rem]" --}}>

                        @if ($hotelCategory->svg)
                            @if ($activeCategory == $hotelCategory->slug)
                                {!! $hotelCategory->svg_active !!}
                            @else
                                {!! $hotelCategory->svg !!}
                            @endif
                        @else
                            {{ $hotelCategory->title }}
                        @endif
                    </button>
                </li>
                {{-- @else
                    <li wire:key='categories-list-{{ $hotelCategory->slug }}'><button type="button"
                            wire:click="handleSetActiveCategory({{ $hotelCategory->id }})"
                            @class([
                                'block px-4 py-[17.5px] bg-[#F2F2F2]  rounded-lg',
                                '!bg-[#000000]' => $activeCategoriesCollection->contains(
                                    $hotelCategory->slug),
                            ])>


                            @if ($activeCategoriesCollection->contains($hotelCategory->slug))
                                <svg width="65" height="17" viewBox="0 0 65 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M61.2398 1.12245C59.1712 0.534443 57.0207 2.14069 57.1565 4.30339C57.1905 4.83403 57.281 6.51199 57.53 8.21863C57.5442 8.32189 57.5611 8.42515 57.5753 8.52841C57.7451 9.60976 57.9601 10.8833 58.5629 11.8212C59.59 13.416 60.6285 11.5401 61.0388 10.4903C61.07 10.41 61.1011 10.3326 61.1266 10.2666C61.8396 8.44236 64.1855 1.96573 61.2398 1.12245Z"
                                        fill="white" />
                                    <path
                                        d="M57.7959 12.5841C56.8168 11.5229 56.4744 9.35156 56.3188 8.35626C56.316 8.33618 56.3131 8.31324 56.3103 8.29316C56.2962 8.2989 56.2848 8.30463 56.2707 8.31037C55.0596 8.80085 54.0239 8.51115 53.1976 7.94609L53.1863 4.01939C53.1835 2.50205 51.9667 1.27729 50.4698 1.28016C48.9729 1.28302 47.7646 2.51639 47.7703 4.03373L47.8014 15.6102C47.8042 17.1275 49.021 18.3523 50.5179 18.3466C52.0148 18.3437 53.2231 17.1103 53.2174 15.593L53.209 12.2744C54.703 13.1263 56.3924 12.9914 57.7959 12.5841Z"
                                        fill="white" />
                                    <path
                                        d="M59.9663 18.404C61.2603 18.404 62.3093 17.3407 62.3093 16.029C62.3093 14.7174 61.2603 13.6541 59.9663 13.6541C58.6723 13.6541 57.6233 14.7174 57.6233 16.029C57.6233 17.3407 58.6723 18.404 59.9663 18.404Z"
                                        fill="white" />
                                    <path
                                        d="M15.4807 11.7783C15.4807 12.8568 15.3165 13.8177 14.9911 14.6609C14.6657 15.5042 14.2073 16.2127 13.6159 16.7864C13.0245 17.36 12.3171 17.796 11.4936 18.0914C10.6702 18.3869 9.75336 18.536 8.74033 18.536C7.7273 18.536 6.81048 18.3783 5.98704 18.0656C5.1636 17.753 4.45617 17.3055 3.86477 16.7233C3.27336 16.141 2.81495 15.4325 2.48954 14.5978C2.16412 13.7632 2 12.8252 2 11.7812C2 10.7543 2.16129 9.82498 2.48954 8.99031C2.81495 8.15563 3.27336 7.44716 3.86477 6.86489C4.45617 6.28263 5.1636 5.83517 5.98704 5.52253C6.81048 5.20988 7.7273 5.05212 8.74033 5.05212C9.75336 5.05212 10.6702 5.21275 11.4936 5.534C12.3171 5.85525 13.0245 6.30844 13.6159 6.89071C14.2073 7.47297 14.6657 8.18144 14.9911 9.01612C15.3165 9.84793 15.4807 10.7715 15.4807 11.7783ZM6.47657 11.7783C6.47657 12.8396 6.67748 13.6513 7.08213 14.2164C7.48395 14.7814 8.04705 15.0654 8.76863 15.0654C9.4902 15.0654 10.042 14.7785 10.4268 14.2049C10.8117 13.6312 11.0069 12.8224 11.0069 11.7783C11.0069 10.7342 10.8088 9.93111 10.4155 9.36605C10.0194 8.801 9.46473 8.5199 8.74316 8.5199C8.02159 8.5199 7.46414 8.80387 7.07081 9.36605C6.67182 9.93111 6.47657 10.7342 6.47657 11.7783Z"
                                        fill="white" />
                                    <path
                                        d="M30.5573 11.7783C30.5573 12.8568 30.3932 13.8177 30.0678 14.6609C29.7424 15.5042 29.284 16.2127 28.6926 16.7864C28.1011 17.36 27.3937 17.796 26.5703 18.0914C25.7468 18.3869 24.83 18.536 23.817 18.536C22.804 18.536 21.8871 18.3783 21.0637 18.0656C20.2403 17.753 19.5328 17.3055 18.9414 16.7233C18.35 16.141 17.8916 15.4325 17.5662 14.5978C17.2408 13.7632 17.0767 12.8252 17.0767 11.7812C17.0767 10.7543 17.238 9.82498 17.5662 8.99031C17.8916 8.15563 18.35 7.44716 18.9414 6.86489C19.5328 6.28263 20.2403 5.83517 21.0637 5.52253C21.8871 5.20988 22.804 5.05212 23.817 5.05212C24.83 5.05212 25.7468 5.21275 26.5703 5.534C27.3937 5.85525 28.1011 6.30844 28.6926 6.89071C29.284 7.47297 29.7424 8.18144 30.0678 9.01612C30.3932 9.84793 30.5573 10.7715 30.5573 11.7783ZM21.5532 11.7783C21.5532 12.8396 21.7541 13.6513 22.1588 14.2164C22.5606 14.7814 23.1237 15.0654 23.8453 15.0654C24.5669 15.0654 25.1186 14.7785 25.5035 14.2049C25.8883 13.6312 26.0836 12.8224 26.0836 11.7783C26.0836 10.7342 25.8855 9.93111 25.4922 9.36605C25.096 8.801 24.5414 8.5199 23.8198 8.5199C23.0982 8.5199 22.5408 8.80387 22.1475 9.36605C21.7485 9.93111 21.5532 10.7342 21.5532 11.7783Z"
                                        fill="white" />
                                    <path
                                        d="M45.6339 11.7783C45.6339 12.8568 45.4697 13.8177 45.1443 14.6609C44.8189 15.5042 44.3605 16.2127 43.7691 16.7864C43.1777 17.36 42.4703 17.796 41.6468 18.0914C40.8234 18.3869 39.9066 18.536 38.8935 18.536C37.8805 18.536 36.9637 18.3783 36.1402 18.0656C35.3168 17.753 34.6094 17.3055 34.018 16.7233C33.4266 16.141 32.9682 15.4325 32.6427 14.5978C32.3173 13.7632 32.1532 12.8252 32.1532 11.7812C32.1532 10.7543 32.3145 9.82498 32.6427 8.99031C32.9682 8.15563 33.4266 7.44716 34.018 6.86489C34.6094 6.28263 35.3168 5.83517 36.1402 5.52253C36.9637 5.20988 37.8805 5.05212 38.8935 5.05212C39.9066 5.05212 40.8234 5.21275 41.6468 5.534C42.4703 5.85525 43.1777 6.30844 43.7691 6.89071C44.3605 7.47297 44.8189 8.18144 45.1443 9.01612C45.4697 9.84793 45.6339 10.7715 45.6339 11.7783ZM36.6298 11.7783C36.6298 12.8396 36.8307 13.6513 37.2353 14.2164C37.6371 14.7814 38.2003 15.0654 38.9218 15.0654C39.6434 15.0654 40.1952 14.7785 40.58 14.2049C40.9649 13.6312 41.1601 12.8224 41.1601 11.7783C41.1601 10.7342 40.962 9.93111 40.5687 9.36605C40.1725 8.801 39.6179 8.5199 38.8964 8.5199C38.1748 8.5199 37.6173 8.80387 37.224 9.36605C36.825 9.93111 36.6298 10.7342 36.6298 11.7783Z"
                                        fill="white" />
                                </svg>
                            @else
                                <svg width="65" height="17" viewBox="0 0 61 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.4807 10.7262C13.4807 11.8047 13.3165 12.7655 12.9911 13.6088C12.6657 14.4521 12.2073 15.1606 11.6159 15.7342C11.0245 16.3079 10.3171 16.7439 9.49362 17.0393C8.67018 17.3347 7.75336 17.4839 6.74033 17.4839C5.7273 17.4839 4.81048 17.3261 3.98704 17.0135C3.1636 16.7008 2.45617 16.2534 1.86477 15.6711C1.27336 15.0889 0.814952 14.3804 0.489537 13.5457C0.164122 12.711 0 11.7731 0 10.729C0 9.70219 0.161292 8.77286 0.489537 7.93818C0.814952 7.10351 1.27336 6.39503 1.86477 5.81277C2.45617 5.2305 3.1636 4.78305 3.98704 4.4704C4.81048 4.15776 5.7273 4 6.74033 4C7.75336 4 8.67018 4.16063 9.49362 4.48188C10.3171 4.80313 11.0245 5.25632 11.6159 5.83858C12.2073 6.42085 12.6657 7.12932 12.9911 7.964C13.3165 8.7958 13.4807 9.7194 13.4807 10.7262ZM4.47657 10.7262C4.47657 11.7874 4.67748 12.5992 5.08213 13.1642C5.48395 13.7293 6.04705 14.0132 6.76863 14.0132C7.4902 14.0132 8.04199 13.7264 8.42683 13.1528C8.81167 12.5791 9.00691 11.7702 9.00691 10.7262C9.00691 9.68211 8.80884 8.87898 8.41551 8.31393C8.01935 7.74887 7.46473 7.46778 6.74316 7.46778C6.02159 7.46778 5.46414 7.75174 5.07081 8.31393C4.67182 8.87898 4.47657 9.68211 4.47657 10.7262Z"
                                        fill="#000000" />
                                    <path
                                        d="M28.4807 10.7262C28.4807 11.8047 28.3165 12.7655 27.9911 13.6088C27.6657 14.4521 27.2073 15.1606 26.6159 15.7342C26.0245 16.3079 25.3171 16.7439 24.4936 17.0393C23.6702 17.3347 22.7534 17.4839 21.7403 17.4839C20.7273 17.4839 19.8105 17.3261 18.987 17.0135C18.1636 16.7008 17.4562 16.2534 16.8648 15.6711C16.2734 15.0889 15.815 14.3804 15.4895 13.5457C15.1641 12.711 15 11.7731 15 10.729C15 9.70219 15.1613 8.77286 15.4895 7.93818C15.815 7.10351 16.2734 6.39503 16.8648 5.81277C17.4562 5.2305 18.1636 4.78305 18.987 4.4704C19.8105 4.15776 20.7273 4 21.7403 4C22.7534 4 23.6702 4.16063 24.4936 4.48188C25.3171 4.80313 26.0245 5.25632 26.6159 5.83858C27.2073 6.42085 27.6657 7.12932 27.9911 7.964C28.3165 8.7958 28.4807 9.7194 28.4807 10.7262ZM19.4766 10.7262C19.4766 11.7874 19.6775 12.5992 20.0821 13.1642C20.4839 13.7293 21.0471 14.0132 21.7686 14.0132C22.4902 14.0132 23.042 13.7264 23.4268 13.1528C23.8117 12.5791 24.0069 11.7702 24.0069 10.7262C24.0069 9.68211 23.8088 8.87898 23.4155 8.31393C23.0194 7.74887 22.4647 7.46778 21.7432 7.46778C21.0216 7.46778 20.4641 7.75174 20.0708 8.31393C19.6718 8.87898 19.4766 9.68211 19.4766 10.7262Z"
                                        fill="#000000" />
                                    <path
                                        d="M43.4807 10.7262C43.4807 11.8047 43.3165 12.7655 42.9911 13.6088C42.6657 14.4521 42.2073 15.1606 41.6159 15.7342C41.0245 16.3079 40.3171 16.7439 39.4936 17.0393C38.6702 17.3347 37.7534 17.4839 36.7403 17.4839C35.7273 17.4839 34.8105 17.3261 33.987 17.0135C33.1636 16.7008 32.4562 16.2534 31.8648 15.6711C31.2734 15.0889 30.815 14.3804 30.4895 13.5457C30.1641 12.711 30 11.7731 30 10.729C30 9.70219 30.1613 8.77286 30.4895 7.93818C30.815 7.10351 31.2734 6.39503 31.8648 5.81277C32.4562 5.2305 33.1636 4.78305 33.987 4.4704C34.8105 4.15776 35.7273 4 36.7403 4C37.7534 4 38.6702 4.16063 39.4936 4.48188C40.3171 4.80313 41.0245 5.25632 41.6159 5.83858C42.2073 6.42085 42.6657 7.12932 42.9911 7.964C43.3165 8.7958 43.4807 9.7194 43.4807 10.7262ZM34.4766 10.7262C34.4766 11.7874 34.6775 12.5992 35.0821 13.1642C35.4839 13.7293 36.0471 14.0132 36.7686 14.0132C37.4902 14.0132 38.042 13.7264 38.4268 13.1528C38.8117 12.5791 39.0069 11.7702 39.0069 10.7262C39.0069 9.68211 38.8088 8.87898 38.4155 8.31393C38.0194 7.74887 37.4647 7.46778 36.7432 7.46778C36.0216 7.46778 35.4641 7.75174 35.0708 8.31393C34.6718 8.87898 34.4766 9.68211 34.4766 10.7262Z"
                                        fill="#000000" />
                                    <path
                                        d="M55.0256 11.304C54.0466 10.2427 53.7042 8.07141 53.5485 7.07611C53.5457 7.05603 53.5429 7.03309 53.54 7.01301C53.5259 7.01874 53.5146 7.02448 53.5004 7.03022C52.2893 7.5207 51.2536 7.231 50.4274 6.66594L50.4161 2.73923C50.4132 1.2219 49.1965 -0.00286328 47.6995 5.02773e-06C46.2026 0.00287333 44.9944 1.23624 45 2.75358L45.0311 14.33C45.034 15.8474 46.2507 17.0721 47.7477 17.0664C49.2446 17.0635 50.4528 15.8302 50.4472 14.3128L50.4387 10.9942C51.9328 11.8461 53.6221 11.7113 55.0256 11.304Z"
                                        fill="#000000" />
                                    <path
                                        d="M59.0894 0.122446C57.0209 -0.465557 54.8703 1.14069 55.0061 3.30339C55.0401 3.83403 55.1306 5.51199 55.3796 7.21863C55.3938 7.32189 55.4108 7.42515 55.4249 7.52841C55.5947 8.60976 55.8097 9.88328 56.4125 10.8212C57.4396 12.416 58.4781 10.5401 58.8885 9.49033C58.9196 9.41001 58.9507 9.33257 58.9762 9.2666C59.6893 7.44236 62.0351 0.965727 59.0894 0.122446Z"
                                        fill="#000000" />
                                    <path
                                        d="M57.343 16.7499C58.637 16.7499 59.686 15.6866 59.686 14.375C59.686 13.0633 58.637 12 57.343 12C56.049 12 55 13.0633 55 14.375C55 15.6866 56.049 16.7499 57.343 16.7499Z"
                                        fill="#000000" />
                                </svg>
                            @endif



                        </button>
                    </li>
                @endif --}}
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


    {{-- Categories --}}
    <div class="mt-3">
        @if (!$activeCategory)
            @foreach ($hotelCategories as $hotelCategory)
                @if ($hotelCategory->hotels->isNotEmpty())
                    @php
                        $hotels = \App\Models\Hotel::with('categories', 'tags', 'services', 'ratings', 'media')
                            ->whereHas('categories', function ($query) use ($hotelCategory) {
                                $query->where('slug', $hotelCategory->slug);
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'from-recent', function ($query) {
                                $query->latest();
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-ratings', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $types = ['romantic', 'intimate', 'luxury'];
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->whereIn('type', $types)
                                        ->orderByDesc('rate')
                                        ->limit(1);

                                    foreach ($types as $type) {
                                        $hotel->orderByRaw("IF(type = '{$type}', 0, 1)");
                                    }
                                });
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'more-clicked', function ($query) {
                                $query->orderByDesc('hotels.view_count');
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-romantic', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->where('type', 'romantic')
                                        ->orderByDesc('rate')
                                        ->limit(1);
                                });
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-intimate', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->where('type', 'intimate')
                                        ->orderByDesc('rate')
                                        ->limit(1);
                                });
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-luxurious', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->where('type', 'luxury')
                                        ->orderByDesc('rate')
                                        ->limit(1);
                                });
                            })
                            ->get();
                        // $hotels = $hotelCategory->hotels;
                        // $hotels = $hotelCategory->hotels->sortByDesc('created_at')->take(5);
                    @endphp
                    <div wire:key="all-category-{{ $hotelCategory->slug }}"
                        id="category-list-{{ $hotelCategory->slug }}" class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-end text-xs text-black ">
                                {{-- @if ($hotelCategory->slug != 'oooh') --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="24" height="24"
                                    viewBox="0 0 24 24" class="pointer-events-none ">
                                    <path
                                        d="M21.5 7H14V3.62a.51.51 0 10-1 0V5h-2V3.62a.57.57 0 00-.5-.62.57.57 0 00-.5.62V7H2.5a.46.46 0 00-.5.43v2.14a.46.46 0 00.5.43H5v10H3.47a.5.5 0 000 1h17.06a.5.5 0 000-1H19V10h2.5a.46.46 0 00.5-.43V7.43a.46.46 0 00-.5-.43zM3 9V8h18v1zm8-3h2v1h-2zm-1 14v-5h4v5zm8 0h-3v-5a1 1 0 00-1-1h-4a1 1 0 00-1 1v5H6V10h12z"
                                        fill="currentColor"></path>
                                </svg> --}}
                                <div class="flex flex-wrap items-center ">
                                    <em
                                        class="inline-flex items-center justify-center w-5 h-5 mr-1 text-black bg-gray-200 rounded-sm">{{ $hotels->count() }}</em>
                                    <span>stays found for</span>
                                    <b class="ml-1">{{ $hotelCategory->title }}</b>
                                </div>
                                {{-- @endif --}}
                            </div>
                            {{-- <a href="{{ route('search', ['categories' => [$hotelCategory->slug]]) }}" --}}
                            <div>
                                {{-- <label for="booking_type" class="block text-sm font-medium text-gray-700">
                                    Selete Booking Type
                                </label> --}}

                                @php
                                    $activeSort = $categorySortingArray[$hotelCategory->slug];
                                @endphp
                                <select
                                    wire:change="handleChangeCategorySorting('{{ $hotelCategory->slug }}',event.target.value)"
                                    {{-- wire:model="categorySortingArray.{{ $hotelCategory->slug }}" --}}
                                    class="text-xs border-gray-300 rounded-md shadow-sm form-select focus:border-[#000000] focus:ring-[#000000] "
                                    autocomplete="off">
                                    <option value="from-recent" @selected($activeSort == 'from-recent')>From recent</option>
                                    <option value="more-clicked" @selected($activeSort == 'more-clicked')>More clicked</option>
                                    <option value="best-ratings" @selected($activeSort == 'best-ratings')>Best ratings</option>
                                    <option value="best-romantic" @selected($activeSort == 'best-romantic')>Best Romantic</option>
                                    <option value="best-intimate" @selected($activeSort == 'best-intimate')>Best Intimate</option>
                                    <option value="best-luxurious" @selected($activeSort == 'best-luxurious')>Best Luxurious</option>
                                </select>


                            </div>
                            {{-- <a href="{{ route('home') }}?categories[0]={{ $hotelCategory->slug }}"
                                class="flex items-center justify-center gap-2 text-[#000000] text-sm ">
                                See all <i class="text-xs far fa-chevron-right"></i>
                            </a> --}}
                        </div>
                        {{-- <div id='hotel-category-swiper-{{ $hotelCategory->slug }}-wrapper' class="relative group"> --}}
                        <swiper-container id='hotel-category-swiper-{{ $hotelCategory->slug }}'
                            data-select='category-sliders' init="false" class="pb-10" {{-- navigation-prev-el='#hotel-category-swiper-{{ $hotelCategory->slug }}-wrapper .swiper-navigation-left'
                                navigation-next-el='#hotel-category-swiper-{{ $hotelCategory->slug }}-wrapper .swiper-navigation-right' --}}>

                            @foreach ($hotels as $hotel)
                                <swiper-slide
                                    wire:key='all-category-{{ $hotelCategory->slug }}-hotel-{{ $hotel->slug }}'
                                    @class([
                                        '!w-[85%]' => $hotelCategory->hotels->count() > 1,
                                        'lg:!w-[30%]',
                                    ]) class="!w-[85%] lg:!w-[30%]">

                                    @include('livewire.pages.home.components.hotel-item', [
                                        'hotel' => $hotel,
                                        'customerFavoriteHotels' => $favoriteHotels,
                                        // 'hideOoohCategoryBadge' => $hotelCategory->slug == 'oooh',
                                    ])
                                </swiper-slide>
                            @endforeach
                        </swiper-container>

                    </div>
                @endif
            @endforeach
        @else
            @foreach ($hotelCategories->where('slug', $activeCategory) as $hotelCategory)
                @if ($hotelCategory->hotels->isNotEmpty())
                    @php
                        $hotels = \App\Models\Hotel::with('categories', 'tags', 'services', 'ratings', 'media')
                            ->whereHas('categories', function ($query) use ($hotelCategory) {
                                $query->where('slug', $hotelCategory->slug);
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'from-recent', function ($query) {
                                $query->latest();
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'more-clicked', function ($query) {
                                $query->orderByDesc('hotels.view_count');
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-ratings', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $types = ['romantic', 'intimate', 'luxury'];
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->whereIn('type', $types)
                                        ->orderByDesc('rate')
                                        ->limit(1);

                                    foreach ($types as $type) {
                                        $hotel->orderByRaw("IF(type = '{$type}', 0, 1)");
                                    }
                                });
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-romantic', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->where('type', 'romantic')
                                        ->orderByDesc('rate')
                                        ->limit(1);
                                });
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-intimate', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->where('type', 'intimate')
                                        ->orderByDesc('rate')
                                        ->limit(1);
                                });
                            })
                            ->when($categorySortingArray[$hotelCategory->slug] == 'best-luxurious', function ($query) {
                                $query->orderByDesc(function ($hotel) {
                                    $hotel
                                        ->select('rate')
                                        ->from('hotel_ratings')
                                        ->whereColumn('hotel_id', 'hotels.id')
                                        ->where('type', 'luxury')
                                        ->orderByDesc('rate')
                                        ->limit(1);
                                });
                            })
                            ->get();
                        // $hotels = $hotelCategory->hotels;
                        // $hotels = $hotelCategory->hotels->sortByDesc('created_at')->take(5);
                    @endphp
                    <div wire:key="category-{{ $hotelCategory->slug }}" id="category-list-{{ $hotelCategory->slug }}"
                        class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-end text-xs text-black ">
                                <div class="flex flex-wrap items-center ">
                                    <em
                                        class="inline-flex items-center justify-center w-5 h-5 mr-1 text-black bg-gray-200 rounded-sm">{{ $hotels->count() }}</em>
                                    <span>stays found for</span>
                                    <b class="ml-1">{{ $hotelCategory->title }}</b>
                                </div>
                            </div>
                            {{-- <a href="{{ route('search', ['categories' => [$hotelCategory->slug]]) }}" --}}
                            <div>
                                {{-- <label for="booking_type" class="block text-sm font-medium text-gray-700">
                                    Selete Booking Type
                                </label> --}}

                                @php
                                    $activeSort = $categorySortingArray[$hotelCategory->slug];
                                @endphp
                                <select
                                    wire:change="handleChangeCategorySorting('{{ $hotelCategory->slug }}',event.target.value)"
                                    {{-- wire:model="categorySortingArray.{{ $hotelCategory->slug }}" --}}
                                    class="text-xs border-gray-300 rounded-md shadow-sm form-select focus:border-[#000000] focus:ring-[#000000] "
                                    autocomplete="off">
                                    <option value="from-recent" @selected($activeSort == 'from-recent')>From recent</option>
                                    <option value="more-clicked" @selected($activeSort == 'more-clicked')>More clicked</option>
                                    <option value="best-ratings" @selected($activeSort == 'best-ratings')>Best ratings</option>
                                    <option value="best-romantic" @selected($activeSort == 'best-romantic')>Best Romantic</option>
                                    <option value="best-intimate" @selected($activeSort == 'best-intimate')>Best Intimate</option>
                                    <option value="best-luxurious" @selected($activeSort == 'best-luxurious')>Best Luxurious</option>
                                </select>


                            </div>
                        </div>


                        <div {{-- id="hotel-listing-section-wrapper"  --}} class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                            @foreach ($hotels as $hotel)
                                @include('livewire.pages.home.components.hotel-item', [
                                    'hotel' => $hotel,
                                    'customerFavoriteHotels' => $favoriteHotels,
                                ])
                            @endforeach
                        </div>


                        {{-- <swiper-container id='hotel-category-swiper-{{ $hotelCategory->slug }}'
                            data-select='category-sliders' init="false">
                            @foreach ($hotels as $hotel)
                                <swiper-slide wire:key='category-{{ $hotelCategory->slug }}-hotel-{{ $hotel->slug }}'
                                    class="!w-[85%] lg:!w-[30%]"> --}}
                        {{-- <a class="relative block w-full h-40 overflow-hidden rounded-lg via-black/0 group">
                                        <img alt="{{ $hotel->thumbnail->name }}"
                                            src={{ $hotel->thumbnail->responsiveImages()->getPlaceholderSvg() }}
                                            data-srcset={{ $hotel->thumbnail->getSrcset() }}
                                            class="object-cover w-full h-full lazyload" />
                                        <div
                                            class="absolute bottom-0 z-10 flex flex-col justify-between w-full px-5 pt-6 pb-3 text-white h-4/6 [background:linear-gradient(180deg,rgba(255,255,255,0.00)0%,#000000_77.08%)]">
                                            <div>
                                            </div>

                                            <div class="flex items-center gap-x-2">
                                                <div class="-space-y-1 overflow-hidden">
                                                    <h3
                                                        class="[text-shadow:0px_1px_5px_rgba(0,0,0,1)] text-sm whitespace-nowrap  w-full overflow-hidden   text-ellipsis">
                                                        {{ $hotel->title }}</h3>
                                                    <p
                                                        class="[text-shadow:0px_1px_5px_rgba(0,0,0,1)] text-sm whitespace-nowrap  w-full overflow-hidden   text-ellipsis">
                                                        {{ $hotel->address }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a> --}}
                        {{-- @include('livewire.pages.home.components.hotel-item', [
                                        'hotel' => $hotel,
                                        'customerFavoriteHotels' => $favoriteHotels,
                                        // 'hideOoohCategoryBadge' => $hotelCategory->slug == 'oooh',
                                    ])
                                </swiper-slide>
                            @endforeach
                        </swiper-container> --}}

                        {{-- @push('popups') --}}
                        {{-- @foreach ($hotels as $hotel) --}}
                        {{-- @include(
                                'livewire.sections.hotels.components.hotel-item.online-booking-links-popup',
                                [
                                    'id' => 'category-' . $hotelCategory->slug . '-hotel-listing-' . $hotel->slug,
                                ]
                            )

                            @include('livewire.sections.hotels.components.hotel-item.gallery-popup', [
                                'id' => 'category-' . $hotelCategory->slug . '-hotel-listing-' . $hotel->slug,
                            ]) --}}
                        {{-- @include(
                                'livewire.sections.hotels.components.hotel-item.dasktop-details-popup',
                                [
                                    'id' => 'category-' . $hotelCategory->slug . '-hotel-listing-' . $hotel->slug,
                                    'hotel' => $hotel,
                                ]
                            ) --}}
                        {{-- @endforeach --}}
                        {{-- @endpush --}}


                    </div>
                @endif
            @endforeach



        @endif

    </div>








</section>
