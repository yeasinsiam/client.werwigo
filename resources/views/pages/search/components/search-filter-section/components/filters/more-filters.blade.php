@php
    
    $hotelServices = \App\Models\HotelService::get();
    $hotelCategories = \App\Models\HotelCategory::get();
    $hotelTags = \App\Models\HotelTag::get();
@endphp

<div id="hotel-listing-more-filter" class="relative group">
    <div data-id="label" class="hidden lg:flex flex-col cursor-pointer ">
        <span class="block mb-1 text-sm font-medium">More Filters</span>
        <div class="relative">
            <span data-id="selection"
                class="block px-3 py-[5px] text-[13px] text-gray-800 border-2 rounded-3xl  group-[&.opened]:border-[#000000]"><span
                    class=" w-5 h-5 hidden group-[&.selected]:inline-flex justify-center items-center bg-red-200 rounded-full text-xs font-semibold text-[#000000]"></span>
                Select</span>

            <i
                class="hidden fal fa-angle-up  group-[&.opened]:block absolute text-base fa-regular  top-2/4 right-3 [transform:translateY(-45%)] text-gray-500 font-bold"></i>
            <i
                class=" fal fa-angle-down  group-[&.opened]:hidden absolute text-base fa-regular  top-2/4 right-3 [transform:translateY(-45%)] text-gray-500 font-bold"></i>
        </div>
    </div>


    <div data-id="dropdown"
        class="w-full h-auto  lg:absolute lg:hidden lg:right-0 lg:z-20  lg:pt-1 lg:top-full lg:w-auto">
        <div class="lg:px-5 lg:pt-3 lg:pb-2 bg-white lg:border-2 lg:rounded-lg lg:shadow-2xl lg:min-w-[400px]">
            <div data-id="booking-type-filter" class="mt-3 lg:mt-0">
                <h4 class="mb-1 text-base font-semibold lg:text-sm">Booking Type</h4>
                <div class="flex flex-col gap-2 pt-3 lg:border-t lg:gap-5 lg:flex-row">
                    <ul class="flex w-full flex-wrap gap-2">


                        <li>
                            <label class="">
                                <input type="checkbox" name="booking_type[]" value="all" class="hidden peer" />
                                <span
                                    class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">All
                                </span>
                            </label>
                        </li>

                        <li>
                            <label class="">
                                <input type="checkbox" name="booking_type[]" value="direct" class="hidden peer" />
                                <span
                                    class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">Direct
                                    Booking</span>
                            </label>
                        </li>

                        <li>
                            <label class="">
                                <input type="checkbox" name="booking_type[]" value="request" class="hidden peer" />
                                <span
                                    class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">Booking
                                    Request</span>
                            </label>
                        </li>

                        <li>
                            <label class="">
                                <input type="checkbox" name="booking_type[]" value="online" class="hidden peer" />
                                <span
                                    class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">Online
                                    Booking</span>
                            </label>
                        </li>




                    </ul>


                </div>

            </div>
            <div data-id="categories-filter" class="mt-5">
                <h4 class="mb-1 text-base font-semibold lg:text-sm">Categories</h4>
                <div class="flex flex-col gap-2 pt-3 border-t lg:gap-5 lg:flex-row">
                    <ul class="flex w-full flex-wrap gap-2">



                        <li>
                            <label class="">
                                <input type="checkbox" name="categories[]" value="all" class="hidden peer" />
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
                                    <input type="checkbox" name="categories[]" value="{{ $hotelCategory->slug }}"
                                        class="hidden peer" />
                                    <span
                                        class="block
                                text-xs bg-[#F2F2F2] text-black p-2 rounded-lg font-normal peer-checked:bg-[#000000] peer-checked:text-white peer-checked:font-medium
                                whitespace-nowrap cursor-pointer">{{ $hotelCategory->title }}</span>
                                </label>
                            </li>
                        @endforeach





                    </ul>


                </div>

            </div>
            <div data-id="tags-filter" class="mt-5">
                <h4 class="mb-1 text-base font-semibold lg:text-sm">Tags</h4>
                <div class="flex flex-col gap-2 pt-3 border-t lg:gap-5 lg:flex-row">
                    <ul class="flex w-full flex-wrap gap-2">


                        @foreach ($hotelTags as $tag)
                            <li>
                                <label class="">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->slug }}"
                                        class="hidden peer" />
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
            <div data-id="amenities-filter" class="mt-5">
                <h4 class="mb-1 text-base font-semibold lg:text-sm">Booking Type</h4>
                <div class="flex flex-col gap-2 pt-3 border-t lg:gap-5 lg:flex-row">
                    <ul class="grid justify-between w-full grid-cols-2 gap-y-2">

                        @foreach ($hotelServices as $service)
                            <li>
                                <label
                                    class="text-xs text-black
                            relative flex  items-center gap-x-2 cursor-pointer">
                                    <input type="checkbox" name="amenities[]" value="{{ $service->slug }}"
                                        class="absolute opacity-0 peer" />
                                    <span
                                        class="w-[15px] h-[15px] rounded-sm border border-[#121212] block peer-checked:border-[#000000] peer-checked:bg-[#000000]"></span>
                                    {{ $service->title }}
                                </label>
                            </li>
                        @endforeach

                    </ul>


                </div>

            </div>

            <div class="mt-3 hidden lg:flex  items-center justify-between ">
                <button data-id="reset-btn"
                    class="text-[11px] text-gray-500 cursor-pointe hover:underline">Reset</button>
                <button data-id="apply-btn"
                    class="px-5 py-2 text-[13px] bg-[#000000] text-white rounded-lg focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]">Apply</button>
            </div>
        </div>
    </div>

</div>
{{-- @push('footer')
    <script>
        function init() {
            const wrapperEl = $('#{{ $id }}')
            const dropdownEl = $('#{{ $id }}  [data-id="dropdown"]')
            // const resetEl = $('#{{ $id }}  [data-id="reset-btn"]')
            const selectionEl = $('#{{ $id }}  [data-id="selection"]')

            // _________________(Callbacks)_________________//
            const handleOpenDeopdown = () => {
                wrapperEl.addClass('opened');
                dropdownEl.fadeIn(200);

            }
            const handleHideDeopdown = () => {
                wrapperEl.removeClass('opened');
                dropdownEl.fadeOut(200);
            }

            const handleToggleDropdown = () => {
                if (wrapperEl.hasClass('opened')) {
                    handleHideDeopdown()
                } else {
                    handleOpenDeopdown();
                }
            }

            const handleResetAllValues = () => {
                wrapperEl.find('[data-id="amenities-filter"] input[type="checkbox"]').prop('checked', false);
                // wrapperEl.removeClass('selected');
            }

            const handleApply = () => {
                const allAmenitiesCheckedCheckbox = wrapperEl.find(
                    '[data-id="amenities-filter"] input[type="checkbox"]:checked');
                if (allAmenitiesCheckedCheckbox.length) {
                    selectionEl.find('span').text(allAmenitiesCheckedCheckbox.length);
                    wrapperEl.addClass('selected');


                } else {
                    wrapperEl.removeClass('selected');
                    // handleResetAllValues();
                }

                if (typeof livewire !== 'undefined') {
                    livewire.emit('filter-hotel-more', {
                        for: 'amenities',
                        values: allAmenitiesCheckedCheckbox.map(function() {
                            return $(this).val();
                        }, []).get()
                    })
                }
                handleHideDeopdown();
            }

            const setDefaultSelected = () => {

                const searchParams = new URLSearchParams(location.search);
                const amenities = Array.from(searchParams.keys()).filter(key => key.startsWith('amenities[')).map(key =>
                    searchParams.get(key));

                if (amenities.length) {

                    wrapperEl.find('[data-id="amenities-filter"] input[type="checkbox"]').each((index, el) => {
                        if (amenities.includes($(el).val())) {
                            $(el).prop('checked', true);
                        }
                    })

                    selectionEl.find('span').text(amenities.length);
                    wrapperEl.addClass('selected');
                }

                handleHideDeopdown();

            }




            // -------------------- Actions -------------------- \\
            setDefaultSelected();
            // -------------------- Events -------------------- \\

            // $(document).on('mouseenter', '#{{ $id }}', function(event) {
            //     event.stopPropagation();
            //     handleOpenDeopdown();
            // });
            // $(document).on('mouseleave', '#{{ $id }}', function(event) {
            //     event.stopPropagation();
            //     handleHideDeopdown();
            // });

            $('#{{ $id }}  [data-id="label"]').on('click', function(event) {
                // event.stopPropagation();
                handleToggleDropdown();
            });


            $('body').on('click', function(event) {
                const modal = $('#{{ $id }}');

                if (!modal.is(event.target) && !modal.has(event.target).length) {
                    handleHideDeopdown();
                    setDefaultSelected();
                }
            });


            $('#{{ $id }} [data-id="reset-btn"]').on('click', function(event) {
                // event.stopPropagation();
                handleResetAllValues();
            });


            $('#{{ $id }} [data-id="apply-btn"]').on('click', function(event) {
                // event.stopPropagation();
                handleApply();
            });


            window.addEventListener('hotel-listing-filter-reseted', event => {
                console.log('from reseted event')
                wrapperEl.removeClass('selected');
                handleResetAllValues();
            })

        }
        $(document).ready(init)
        // document.addEventListener('livewire:update', init)
    </script>
@endpush --}}
