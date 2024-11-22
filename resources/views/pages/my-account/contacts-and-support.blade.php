@extends('layouts.main.index')
@section('meta-title', 'Contacts and Support - oooHotels')


@section('content')


    {{-- _________ About oooHotels_____________ --}}

    {{-- <section wire:ignore @class([
        ' max-w-5xl px-3 mx-auto mt-5  space-y-2 lg:space-y-5 lg:px-0 lg:mt-10',
    ])>
        <div class="flex items-center justify-between">
            <h1 class="text-black text-xl font-semibold leading-[35px]">About oooHotels
            </h1>

        </div>
        <div class="mt-5">
            <swiper-container id="about-ooohotels-slider" init='false'>
                <swiper-slide class="max-lg:w-8/12">
                    <div class="flex flex-col gap-1">
                        <h3 class="text-[#000000] font-semibold">Vibes</h3>
                        <p class="text-xs text-[#808089] lg:text-sm">Lorem ipsum dolor sit amet consectetur. Mauris
                            velit
                            aenean
                            facilisis tempus pellentesque arcu
                            ornare adipiscing.Lorem ipsum dolor sit amet consectetur. Mauris velit</p>
                        </a>
                    </div>
                </swiper-slide>
                <swiper-slide class="max-lg:w-8/12">
                    <div class="flex flex-col gap-1">
                        <h3 class="text-[#000000] font-semibold">Couple Scoring</h3>
                        <p class="text-xs text-[#808089] lg:text-sm">Lorem ipsum dolor sit amet consectetur. Mauris
                            velit
                            aenean
                            facilisis tempus pellentesque arcu
                            ornare adipiscing.Lorem ipsum dolor sit amet consectetur. Mauris velit</p>
                        </a>
                    </div>
                </swiper-slide>
                <swiper-slide class="max-lg:w-8/12">
                    <div class="flex flex-col gap-1">
                        <h3 class="text-[#000000] font-semibold">Booking Type</h3>
                        <p class="text-xs text-[#808089] lg:text-sm">Lorem ipsum dolor sit amet consectetur. Mauris
                            velit
                            aenean
                            facilisis tempus pellentesque arcu
                            ornare adipiscing.Lorem ipsum dolor sit amet consectetur. Mauris velit</p>
                        </a>
                    </div>
                </swiper-slide>

            </swiper-container>
        </div>
    </section> --}}

    <div class="font-['SF Pro Display'] max-w-5xl px-1 mx-auto mt-3 lg:px-0">

        {{-- <div class="bg-[#000000]  max-w-xl mx-auto px-4 pt-5 pb-7 lg:rounded-b-2xl">
            <div class="flex items-center justify-between max-w-xl mx-auto lg:hidden">
                <a href="{{ url()->previous() }}" class="flex items-center justify-center w-5 h-5 bg-white rounded-sm">
                    <i class="leading-none text-md far fa-angle-left"></i>
                </a>
                <h3 class="text-lg font-semibold text-white">Contacts and Support</h3>
                <div></div>
            </div>

            <div class="flex items-end justify-between gap-3 mt-7">
                <div class="space-y-3">
                    <h1 class="text-2xl font-bold text-white">Contacts and Support</h1>
                    <p class="text-white ">Can't find what you're looking for?</p>
                    <a href="mailto:demo@user.com?subject=Support"
                        class="inline-block px-3 py-2 text-sm font-medium bg-white rounded-lg">Contacts
                        us</a>
                </div>
                <div>
                    <img class="w-[103px] h-[101px]" src="/static/images/asset.png" alt="asset">
                </div>
            </div>



        </div> --}}
        {{--
        <div class="max-w-xl gap-1 p-5 mx-auto space-y-1">
            <div class="flex items-center ">
                <h1 class="text-3xl font-semibold">Hi</h1>
                <img class="w-8 h-8" src="/static/images/waving-hand.png" alt="waving hand">
            </div>
            <p class="text-sm">Keep your communication in one message. Please be patient and do not intiate multiple
                conversations</p>
        </div> --}}
        <livewire:pages.my-account.contacts-and-supports.faqs />

        {{-- Email Now --}}
        {{-- <div class="fixed bottom-3 right-3">
            <a href="mailto:demo@user.com" class=" w-16 h-16 bg-[#4285F4] flex justify-center items-center rounded-full">
                <i class="text-xl text-white fas fa-envelope"></i>
            </a>
        </div> --}}

        <div wire:ignore class="flex flex-col items-center justify-center gap-3 mt-10 ">

            @if (session()->has('contact-success-message'))
                <p class="px-5 py-3 text-sm text-green-900 bg-green-200 rounded-lg">
                    {{ session()->get('contact-success-message') }}
                </p>
            @endif
            <h2 class="text-lg font-medium"> {{ __("Can't find what you're looking for?") }} </h2>
            <button id="show-contact-us-form-btn"
                class="inline-block px-5 py-2 text-sm bg-[#000000] text-white rounded-lg focus:ring-1 focus:ring-offset-1 focus:ring-[#000000]">
                {{ __('Contact Us') }} </button>
        </div>


    </div>



    {{-- Contact Us message --}}
    <div wire:ignore id="desktop-contact-message-popup" role="dialog"
        class="w-screen h-screen hidden  fixed top-0 z-[9999]
        overflow-y-scroll
        inset-0 bg-black/50 !p-0 !m-0">
        <div class="flex items-center justify-center w-full h-full">

            <div class="w-full -translate-y-5 max-lg:px-3 lg:max-w-lg">
                <div class="relative p-4 pb-5 bg-white rounded-lg ">

                    {{-- Desktop Close Button --}}
                    <button
                        class="handle-close  absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>

                    <form action="{{ route('contacts-and-support.post-contact-mail') }}" method="POST"
                        class="bg-white rounded-lg " autocomplete="off">
                        @csrf

                        <h1 class="text-xl font-bold"> {{ __('Contact Us') }}</h1>
                        {{-- <p class="text-sm text-[#8C7379]">Start Explore your Vibes and Experience Love </p> --}}

                        <div class="space-y-3 mt-7">
                            <div>
                                <input type="text" required
                                    class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full"
                                    placeholder=" {{ __('Full Name') }} " name="full_name" autocomplete="false"
                                    value="{{ old('full_name', auth('admin')->user()?->full_name) }}" />
                                <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                    @foreach ($errors->get('full_name') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <input type="email" required
                                    class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full"
                                    placeholder=" {{ __('Email') }} " name="email" autocomplete="false"
                                    value="{{ old('email', auth('admin')->user()?->email) }}" />
                                <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                    @foreach ($errors->get('email') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <textarea required rows="6" class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full"
                                    placeholder=" {{ __('Message') }} " name="message" autocomplete="false">{{ old('messsage') }}</textarea>
                                <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                    @foreach ($errors->get('message') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <button type="submit"
                            class="block w-full px-2 py-3 mt-5 text-base bg-[#31020E] font-medium text-white rounded-lg">
                            {{ __('Send') }} </button>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection



@prepend('footer')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
@endprepend
