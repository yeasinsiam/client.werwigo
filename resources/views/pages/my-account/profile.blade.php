@extends('layouts.main.index')
@section('meta-title', 'Profile - oooHotels')

@section('hideHeaderFooter', true)

@section('content')
    <div class="font-['SF Pro Display'] max-w-xl mx-auto pb-10">
        <form action="{{ route('my-account.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="px-5 pt-5 mx-auto rounded-b-xl">
                <h2 class="pt-10 font-semibold lg:hidden">Profile</h2>
                <div class="flex flex-col items-center justify-between gap-5 lg:flex-row lg:justify-start">
                    <div>
                        <label id="profile-avatar-field-wrapper" class="relative block">
                            <input type="file" class="hidden" name="avatar" accept=".jpg, .jpeg" />
                            <img src="@if (auth('admin')->user()->avatar) {{ auth('admin')->user()->avatar->getUrl() }} @else /demo/avatar.jpg @endif"
                                alt="avatar" class="object-cover w-24 h-24 rounded-full" />
                            <div
                                class="absolute  right-1 bottom-1 flex items-center justify-center w-6 h-6 rounded-full bg-[#2F69FE]">
                                <svg width="13" height="13" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.9998 5C14.4915 5 14.0248 4.70833 13.7915 4.25833L13.1915 3.05C12.8081 2.29166 11.8081 1.66666 10.9581 1.66666H9.04981C8.19148 1.66666 7.19148 2.29166 6.80815 3.05L6.20815 4.25833C5.97481 4.70833 5.50815 5 4.99981 5C3.19148 5 1.75815 6.525 1.87481 8.325L2.30815 15.2083C2.40815 16.925 3.33315 18.3333 5.63315 18.3333H14.3665C16.6665 18.3333 17.5831 16.925 17.6915 15.2083L18.1248 8.325C18.2415 6.525 16.8081 5 14.9998 5ZM8.74981 6.04166H11.2498C11.5915 6.04166 11.8748 6.325 11.8748 6.66666C11.8748 7.00833 11.5915 7.29166 11.2498 7.29166H8.74981C8.40815 7.29166 8.12481 7.00833 8.12481 6.66666C8.12481 6.325 8.40815 6.04166 8.74981 6.04166ZM9.99981 15.1C8.44981 15.1 7.18315 13.8417 7.18315 12.2833C7.18315 10.725 8.44148 9.46666 9.99981 9.46666C11.5581 9.46666 12.8165 10.725 12.8165 12.2833C12.8165 13.8417 11.5498 15.1 9.99981 15.1Z"
                                        fill="white" />
                                </svg>

                            </div>
                        </label>
                        <ul class='space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('avatar') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>


                    <button type="submit"
                        class="hidden lg:block px-10 py-3   bg-[#000000] text-sm font-medium text-white rounded-lg ">Edit
                        Profile</button>



                </div>

            </div>


            <div class="px-3 mt-5 ">
                <div class="space-y-3">
                    {{-- Full Name --}}
                    <div>

                        <label
                            class="flex gap-4 px-3 py-3 bg-white rounded-lg [box-shadow:0px_2px_24px_0px_rgba(0,0,0,0.08)]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                    stroke="#7D8695" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22"
                                    stroke="#7D8695" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col flex-1 gap-1">
                                <span class="block text-xs text-[#7D8695]">Full Name</span>
                                <input type="text" name="full_name"
                                    value="{{ old('full_name', auth('admin')->user()->full_name) }}"
                                    class="text-xs font-medium border-b w-full border-transparent focus:border-[#7D8695] focus:outline-none" />
                            </div>

                        </label>
                        <ul class='mt-1 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('full_name') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Email --}}
                    <div>
                        <label
                            class="flex gap-4 px-3 py-3 bg-white rounded-lg [box-shadow:0px_2px_24px_0px_rgba(0,0,0,0.08)]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
                                    stroke="#7D8695" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="#7D8695"
                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <div class="flex flex-col flex-1 gap-1">
                                <span class="block text-xs text-[#7D8695]">Email</span>
                                <input type="text" name="email"
                                    value="{{ old('email', auth('admin')->user()->email) }}"
                                    class="text-xs font-medium border-b w-full border-transparent focus:border-[#7D8695] focus:outline-none" />
                            </div>
                        </label>
                        <ul class='mt-1 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Mobile Number --}}
                    <div>
                        <label
                            class="flex gap-4 px-3 py-3 bg-white rounded-lg [box-shadow:0px_2px_24px_0px_rgba(0,0,0,0.08)]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 7V17C20 21 19 22 15 22H9C5 22 4 21 4 17V7C4 3 5 2 9 2H15C19 2 20 3 20 7Z"
                                    stroke="#7D8695" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12.0002 19.1C12.8562 19.1 13.5502 18.406 13.5502 17.55C13.5502 16.694 12.8562 16 12.0002 16C11.1442 16 10.4502 16.694 10.4502 17.55C10.4502 18.406 11.1442 19.1 12.0002 19.1Z"
                                    stroke="#7D8695" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <div class="flex flex-col flex-1 gap-1">
                                <span class="block text-xs text-[#7D8695]">Mobile No.</span>
                                <input type="text" name="mobile_number"
                                    value="{{ old('mobile_number', auth('admin')->user()->mobile_number) }}"
                                    class="text-xs font-medium border-b w-full border-transparent focus:border-[#7D8695] focus:outline-none" />
                            </div>
                        </label>
                        <ul class='mt-1 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('mobile_number') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Password --}}
                    <div>
                        <label
                            class="flex gap-4 px-3 py-3 bg-white rounded-lg [box-shadow:0px_2px_24px_0px_rgba(0,0,0,0.08)]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="#7D8695"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z"
                                    stroke="#7D8695" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15.9965 16H16.0054" stroke="#7D8695" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.9955 16H12.0045" stroke="#7D8695" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7.99451 16H8.00349" stroke="#7D8695" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <div class="flex flex-col flex-1 gap-1">
                                <span class="block text-xs text-[#7D8695]">Password</span>
                                <input type="password" autocomplete="off" name="password"
                                    placeholder="Empty Password fields won't change password"
                                    class="text-xs font-medium border-b w-full border-transparent focus:border-[#7D8695] focus:outline-none" />
                            </div>
                        </label>
                        <ul class='mt-1 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Confirm Paswword --}}
                    <div>
                        <label
                            class="flex gap-4 px-3 py-3 bg-white rounded-lg [box-shadow:0px_2px_24px_0px_rgba(0,0,0,0.08)]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="#7D8695"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z"
                                    stroke="#7D8695" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15.9965 16H16.0054" stroke="#7D8695" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.9955 16H12.0045" stroke="#7D8695" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7.99451 16H8.00349" stroke="#7D8695" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <div class="flex flex-col flex-1 gap-1">
                                <span class="block text-xs text-[#7D8695]">Confirm Password</span>
                                <input type="password" autocomplete="off" name="password_confirmation"
                                    class="text-xs font-medium border-b w-full border-transparent focus:border-[#7D8695] focus:outline-none" />
                            </div>
                        </label>
                        <ul class='mt-1 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('password_confirmation') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="submit"
                    class="block w-full px-2 py-3 mt-10 text-base bg-[#000000] font-medium text-white rounded-lg lg:hidden">Edit
                    Profile</button>

            </div>
        </form>

        <form action="{{ route('my-account.profile.destroy') }}" method="POST" class="mt-3 lg:mt-7">
            @csrf
            <button type="submit" onclick="return confirm('Comfirm deleting this account?')"
                class="block w-full text-xs font-medium text-[#000000] rounded-lg">
                Delte account</button>
        </form>
    </div>

@endsection
