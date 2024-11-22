<div @class([$wrapperClass])>


    @if (auth('admin')->check())
        @if ($isFavorite)
            <button type="button" data-select="my-account-navigation" data-authenticated="{{ auth('admin')->check() }}"
                class="flex items-center justify-center gap-2 px-3 py-1 text-xs text-white transition bg-black border border-black shadow group/hotel-fav-icon rounded-3xl"
                onclick="event.stopPropagation();event.preventDefault();event.stopImmediatePropagation();@this.emitSelf('toggle-Favorite')">

                {{-- <i class="fal fa-minus"></i> --}}
                <svg width="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                        d="M15.0945 4.05114C13.0515 3.64962 10.9485 3.64962 8.90552 4.05114C7.06522 4.41282 5.75 6.00581 5.75 7.84496V19.2674C5.75 20.0112 6.5789 20.5045 7.25848 20.1112L10.4454 18.2668C11.406 17.7109 12.594 17.7109 13.5546 18.2668L16.7415 20.1112C17.4211 20.5045 18.25 20.0112 18.25 19.2674V7.84496C18.25 6.00581 16.9348 4.41282 15.0945 4.05114ZM8.61625 2.5793C10.8502 2.14024 13.1498 2.14023 15.3837 2.5793C17.9159 3.07695 19.75 5.27714 19.75 7.84496V19.2674C19.75 21.1964 17.6438 22.3665 15.9902 21.4095L12.8032 19.565C12.3075 19.2781 11.6925 19.2781 11.1968 19.565L8.00984 21.4095C6.35615 22.3665 4.25 21.1964 4.25 19.2674V7.84496C4.25 5.27714 6.08412 3.07695 8.61625 2.5793Z"
                        class="fill-white " fill-rule="evenodd"></path>
                </svg>
                {{ __('remove from save') }}

            </button>
        @else
            <button type="button" data-select="my-account-navigation" data-authenticated="{{ auth('admin')->check() }}"
                class="flex group/hotel-fav-icon  items-center shadow justify-center gap-2 px-3 py-1  text-xs border border-[#E5E5E5] rounded-3xl hover:border-black hover:bg-black hover:text-white transition"
                onclick="event.stopPropagation();event.preventDefault();event.stopImmediatePropagation();@this.emitSelf('toggle-Favorite')">

                {{-- <i class="fal fa-plus"></i> --}}
                <svg width="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                        d="M15.0945 4.05114C13.0515 3.64962 10.9485 3.64962 8.90552 4.05114C7.06522 4.41282 5.75 6.00581 5.75 7.84496V19.2674C5.75 20.0112 6.5789 20.5045 7.25848 20.1112L10.4454 18.2668C11.406 17.7109 12.594 17.7109 13.5546 18.2668L16.7415 20.1112C17.4211 20.5045 18.25 20.0112 18.25 19.2674V7.84496C18.25 6.00581 16.9348 4.41282 15.0945 4.05114ZM8.61625 2.5793C10.8502 2.14024 13.1498 2.14023 15.3837 2.5793C17.9159 3.07695 19.75 5.27714 19.75 7.84496V19.2674C19.75 21.1964 17.6438 22.3665 15.9902 21.4095L12.8032 19.565C12.3075 19.2781 11.6925 19.2781 11.1968 19.565L8.00984 21.4095C6.35615 22.3665 4.25 21.1964 4.25 19.2674V7.84496C4.25 5.27714 6.08412 3.07695 8.61625 2.5793Z"
                        class="fill-black group-hover/hotel-fav-icon:fill-white" fill-rule="evenodd"></path>
                </svg>
                {{ __('add to save') }}

            </button>
            {{-- <svg  --}}
        @endif
    @else
        <button type="button" data-select="my-account-navigation" data-authenticated="{{ auth('admin')->check() }}"
            class="flex group/hotel-fav-icon items-center shadow justify-center gap-2 px-3 py-1  text-xs border border-[#E5E5E5] rounded-3xl hover:border-black hover:bg-black hover:text-white transition">

            {{-- <i class="fal fa-plus"></i> --}}
            <svg width="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M15.0945 4.05114C13.0515 3.64962 10.9485 3.64962 8.90552 4.05114C7.06522 4.41282 5.75 6.00581 5.75 7.84496V19.2674C5.75 20.0112 6.5789 20.5045 7.25848 20.1112L10.4454 18.2668C11.406 17.7109 12.594 17.7109 13.5546 18.2668L16.7415 20.1112C17.4211 20.5045 18.25 20.0112 18.25 19.2674V7.84496C18.25 6.00581 16.9348 4.41282 15.0945 4.05114ZM8.61625 2.5793C10.8502 2.14024 13.1498 2.14023 15.3837 2.5793C17.9159 3.07695 19.75 5.27714 19.75 7.84496V19.2674C19.75 21.1964 17.6438 22.3665 15.9902 21.4095L12.8032 19.565C12.3075 19.2781 11.6925 19.2781 11.1968 19.565L8.00984 21.4095C6.35615 22.3665 4.25 21.1964 4.25 19.2674V7.84496C4.25 5.27714 6.08412 3.07695 8.61625 2.5793Z"
                    class="fill-black group-hover/hotel-fav-icon:fill-white" fill-rule="evenodd"></path>
            </svg>
            {{ __('add to save') }}

        </button>
    @endif
</div>
{{-- <div @class([$wrapperClass])>


    @if (auth('admin')->check())
        @if ($isFavorite)
            <button type="button" class="flex items-center justify-center "
                onclick="event.stopPropagation();event.preventDefault();event.stopImmediatePropagation();@this.emitSelf('toggle-Favorite')">

                <svg width="23" height="20" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.81956 13.8122C8.57078 13.9 8.16102 13.9 7.91224 13.8122C5.79029 13.0878 1.04883 10.0658 1.04883 4.94388C1.04883 2.68291 2.87078 0.853638 5.11712 0.853638C6.44883 0.853638 7.62688 1.49754 8.3659 2.49266C9.10493 1.49754 10.2903 0.853638 11.6147 0.853638C13.861 0.853638 15.683 2.68291 15.683 4.94388C15.683 10.0658 10.9415 13.0878 8.81956 13.8122Z"
                        fill="#000000" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        @else
            <button type="button" class="flex items-center justify-center "
                onclick="event.stopPropagation();event.preventDefault();event.stopImmediatePropagation();@this.emitSelf('toggle-Favorite')">

                <svg width="23" height="20" viewBox="0 0 17 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.81956 13.8122C8.57078 13.9 8.16102 13.9 7.91224 13.8122C5.79029 13.0878 1.04883 10.0658 1.04883 4.94388C1.04883 2.68291 2.87078 0.853638 5.11712 0.853638C6.44883 0.853638 7.62688 1.49754 8.3659 2.49266C9.10493 1.49754 10.2903 0.853638 11.6147 0.853638C13.861 0.853638 15.683 2.68291 15.683 4.94388C15.683 10.0658 10.9415 13.0878 8.81956 13.8122Z"
                        stroke="#74737A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </button>
        @endif
    @else
        <button type="button" data-select="my-account-navigation" data-authenticated="{{ auth('admin')->check() }}"
            class="flex items-center justify-center ">

            <svg width="23" height="20" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.81956 13.8122C8.57078 13.9 8.16102 13.9 7.91224 13.8122C5.79029 13.0878 1.04883 10.0658 1.04883 4.94388C1.04883 2.68291 2.87078 0.853638 5.11712 0.853638C6.44883 0.853638 7.62688 1.49754 8.3659 2.49266C9.10493 1.49754 10.2903 0.853638 11.6147 0.853638C13.861 0.853638 15.683 2.68291 15.683 4.94388C15.683 10.0658 10.9415 13.0878 8.81956 13.8122Z"
                    stroke="#74737A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

        </button>
    @endif
</div> --}}
