<section class="mt-7">


    {{-- ________________ ( Hotel Listing )___________ --}}
    {{-- <div class="max-w-5xl px-6 mx-auto lg:px-0">
        <livewire:sections.hotels.partials.hotel-listing.index wire:key="{{ str()->uuid() }}">
    </div> --}}


    @if (!$isHotelListingFiltered)
        {{-- Category Filter Hotels  Section --}}
        <livewire:sections.hotels.partials.category-filter-hotels wire:key="{{ str()->uuid() }}" :isHotelListingFiltered="$isHotelListingFiltered" />
    @endif


</section>
