@php
    $activeHotelSlug = $hotel;
@endphp
{{-- <div id="hotel-listing" wire:init='triggerIsFilterEvents'> --}}
<div id="hotel-listing">
    <div id="hotel-listing-wrapper" class="grid grid-cols-1 gap-5 lg:grid-cols-3"
        data-hotel-ids="@json($hotelIds)">
        @foreach ($hotels as $hotel)
            @include('livewire.sections.hotels.components.hotel-item.index', [
                'id' => 'hotel-listing-' . $hotel->id,
                'hotel' => $hotel,
                'activeHotelSlug' => $activeHotelSlug,
            ])
        @endforeach
    </div>
    @foreach ($hotels as $hotel)
        @include('livewire.sections.hotels.components.hotel-item.online-booking-links-popup', [
            'id' => 'hotel-listing-' . $hotel->id,
            'hotel' => $hotel,
        ])

        @include('livewire.sections.hotels.components.hotel-item.gallery-popup', [
            'id' => 'hotel-listing-' . $hotel->id,
            'hotel' => $hotel,
        ])
        @include('livewire.sections.hotels.components.hotel-item.dasktop-details-popup', [
            'id' => 'hotel-listing-' . $hotel->id,
            'hotel' => $hotel,
        ])
    @endforeach
</div>
