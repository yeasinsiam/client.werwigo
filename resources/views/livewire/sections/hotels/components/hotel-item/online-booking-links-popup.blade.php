@php
    $id = $id . '-online-booking-popup';
@endphp

@if ($hotel->booking_type == 'online' && $hotel->online_booking_links->count() > 1)
    {{-- Popup online booking links --}}
    <div wire:ignore id="{{ $id }}"
        class="hidden  w-screen h-screen bg-black/30 fixed inset-0 z-[999] !p-0 !m-0">

        <div class="flex items-center justify-center w-full h-full">
            <div class="px-5 w-96 lg:px-0">
                <div class="relative p-5 bg-[#f8f8f8] rounded-lg">

                    <button data-id="close-booking-online-popup"
                        class="  absolute -right-3 -top-3 w-[30px] h-[30px] border border-white bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>
                    <h3 class="text-lg font-semibold text-center">Check now on</h3>
                    <div class="mt-5 space-y-2">
                        @foreach ($hotel->online_booking_links as $link)
                            @php
                                $host = str_replace('www.', '', parse_url($link)['host']);
                            @endphp
                            <a href="{{ $link }}" target="_blank"
                                class="flex justify-between gap-1 p-4 bg-white rounded-lg ">
                                <div class="flex items-center gap-2">
                                    <img class=" w-7 h-7"
                                        src="{{ 'https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=' . $link . '&size=28' }}"
                                        alt="{{ $host }}">
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
