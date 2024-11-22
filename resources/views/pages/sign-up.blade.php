@extends('layouts.main.index')
@section('meta-title', 'Sign Up - oooHotels')

@section('hideHeader', true)
@section('hideFooter', true)

@section('content')

    <div class="font-['SF Pro Display'] h-full min-h-screen bg-white px-4 pb-3">
        <header class="flex items-center justify-between max-w-xl px-3 mx-auto pt-14">
            <a href="{{ url()->previous() }}" class="translate-y-[2px]">
                <i class="text-2xl leading-none text-black far fa-angle-left"></i>
            </a>
            <a href="{{ route('home') }}" class="block ">
                <img src="{{ asset('static/images/brand-logo.png') }}" class="w-24" alt="werwigo">
            </a>
            <div></div>
        </header>

        {{-- @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif --}}

        <form action="{{ route('sign-up.store') }}" method="POST"
            class="max-w-xl px-4 py-10 mx-auto bg-white border border-black rounded-lg mt-7" autocomplete="off"
            enctype="multipart/form-data">
            @csrf

            <h1 class="text-xl font-bold"> {{ __('Signup') }} </h1>
            <p class="text-sm text-[#8C7379]"> {{ __('Start Explore your Vibes and Experience Love') }} </p>

            <div class="space-y-3 mt-7">
                {{-- <div>
                    <label for="avatar" class="block text-sm  text-[#74737A]">
                        Profile Picture
                    </label>
                    <input type="file" name="avatar" accept=".jpg, .jpeg, .png"
                        class="block w-full pt-1 text-sm text-[#74737A] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-black hover:file:bg-gray-200" />
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('avatar') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div> --}}
                <div>
                    <input type="text"
                        class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline-none focus:outline-black"
                        placeholder=" {{ __('User Name') }}*" name="username" autocomplete="false"
                        value="{{ old('username') }}" />
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <input type="text"
                        class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline-none focus:outline-black"
                        placeholder=" {{ __('Full Name') }}*" name="name" autocomplete="false"
                        value="{{ old('name') }}" />
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('name') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <input type="text"
                        class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline-none focus:outline-black"
                        placeholder=" {{ __('Mobile') }} " name="mobile_number" autocomplete="false"
                        value="{{ old('mobile_number') }}" />
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('mobile_number') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <input type="email"
                        class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline-none focus:outline-black"
                        placeholder="Email*" name="email" autocomplete="false" value="{{ old('email') }}" />
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('email') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                <div data-id="input-field-show-text">
                    <div class="relative">
                        <input type="password"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline-none focus:outline-black"
                            placeholder=" {{ __('Password') }} *" name="password" autocomplete="false"
                            value="{{ old('password') }}" />


                        <i data-id="show-text"
                            class="fas fa-eye absolute top-2/4 right-3 text-black [transform:translateY(-50%)]"></i>
                    </div>
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>

                <div data-id="input-field-show-text">

                    <div class="relative">
                        <input type="password"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline-none focus:outline-black"
                            placeholder=" {{ __('Confirm Password') }}  *" name="password_confirmation"
                            autocomplete="false" value="{{ old('confirm_password') }}" />


                        <i data-id="show-text"
                            class="fas fa-eye absolute top-2/4 right-3 text-black [transform:translateY(-50%)]"></i>
                    </div>
                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('password_confirmation') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="submit"
                class="block w-full px-2 py-3 mt-5 text-base bg-[#31020E] font-medium text-white rounded-lg">Signup</button>
            <div class="flex justify-center mt-5">
                <p class="text-sm text-[#808080]"> {{ __('Already have an account?') }} <a
                        href="{{ route('login.index') }}" class="text-[#31020E] font-semibold">{{ __('Login here') }}</a>
                </p>
            </div>
        </form>


    </div>
@endsection


@prepend('header')
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mailtoharshit/San-Francisco-Font-/sanfrancisco.css"> --}}
@endprepend
