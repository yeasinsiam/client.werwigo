@extends('layouts.main.index')
@section('meta-title', 'My Account - oooHotels')

{{-- @section('hideHeaderFooter', true) --}}
@section('hideFooter', true)

@section('content')
    <div class="font-['SF Pro Display'] max-w-5xl px-3 mx-auto mt-3 lg:px-0">
        {{-- <a href="{{ route('my-account.profile.index') }}"
            class="flex items-center justify-between  px-5 mx-auto pt-14 bg-[#000000] pb-6 rounded-b-2xl">
            <div class="flex items-center gap-3">

                <div>
                    <img src="@if (auth('admin')->user()->avatar) {{ auth('admin')->user()->avatar->getUrl() }}
                    @else
                     /demo/avatar.jpg @endif"
                        alt="avatar" class="object-cover w-24 h-24 rounded-full" />
                </div>
                <div class="text-white">
                    <h2 class="font-semibold">{{ auth('admin')->user()->full_name }}</h2>
                    <p class="text-sm text-[rgba(255,255,255,0.69)] lg:hidden">View profile</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-2">
                <p class="text-[13px] leading-none text-[rgba(255,255,255,0.69)] hidden lg:block">View profile</p>

                <i class="text-lg leading-none text-white far fa-angle-right"></i>
            </div>
        </a> --}}

        {{-- More Options --}}
        <div class="flex flex-col px-3 py-5">
            <h4 class="text-base font-medium">More Option</h4>
            <div class="flex flex-col justify-between flex-1 mt-5">

                <ul class="flex flex-col gap-5">
                    {{-- <li>
                        <a href="{{ route('my-account.notifications') }}" class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-[#303437] text-sm">
                                <div class="flex items-center justify-center w-9 h-9 bg-[#F0F0F0] rounded-full">
                                    <svg width="20" height="20" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.5777 3.8685C9.26771 3.8685 6.5777 6.5585 6.5777 9.8685V12.7585C6.5777 13.3685 6.3177 14.2985 6.0077 14.8185L4.85771 16.7285C4.14771 17.9085 4.63771 19.2185 5.93771 19.6585C10.2477 21.0985 14.8977 21.0985 19.2077 19.6585C20.4177 19.2585 20.9477 17.8285 20.2877 16.7285L19.1377 14.8185C18.8377 14.2985 18.5777 13.3685 18.5777 12.7585V9.8685C18.5777 6.5685 15.8777 3.8685 12.5777 3.8685Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" />
                                        <path
                                            d="M14.4275 4.1585C14.1175 4.0685 13.7975 3.9985 13.4675 3.9585C12.5075 3.8385 11.5875 3.9085 10.7275 4.1585C11.0175 3.4185 11.7375 2.8985 12.5775 2.8985C13.4175 2.8985 14.1375 3.4185 14.4275 4.1585Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M15.5776 20.0185C15.5776 21.6685 14.2276 23.0185 12.5776 23.0185C11.7576 23.0185 10.9976 22.6785 10.4576 22.1385C9.91764 21.5985 9.57764 20.8385 9.57764 20.0185"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" />
                                    </svg>
                                </div>
                                Notificaiion Settings
                            </div>
                            <i class="text-base leading-none far fa-angle-right text-[#303437]"></i>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('my-account.contacts-and-support') }}" class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-[#303437] text-sm">
                                <div class="flex items-center justify-center w-9 h-9 bg-[#F0F0F0] rounded-full">
                                    {{-- <svg width="20" height="20" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 22.6294C17.5 22.6294 22 18.1294 22 12.6294C22 7.12939 17.5 2.62939 12 2.62939C6.5 2.62939 2 7.12939 2 12.6294C2 18.1294 6.5 22.6294 12 22.6294Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 8.62939V13.6294" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.9946 16.6294H12.0036" stroke="#292D32" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> --}}
                                    <svg width="20" height="20" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17 19.2269H13L8.54999 22.1869C7.88999 22.6269 7 22.1569 7 21.3569V19.2269C4 19.2269 2 17.2269 2 14.2269V8.22687C2 5.22687 4 3.22687 7 3.22687H17C20 3.22687 22 5.22687 22 8.22687V14.2269C22 17.2269 20 19.2269 17 19.2269Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M12.0001 12.1569V11.9469C12.0001 11.2669 12.4201 10.9069 12.8401 10.6169C13.2501 10.3369 13.66 9.97689 13.66 9.31689C13.66 8.39689 12.9201 7.65686 12.0001 7.65686C11.0801 7.65686 10.3401 8.39689 10.3401 9.31689"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M11.9955 14.5469H12.0045" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>


                                </div>
                                Contacts and Support
                            </div>
                            <i class="text-base leading-none far fa-angle-right text-[#303437]"></i>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#" class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-[#303437] text-sm">
                                <div class="flex items-center justify-center w-9 h-9 bg-[#F0F0F0] rounded-full">
                                    <svg width="20" height="20" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17 19.2269H13L8.54999 22.1869C7.88999 22.6269 7 22.1569 7 21.3569V19.2269C4 19.2269 2 17.2269 2 14.2269V8.22687C2 5.22687 4 3.22687 7 3.22687H17C20 3.22687 22 5.22687 22 8.22687V14.2269C22 17.2269 20 19.2269 17 19.2269Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M11.9998 12.1569V11.9469C11.9998 11.2669 12.4198 10.9069 12.8398 10.6169C13.2498 10.3369 13.6598 9.97689 13.6598 9.31689C13.6598 8.39689 12.9198 7.65686 11.9998 7.65686C11.0798 7.65686 10.3398 8.39689 10.3398 9.31689"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M11.9955 14.5469H12.0045" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                                Contact Us
                            </div>
                            <i class="text-base leading-none far fa-angle-right text-[#303437]"></i>
                        </a>
                    </li> --}}
                    <li>
                        <a href="#" class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-[#303437] text-sm">
                                <div class="flex items-center justify-center w-9 h-9 bg-[#F0F0F0] rounded-full">
                                    <svg width="20" height="20" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9897 9.28516H7.00977" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 7.60516V9.28516" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.5 9.26514C14.5 13.5651 11.14 17.0451 7 17.0451" stroke="#292D32"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.0002 17.0451C15.2002 17.0451 13.6002 16.0851 12.4502 14.5751"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 22.3251C17.5228 22.3251 22 17.848 22 12.3251C22 6.80229 17.5228 2.32513 12 2.32513C6.47715 2.32513 2 6.80229 2 12.3251C2 17.848 6.47715 22.3251 12 22.3251Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </div>
                                Language
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-[#74737A]">English</span>
                                <i class="text-base leading-none far fa-angle-right text-[#303437]"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms-of-service') }}" class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-[#303437] text-sm">
                                <div class="flex items-center justify-center w-9 h-9 bg-[#F0F0F0] rounded-full">
                                    <svg width="20" height="20" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 10.9902V15.9902C22 20.9902 20 22.9902 15 22.9902H9C4 22.9902 2 20.9902 2 15.9902V9.99017C2 4.99017 4 2.99017 9 2.99017H14"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M22 10.9902H18C15 10.9902 14 9.99017 14 6.99017V2.99017L22 10.9902Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7 13.9902H13" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7 17.9902H11" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                Terms of service
                            </div>
                            <i class="text-base leading-none far fa-angle-right text-[#303437]"></i>
                        </a>
                    </li>
                </ul>


            </div>

        </div>
        {{-- Business Option --}}
        <div class="flex flex-col px-3 py-5">
            <h4 class="text-base font-medium">Business</h4>
            <div class="flex flex-col justify-between flex-1 mt-5">

                <ul class="flex flex-col gap-5">

                    <li>
                        <a href="mailto:demo@user.com" class="flex items-center justify-between text-[#000000]">
                            <div class="flex items-center gap-3 text-[#303437] text-sm">
                                <div class="flex items-center justify-center w-9 h-9 bg-[#000000] rounded-full">
                                    <svg width="20" height="20" class="-translate-y-[2px]" viewBox="0 0 23 30"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 17V22C21 27 19 29 14 29H8C3 29 1 27 1 22V16C1 11 3 9 8 9H13"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M17.8359 14.2344V18.707H16.2539V14.2344H12.084V12.6523H16.2539V8.28711H17.8359V12.6523H22.0059V14.2344H17.8359Z"
                                            fill="white" />
                                    </svg>


                                </div>
                                <span class="text-[#000000]">Propose your property</span>
                            </div>
                            <i class="text-base leading-none far fa-angle-right text-[#000000]"></i>
                        </a>
                    </li>
                </ul>

                {{-- Logout --}}
                <form action="{{ route('login.destroy') }}" method="POST" class="mt-20">
                    @csrf
                    <button type="submit" onclick="return confirm('{{ __('Sure continue logout?') }}')"
                        class="text-[#EA4335] max-w-sm mx-auto  bg-[#fdeceb] flex w-full justify-center py-3 px-2 rounded-lg gap-2">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.56006 14.62L4.00006 12.06L6.56006 9.5" stroke="#EA4335" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.2402 12.06H4.07023" stroke="#EA4335" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.2402 20C16.6602 20 20.2402 17 20.2402 12C20.2402 7 16.6602 4 12.2402 4"
                                stroke="#EA4335" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                        <span class="text-sm">Logout</span>
                    </button>
                </form>
            </div>

        </div>

    </div>


@endsection
