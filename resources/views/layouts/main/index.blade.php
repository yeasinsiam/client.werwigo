<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>
        @yield('meta-title', 'oooHotels')
    </title> --}}

    <title>werwigo - Find your next travel vibes</title>



    {{-- favicon start --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    {{-- Facicon end --}}






    {{-- Google font --}}
    <link rel="preconnect" href="//fonts.googleapis.com">
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
    <link
        href="//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- <link
        href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> --}}

    <link href="//fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;800&display=swap" rel="stylesheet">

    {{-- Font Awesome 6 pro --}}
    {{-- <link rel="stylesheet" href="//fonts.labkom.or.id/fontawesome/css/all.css" /> --}}
    <link href="//cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />

    {{-- Flag icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css" />




    @livewireStyles

    @stack('header')

    {{-- Base Styles --}}
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans">



    @if (!$__env->yieldContent('hideHeader', false))
        @include('layouts.main.components.header')
    @endif


    <main>
        @yield('content')
    </main>
    @if (!$__env->yieldContent('hideFooter', false))
        @include('layouts.main.components.footer')
    @endif





    {{-- Mobile Fixed navigation Menu --}}
    {{-- @if (!$__env->yieldContent('hideFooter', false))

        <div class="pb-[70px] lg:hidden"></div>
        <nav @class([
            'fixed bottom-0 w-full bg-white lg:hidden z-[9999]',
            '!hidden' =>
                request()->routeIs('en.hotels.show') ||
                request()->routeIs('it.hotels.show'),
        ])>
            <ul class="flex items-center justify-around shadow-xl ">


                <li>
                    <a href="{{ route('home') }}"
                        class="flex flex-col items-center justify-center px-2 py-3 border-b border-transparent gap-y-1 lg:px-5 hover:bg-gray-50 gap-x-2">



                        <svg width="23" height="23" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.73 1.15773e-05C10.7691 -0.00280116 8.8416 0.506953 7.13845 1.47874C5.4353 2.45054 4.01567 3.85062 3.02029 5.54021C2.0249 7.2298 1.48831 9.15023 1.46372 11.1111C1.43913 13.072 1.92739 15.0053 2.8801 16.7193L0.0958538 22.5725C0.00786103 22.7588 -0.0204834 22.9676 0.0146935 23.1706C0.0498703 23.3736 0.146853 23.5607 0.292389 23.7065C0.437925 23.8523 0.624915 23.9496 0.82781 23.985C1.0307 24.0205 1.23961 23.9925 1.42597 23.9048L7.27848 21.1172C8.78256 21.9507 10.4575 22.4286 12.1748 22.5145C13.8922 22.6003 15.6064 22.2917 17.1861 21.6124C18.7658 20.9331 20.1689 19.9011 21.2881 18.5954C22.4072 17.2898 23.2125 15.7452 23.6424 14.0801C24.0723 12.415 24.1152 10.6736 23.7679 8.98934C23.4206 7.30507 22.6924 5.72269 21.639 4.36348C20.5856 3.00427 19.2349 1.90433 17.6907 1.14798C16.1464 0.391623 14.4495 -0.00106621 12.73 1.15773e-05ZM12.73 20.5351C11.0061 20.5321 9.31734 20.0471 7.85453 19.1348C7.71191 19.0467 7.54942 18.9958 7.38201 18.9869C7.21459 18.978 7.04762 19.0113 6.89645 19.0838L3.74617 20.5841C3.69956 20.6062 3.64726 20.6134 3.59643 20.6046C3.5456 20.5958 3.49874 20.5715 3.46227 20.535C3.42579 20.4985 3.40149 20.4516 3.3927 20.4008C3.3839 20.35 3.39104 20.2977 3.41314 20.251L4.91327 17.1004C4.98532 16.949 5.01813 16.7819 5.00869 16.6144C4.99925 16.447 4.94787 16.2846 4.85927 16.1422C3.78139 14.3976 3.31302 12.3445 3.52765 10.305C3.74227 8.26543 4.62774 6.35484 6.04516 4.87286C7.46258 3.39088 9.33178 2.42137 11.3596 2.11639C13.3873 1.81141 15.459 2.18822 17.2495 3.18771C19.0401 4.1872 20.4482 5.75284 21.2532 7.63903C22.0581 9.52523 22.2142 11.6253 21.6971 13.6098C21.18 15.5943 20.0188 17.351 18.3957 18.6044C16.7727 19.8577 14.7805 20.5368 12.73 20.5351Z"
                                fill="black" />
                            <path
                                d="M10.1001 15.0647V6.53534L17.4564 10.8L10.1001 15.0647ZM10.0291 15.1058C10.0292 15.1058 10.0292 15.1058 10.0292 15.1058L10.0291 15.1058L10.0291 15.1058Z"
                                fill="black" stroke="black" />
                        </svg>




                        <span @class([
                            'text-xs text-[#7b7a81]',
                            '!text-[#000000] font-semibold' =>
                                request()->routeIs('en.home') || request()->routeIs('it.home'),
                        ])>{{ __('Vibes') }}</span>

                    </a>
                </li>
                <li wire:ignore data-id="toggle-filter-modal">
                    <a href="#"
                        class="flex flex-col items-center justify-center px-2 py-3 border-b border-transparent gap-y-1 lg:px-5 hover:bg-gray-50 gap-x-2">


                        <svg width="24" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            xmlns:serif="http://www.serif.com/"
                            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                            <rect id="Icons" x="-640" y="-128" width="1280" height="800" style="fill:none;" />
                            <g id="Icons1" serif:id="Icons">
                                <g id="Strike"></g>
                                <g id="H1"></g>
                                <g id="H2"></g>
                                <g id="H3"></g>
                                <g id="list-ul"></g>
                                <g id="hamburger-1"></g>
                                <g id="hamburger-2"></g>
                                <g id="list-ol"></g>
                                <g id="list-task"></g>
                                <g id="trash"></g>
                                <g id="vertical-menu"></g>
                                <g id="horizontal-menu"></g>
                                <g id="sidebar-2"></g>
                                <g id="Pen"></g>
                                <g id="Pen1" serif:id="Pen"></g>
                                <g id="clock"></g>
                                <g id="external-link"></g>
                                <g id="hr"></g>
                                <g id="info"></g>
                                <g id="warning"></g>
                                <g id="plus-circle"></g>
                                <g id="minus-circle"></g>
                                <g id="vue"></g>
                                <g id="cog"></g>
                                <g id="logo"></g>
                                <g id="eye-slash"></g>
                                <g id="eye"></g>
                                <g id="toggle-off"></g>
                                <g id="shredder"></g>
                                <path
                                    d="M39.94,44.142c-3.387,2.507 7.145,-8.263 4.148,-4.169c0.075,-0.006 -0.064,0.221 -0.53,0.79c0,0 8.004,7.95 11.933,11.996c1.364,1.475 -1.097,4.419 -2.769,2.882c-3.558,-3.452 -11.977,-12.031 -11.99,-12.045l-0.792,0.546Z" />
                                <path
                                    d="M28.179,48.162c5.15,-0.05 10.248,-2.183 13.914,-5.806c4.354,-4.303 6.596,-10.669 5.814,-16.747c-1.34,-10.415 -9.902,-17.483 -19.856,-17.483c-7.563,0 -14.913,4.731 -18.137,11.591c-2.468,5.252 -2.473,11.593 0,16.854c3.201,6.812 10.431,11.518 18.008,11.591c0.086,0 0.172,0 0.257,0Zm-0.236,-3.337c-7.691,-0.074 -14.867,-6.022 -16.294,-13.648c-1.006,-5.376 0.893,-11.194 4.849,-15.012c4.618,-4.459 11.877,-5.952 17.913,-3.425c5.4,2.261 9.442,7.511 10.187,13.295c0.638,4.958 -1.141,10.154 -4.637,13.733c-3.067,3.14 -7.368,5.014 -11.803,5.057c-0.072,0 -0.143,0 -0.215,0Z"
                                    style="fill-rule:nonzero;" />
                                <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]"></g>
                                <g id="react"></g>
                            </g>
                        </svg>


                        <span @class(['text-xs text-[#7b7a81]'])>{{ __('Search') }}</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('favorites') }}"
                        class="flex flex-col items-center justify-center px-2 py-3 border-b border-transparent gap-y-1 lg:px-5 hover:bg-gray-50 gap-x-2">

                        <svg width="24" viewBox="0 0 24 24"xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M15.0945 4.05114C13.0515 3.64962 10.9485 3.64962 8.90552 4.05114C7.06522 4.41282 5.75 6.00581 5.75 7.84496V19.2674C5.75 20.0112 6.5789 20.5045 7.25848 20.1112L10.4454 18.2668C11.406 17.7109 12.594 17.7109 13.5546 18.2668L16.7415 20.1112C17.4211 20.5045 18.25 20.0112 18.25 19.2674V7.84496C18.25 6.00581 16.9348 4.41282 15.0945 4.05114ZM8.61625 2.5793C10.8502 2.14024 13.1498 2.14023 15.3837 2.5793C17.9159 3.07695 19.75 5.27714 19.75 7.84496V19.2674C19.75 21.1964 17.6438 22.3665 15.9902 21.4095L12.8032 19.565C12.3075 19.2781 11.6925 19.2781 11.1968 19.565L8.00984 21.4095C6.35615 22.3665 4.25 21.1964 4.25 19.2674V7.84496C4.25 5.27714 6.08412 3.07695 8.61625 2.5793Z"
                                fill="black" fill-rule="evenodd" />
                        </svg>

                        <span @class([
                            'text-xs text-[#7b7a81]',
                            '!text-[#000000] font-semibold' =>
                                request()->routeIs('en.favorites') ||
                                request()->routeIs('it.favorites'),
                        ])>{{ __('Saved') }}</span>

                    </a>
                </li>
                @if (!auth('admin')->check())
                    <li>
                        <a href="{{ route('sign-up.index') }}"
                            class="flex flex-col items-center justify-center px-2 py-3 border-b border-transparent gap-y-1 lg:px-5 hover:bg-gray-50 gap-x-2">
                            <svg width='26' viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: none;
                                        }
                                    </style>
                                </defs>
                                <title />
                                <g data-name="Layer 2" id="Layer_2">
                                    <path
                                        d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                    <path d="M16,17a5,5,0,1,1,5-5A5,5,0,0,1,16,17Zm0-8a3,3,0,1,0,3,3A3,3,0,0,0,16,9Z" />
                                    <path
                                        d="M25.55,24a1,1,0,0,1-.74-.32A11.35,11.35,0,0,0,16.46,20h-.92a11.27,11.27,0,0,0-7.85,3.16,1,1,0,0,1-1.38-1.44A13.24,13.24,0,0,1,15.54,18h.92a13.39,13.39,0,0,1,9.82,4.32A1,1,0,0,1,25.55,24Z" />
                                </g>
                                <g id="frame">
                                    <rect class="cls-1" height="32" width="32" />
                                </g>
                            </svg>
                            <span @class([
                                'text-xs text-[#7b7a81]',
                                '!text-[#000000] font-semibold' => request()->routeIs('sign-up.index'),
                            ])>Sign Up</span>

                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('admin.profile.index') }}"
                            class="flex flex-col items-center justify-center px-2 py-3 border-b border-transparent gap-y-1 lg:px-5 hover:bg-gray-50 gap-x-2">

                            <img srcset="{{ auth('admin')->user()->avatar->getUrl() }}"
                                class="block object-cover w-8 h-8 rounded-full" />


                            <span @class([
                                'text-xs text-[#7b7a81]',
                                '!text-[#000000] font-semibold' => request()->routeIs('admin.*'),
                            ])>{{ __('Profile') }}</span>

                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif --}}



    <!-- Popup Modals -->
    {{-- @stack('popups') --}}

    {{-- @include('layouts.main.components.popups') --}}







    {{-- ___jQuery___ --}}
    <script>
        window.routeName = @js(
            request()->route()
                ?->getName() ?? ''
        );
    </script>
    <script src="//code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
    @livewireScripts
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>

    @stack('footer')
    @vite(['resources/js/client/app.js'])
</body>

</html>
