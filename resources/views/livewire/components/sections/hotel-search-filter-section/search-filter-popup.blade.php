<div wire:ignore.self id="search-filter-popup" class="hidden">
    <div wire:ignore.self class="modal__wrapper ">
        <div wire:ignore.self class="modal max-lg:!p-0">
            <div class="modal__close !hidden lg:!flex">&#10005</div>
            <div class="modal__top">

                <div class="input__box search !hidden lg:!flex">
                    <label for="search"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                            height="100" viewBox="0 0 30 30">
                            <path
                                d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                            </path>
                        </svg></label>
                    <input id="search" type="text" class="input" wire:model.debounce.500ms="search"
                        placeholder="{{ __('Search') }}" />
                </div>
                <div wire:ignore
                    class="flex items-center justify-between    !pb-3 mx-auto max-lg:!px-4 max-lg:!pt-4  lg:hidden">

                    <div class="input__box search flex-1 !m-0">
                        <label for="search"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                height="100" viewBox="0 0 30 30">
                                <path
                                    d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                </path>
                            </svg></label>
                        <input id="search" type="text" class="input" wire:model.debounce.500ms="search"
                            placeholder="{{ __('Search') }}" />
                    </div>


                </div>



                <div wire:ignore class="tab__buttons max-lg:!px-4 overflow-x-auto overflow-y-hidden no-scrollbar">
                    {{-- <div class="tab__button "> {{ __('All') }}</div> --}}
                    <div class="tab__button whitespace-nowrap active"> {{ __('Location') }}</div>
                    <div class="tab__button whitespace-nowrap tags"> {{ __('Tags') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('Travelers') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('Stays') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('New') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('Best Rating') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('More Clicked') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('Romantic') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('Intimate') }}</div>
                    <div class="tab__button whitespace-nowrap"> {{ __('Best Google Review') }}</div>

                    @foreach ($categories as $category)
                        <div class="tab__button whitespace-nowrap"> {{ $category->title }}</div>
                    @endforeach
                </div>


            </div>
            <div class="modal__bottom max-lg:!px-4">
                <div class="tab__panels">
                    <div wire:ignore.self class="tab__panel max-lg:!pb-[100px] active">
                        @forelse ($locations as $location)
                            <button wire:key="{{ str()->uuid() }}"
                                wire:click="setLocation('{{ $location->city_country }}')" type="button"
                                class="items-center block w-full tab__panel-item location">
                                <div class="tab__panel-item-image">
                                    <img src="{{ asset('/') }}static/svgs/location.svg" alt="Location Icon" />
                                </div>
                                <div class="text-left tab__panel-item-content">
                                    <span>{{ $location->city_country }}</span>
                                    <span>{{ $location->address }}</span>
                                    {{-- <span>{{ implode(', ', array_slice(explode(',', $location->address), -2)) }}</span> --}}
                                </div>
                            </button>
                        @empty
                            <div class="items-center w-full tab__panel-item location">
                                {{ __('No location found.') }}
                            </div>
                        @endforelse

                    </div>
                    <div wire:ignore.self class="tab__panel max-lg:!pb-[100px]">
                        @forelse ($tags as $tag)
                            <button wire:key="{{ str()->uuid() }}" wire:click="setTag('{{ $tag->slug }}')"
                                type="button" class="items-center w-full tab__panel-item tag">
                                <div class="tab__panel-item-image">
                                    <span>#</span>
                                </div>
                                <div class="text-left tab__panel-item-content">
                                    <span>{{ $tag->title }}</span>
                                    <span>{{ $tag->parent_hotel_count }} {{ __('stays') }}</span>
                                </div>
                            </button>
                        @empty
                            <div class="items-center w-full tab__panel-item tag">
                                {{ __('No tags found.') }}
                            </div>
                        @endforelse

                    </div>
                    <div wire:ignore.self class="tab__panel max-lg:!pb-[100px]">
                        @forelse ($uploadedUsers as $uploadedUser)
                            <button wire:key="{{ str()->uuid() }}"
                                wire:click="setUploadedUser('{{ $uploadedUser->id }}')" type="button"
                                class="items-center w-full tab__panel-item user">
                                <div class="tab__panel-item-image">
                                    <img src="{{ $uploadedUser->avatar->getUrl() }}" alt="User Image" />
                                </div>
                                <div class="text-left tab__panel-item-content">
                                    <span>{{ $uploadedUser->username }}</span>
                                    <span>{{ $uploadedUser->parent_hotel_count }}
                                        {{ __('stays uploaded') }}</span>
                                </div>
                            </button>
                        @empty
                            <div class="items-center w-full tab__panel-item user">
                                {{ __('No travelers found.') }}
                            </div>
                        @endforelse
                    </div>
                    <div wire:ignore.self class="tab__panel max-lg:!pb-[100px]">
                        @forelse ($stays as $stay)
                            <button wire:key="{{ str()->uuid() }}" wire:click="setStay('{{ $stay->id }}')"
                                type="button" class="items-center w-full tab__panel-item stay">
                                <div class="tab__panel-item-image">
                                    <img src="{{ asset('/') }}static/images/bed.png" alt="Hotel Icon" />
                                </div>
                                <div class="text-left tab__panel-item-content">
                                    <span class="line-clamp-1">{{ $stay->title }}</span>



                                    <span class="flex items-start ">
                                        @if ($stay->ratings_count)
                                            @php
                                                $ratingsCollection = collect(['romantic' => $stay->romantic_avg, 'intimate' => $stay->intimate_avg, 'luxurious' => $stay->luxury_avg]);
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
                                                    $highestRatingName = $hotel->parentHotel->ratings->sortByDesc('created_at')->first()?->type;
                                                }

                                            @endphp
                                            {{ number_format($stay->average_rating, 1) }}/10 ·
                                            {{ ucfirst($highestRatingName) }}
                                        @else
                                            {{ __('New') }}
                                        @endif ·


                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 34 34" fill="none">
                                                <circle cx="17" cy="17" r="17" fill="white">
                                                </circle>
                                                <path
                                                    d="M26.2724 17.4046C26.2724 16.7337 26.2122 16.0886 26.1004 15.4692H17.189V19.1336H22.2812C22.0575 20.312 21.3866 21.3098 20.3802 21.9807V24.3634H23.451C25.2402 22.7119 26.2724 20.2862 26.2724 17.4046Z"
                                                    fill="#4285F4"></path>
                                                <path
                                                    d="M17.1896 26.6511C19.7443 26.6511 21.8861 25.8082 23.4516 24.3631L20.3808 21.9804C19.5378 22.5481 18.4626 22.8922 17.1896 22.8922C14.7295 22.8922 12.6393 21.2321 11.8909 18.9956H8.74268V21.4385C10.2996 24.5265 13.4908 26.6511 17.1896 26.6511Z"
                                                    fill="#34A853"></path>
                                                <path
                                                    d="M11.8903 18.9867C11.7011 18.4189 11.5892 17.8168 11.5892 17.1889C11.5892 16.561 11.7011 15.9588 11.8903 15.3911V12.9482H8.74206C8.09693 14.2213 7.72705 15.6578 7.72705 17.1889C7.72705 18.72 8.09693 20.1565 8.74206 21.4296L11.1935 19.52L11.8903 18.9867Z"
                                                    fill="#FBBC05"></path>
                                                <path
                                                    d="M17.1896 11.4946C18.5831 11.4946 19.8217 11.9763 20.8109 12.9053L23.5205 10.1957C21.8775 8.66464 19.7443 7.72705 17.1896 7.72705C13.4908 7.72705 10.2996 9.85168 8.74268 12.9483L11.8909 15.3912C12.6393 13.1547 14.7295 11.4946 17.1896 11.4946Z"
                                                    fill="#EA4335"></path>
                                            </svg>


                                            <span class="leading-none text-[#8a8a8a] font-normal">
                                                {{ number_format($stay->google_rating, 1) }} </span>
                                            <span
                                                class="leading-none -mt-[2px] text-[16px] !ml-[3px] text-[#8a8a8a] font-normal">★</span>

                                        </span>


                                    </span>
                                </div>
                            </button>
                        @empty
                            <div class="items-center w-full tab__panel-item user">
                                {{ __('No stays found') }}.
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
