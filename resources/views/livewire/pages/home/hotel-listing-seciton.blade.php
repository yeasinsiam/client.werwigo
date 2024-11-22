<section wire:init="initFromWire" id="hotel-listing-section" class="  mx-auto  lg:max-w-[86rem] lg:px-0">
    @php
        $hasMorePages = $hotels->hasMorePages();
        $hotels = collect($hotels->items());

        if (!function_exists('getHeightRatingName')) {
            function getHeightRatingName($hotel)
            {
                $ratingsCollection = collect(['romantic' => $hotel->parentHotel->romantic_avg, 'intimate' => $hotel->parentHotel->intimate_avg, 'luxury' => $hotel->parentHotel->luxury_avg]);
                $allSameRating = $ratingsCollection->every(function ($value) use ($ratingsCollection) {
                    return $value === $ratingsCollection->first();
                });
                if (!$allSameRating) {
                    $highestRating = $ratingsCollection->max();
                    $highestRatingName = $ratingsCollection
                        ->keys()
                        ->filter(function ($key) use ($ratingsCollection, $highestRating) {
                            return $ratingsCollection[$key] === $highestRating;
                        })
                        ->first();
                } else {
                    $highestRatingName = $hotel->parentHotel->ratings->sortByDesc('created_at')->first()->type;
                }

                return $highestRatingName;
            }
        }

        // switch ($activeSort) {
        //     case 'first-romantic':
        //         $hotels = $hotels->sortByDesc('created_at')->sortBy(function ($hotel) {
        //             if ($hotel->parentHotel->romantic_avg && $hotel->parentHotel->romantic_avg >= $hotel->parentHotel->intimate_avg && $hotel->parentHotel->romantic_avg >= $hotel->parentHotel->luxury_avg) {
        //                 //
        //                 if ($hotel->parentHotel->romantic_avg == $hotel->parentHotel->intimate_avg && $hotel->parentHotel->romantic_avg == $hotel->parentHotel->luxury_avg) {
        //                     $heightHotelRatingName = getHeightRatingName($hotel);

        //                     if ($heightHotelRatingName == 'romantic') {
        //                         return 0;
        //                     } else {
        //                         return 1;
        //                     }
        //                 } else {
        //                     return 0;
        //                 }
        //                 //
        //             } else {
        //                 return 1;
        //             }
        //         });

        //         break;
        //     case 'first-intimate':
        //         $hotels = $hotels->sortByDesc('created_at')->sortBy(function ($hotel) {
        //             if ($hotel->parentHotel->intimate_avg && $hotel->parentHotel->intimate_avg >= $hotel->parentHotel->romantic_avg && $hotel->parentHotel->intimate_avg >= $hotel->parentHotel->luxury_avg) {
        //                 //
        //                 if ($hotel->parentHotel->intimate_avg == $hotel->parentHotel->luxury_avg && $hotel->parentHotel->intimate_avg == $hotel->parentHotel->romantic_avg) {
        //                     $heightHotelRatingName = getHeightRatingName($hotel);

        //                     if ($heightHotelRatingName == 'intimate') {
        //                         return 0;
        //                     } else {
        //                         return 1;
        //                     }
        //                 } else {
        //                     return 0;
        //                 }
        //                 //
        //             } else {
        //                 return 1;
        //             }
        //         });

        //         break;
        //     case 'first-luxurious':
        //         $hotels = $hotels->sortByDesc('created_at')->sortBy(function ($hotel) {
        //             if ($hotel->parentHotel->luxury_avg && $hotel->parentHotel->luxury_avg >= $hotel->parentHotel->intimate_avg && $hotel->parentHotel->luxury_avg >= $hotel->parentHotel->romantic_avg) {
        //                 //
        //                 if ($hotel->parentHotel->luxury_avg == $hotel->parentHotel->intimate_avg && $hotel->parentHotel->luxury_avg == $hotel->parentHotel->romantic_avg) {
        //                     $heightHotelRatingName = getHeightRatingName($hotel);

        //                     if ($heightHotelRatingName == 'luxury') {
        //                         return 0;
        //                     } else {
        //                         return 1;
        //                     }
        //                 } else {
        //                     return 0;
        //                 }
        //                 //
        //             } else {
        //                 return 1;
        //             }
        //         });

        //         break;
        //     case 'best-rating':
        //         $hotels = $hotels->sortByDesc('created_at')->sortByDesc(function ($hotel) {
        //             return $hotel->parentHotel->average_rating;
        //         });

        //         break;
        //     case 'new-added':
        //         $hotels = $hotels->sortByDesc('created_at')->sortBy(function ($hotel) {
        //             return $hotel->parentHotel->ratings_count;
        //         });

        //         break;
        // }

        // Best Google Review
        // if ($bestGoogleRaring) {
        //     $hotels = $hotels->sortByDesc('parentHotel.google_rating');
        //     // dd($hotels->sortByDesc('parentHotel.google_rating'));
        // }

    @endphp
    <div id="hotel-listing-section-wrapper" class="grid grid-cols-1 gap-3 lg:gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($hotels as $hotel)
            @include('livewire.pages.home.components.hotel-item', [
                'hotel' => $hotel,
                'customerFavoriteHotels' => $favoriteHotels,
            ])
        @endforeach
    </div>
    @if ($hasMorePages)
        <div id="hotel-listing-section-load-more"></div>
    @endif
</section>
