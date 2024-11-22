@php
    $id = 'hotel-listing-check-in-and-checkout-filters';
@endphp
<div id="{{ $id }}" class="relative lg:col-span-5">
    <div id='date-inputs-wrapper'
        class=" lg:py-2 border-2 divide-y-2 rounded-lg  lg:flex lg:divide-x-2 lg:divide-y-0  [&.opened]:border-[#000000] ">
        <div class="flex items-center px-3 py-2 cursor-pointer lg:py-0 gap-x-3">
            <i class="text-lg text-gray-900 fa-light fa-calendar-days"></i>
            <div class="flex flex-col">
                <span class="text-[11px] text-gray-500">Check in</span>
                <input readonly id='check-in-input' name="check-in" type="text" placeholder="-- / -- / --"
                    value="{{ $queryCheckIn->format('D, d/m/y') }}"
                    class="select-none w-full text-[11px] font-bold focus:border-none focus:outline-none placeholder:text-black">
            </div>
        </div>
        <div class="flex items-center px-3 py-2 cursor-pointer lg:py-0 gap-x-3">
            <i class="text-lg text-gray-900 fa-light fa-calendar-days"></i>
            <div class="flex flex-col">
                <span class="text-[11px] text-gray-500">Check out</span>
                <input readonly id='check-out-input' name="check-out" type="text" placeholder="-- / -- / --"
                    value="{{ $queryCheckOut->format('D, d/m/y') }}"
                    class="select-none w-full text-[11px] font-bold focus:border-none focus:outline-none placeholder:text-black">
            </div>
        </div>
    </div>

    {{-- Calender --}}
    <div id="date-selector-wrapper" class="absolute z-20 hidden w-full h-auto pt-2 top-full lg:w-auto">

        <div class="px-6 py-3 bg-white border-2 rounded-lg lg:shadow-2xl">

            <div class="pb-3 border-b ">
                <div class="flex justify-between">

                    <h4 class="text-[13px] font-semibold lg:text-sm">Select your Check-in <span
                            class="whitespace-nowrap">and Check-out
                            dates</span></h4>
                    <button class="close-dropdown-btn">
                        <i class="text-lg far fa-times"></i>
                    </button>
                </div>
                <p class="text-[10px] text-gray-500">See prices and availability for your dates</p>
            </div>
            <div class="flex justify-start lg:justify-center">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>




@push('footer')
    <script type="module">
        const checkInInput = $('#{{ $id }} #check-in-input')
        const checkOutInput = $('#{{ $id }} #check-out-input')
        const dateInputWrapper = $('#{{ $id }}  #date-inputs-wrapper')
        const dateSelectorWrapper = $('#{{ $id }}  #date-selector-wrapper')


        const searchParams1 = new URLSearchParams(location.search);
        console.log(searchParams1.get('check-in'));

        // _________________(Callbacks)_________________//
        const handleOpenDeopdown = () => {
            dateSelectorWrapper.addClass('opened');
            dateInputWrapper.addClass('opened');
            dateSelectorWrapper.slideDown(200);

        }
        const handleHideDeopdown = () => {
            dateInputWrapper.removeClass('opened');
            dateSelectorWrapper.removeClass('opened');
            dateSelectorWrapper.slideUp(200);
        }

        const calendar = new VanillaCalendar("#{{ $id }} #calendar", {
            type: "multiple",
            settings: {
                range: {
                    disablePast: true,
                },
                selection: {
                    day: "multiple-ranged",
                },
                selected: {
                    dates: ["{{ $queryCheckIn->format('Y-m-d') }}:{{ $queryCheckOut->format('Y-m-d') }}"],
                },
                visibility: {
                    daysOutside: false,
                    weekend: false,
                    theme: 'light',
                },
            },

            actions: {
                clickDay(event, dates) {
                    const sortedDates = dates.sort((a, b) => +new Date(a) - +new Date(b));
                    if (sortedDates.length > 1) {
                        const firstDate = moment(sortedDates[0]);
                        const lastDate = moment(sortedDates[sortedDates.length - 1]);

                        checkInInput.val(firstDate.format('ddd, DD/MM/YY'))
                        checkOutInput.val(lastDate.format('ddd, DD/MM/YY'))
                        handleHideDeopdown();
                    } else if (sortedDates.length == 1) {
                        const firstDate = moment(sortedDates[0]);
                        checkInInput.val(firstDate.format('ddd, DD/MM/YY'))
                        checkOutInput.val('-- / -- / --')
                    } else {
                        checkInInput.val('-- / -- / --')
                        checkOutInput.val('-- / -- / --')
                    }
                },
            },
        });



        // -------------------- Events -------------------- \\

        $(document).on('click', '#{{ $id }}  #date-inputs-wrapper', function(event) {
            // event.stopImmediatePropagation();


            if (dateInputWrapper.hasClass('opened')) {
                handleHideDeopdown()
            } else {
                handleOpenDeopdown();
            }

        });

        $(document).on('click', '#{{ $id }}  .close-dropdown-btn', function(event) {
            // event.stopPropagation();
            handleHideDeopdown()
        });


        $(document).on('click', function(event) {
            const modal = $('#{{ $id }}');

            if (!modal.is(event.target) && !modal.has(event.target).length && !$(event.target).hasClass(
                    'vanilla-calendar-day__btn')) {
                handleHideDeopdown();
            }
        });


        // _________________(Inits)_________________//
        calendar.init();
    </script>
@endpush
