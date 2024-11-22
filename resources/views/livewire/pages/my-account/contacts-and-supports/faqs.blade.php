<div id="faq-section" class="tw-px-3 tw-pt-5 lg:tw-px-0">
    <div class="tw-px-3 tw-py-3 tw-pt-5 tw-rounded-lg lg:tw-border">
        <div class="tw-flex tw-flex-col tw-gap-4 lg:tw-flex-row lg:tw-items-center">
            <h4 class="tw-font-semibold "> {{ __('Search for help') }} </h4>
            <form action="" class="tw-flex-1">
                <label class="tw-relative" style="display: block">
                    <svg class="tw-absolute tw-top-2/4 tw-left-2 [transform:translateY(-50%)]" width="15"
                        height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                            stroke="#1C1E22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22 22L20 20" stroke="#1C1E22" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <input type="text" wire:model.debounce.500ms="search"
                        class="tw-px-7 tw-w-full tw-py-2 tw-text-sm tw-rounded-lg tw-text-[#5B5B5B]  tw-bg-[#F7F7F7]  tw-border tw-border-transparent focus:tw-outline-none  focus:tw-border-[#000000]"
                        placeholder=" {{ __('Search question') }} " />
                </label>
            </form>
        </div>
        <div class="tw-space-y-2 tw-mt-7">

            @foreach ($faqs as $faq)
                <div wire:key='faq-item-{{ str()->uuid() }}' data-id="single-faq" aria-expanded="false"
                    class="tw-p-3 tw-group aria-expanded:tw-bg-[#f9fafb] aria-expanded:tw-rounded-sm">
                    <button type="button" data-id="toggle-faq-btn"
                        class="gap-2 tw-flex tw-items-center tw-justify-between tw-w-full tw-pb-3 tw-border-b group-aria-expanded:tw-border-none">
                        <h5 class="tw-text-sm" style="text-align: left;">{{ $faq->question }}</h5>
                        <i class="tw-text-xs fa fa-plus group-aria-expanded:tw-hidden tw-text-[#6B7280]"></i>
                        <i class="tw-text-xs fa fa-minus tw-hidden group-aria-expanded:tw-block text-[#6B7280]"></i>
                    </button>
                    <div data-id="single-faq-details" class="tw-hidden">
                        <p class="tw-text-[#6B7280] tw-text-xs tw-font-medium">{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

{{-- <div id="faq-section" class="px-3 pt-5 lg:px-0">
    <div class="px-3 py-3 pt-5 rounded-lg lg:border">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center">
            <h4 class="font-semibold "> {{ __('Search for help') }} </h4>
            <form action="" class="flex-1">
                <label class="relative">
                    <svg class="absolute top-2/4 left-2 [transform:translateY(-50%)]" width="15" height="15"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                            stroke="#1C1E22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22 22L20 20" stroke="#1C1E22" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <input type="text" wire:model.debounce.500ms="search"
                        class="px-7 w-full py-2 text-sm rounded-lg text-[#5B5B5B]  bg-[#F7F7F7]  border border-transparent focus:outline-none  focus:border-[#000000]"
                        placeholder=" {{ __('Search question') }} " />
                </label>
            </form>
        </div>
        <div class="space-y-2 mt-7">




            @foreach ($faqs as $faq)
                <div wire:key='faq-item-{{ str()->uuid() }}' data-id="single-faq" aria-expanded="false"
                    class="p-3 group aria-expanded:bg-[#f9fafb] aria-expanded:rounded-sm">
                    <button type="button" data-id="toggle-faq-btn"
                        class="flex items-center justify-between w-full pb-3 border-b group-aria-expanded:border-none ">
                        <h5 class="text-sm">{{ $faq->question }}</h5>
                        <i class="text-xs fal fa-plus group-aria-expanded:hidden text-[#6B7280]"></i>
                        <i class="text-xs fal fa-minus hidden group-aria-expanded:block text-[#6B7280]"></i>
                    </button>
                    <div data-id="single-faq-details" class="hidden">
                        <p class="text-[#6B7280] text-xs font-medium">{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div> --}}
