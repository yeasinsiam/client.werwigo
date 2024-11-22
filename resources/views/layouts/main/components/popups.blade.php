{{-- Login Popup --}}

<div wire:ignore id="desktop-login-popup" data-authenticated="{{ auth('admin')->check() }}"
    class="w-screen h-screen  hidden fixed top-0 z-[999]
        overflow-y-scroll
        inset-0 bg-black/50 !p-0 !m-0">
    <div class="flex items-center justify-center w-full h-full">

        <div class="relative flex-1 max-w-lg">
            {{-- Desktop Close Button --}}
            <button
                class="handle-close  absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                <i class="text-white far fa-times"></i>
            </button>

            <form action="{{ route('login.store') }}" method="POST" class="w-full px-4 py-10 mx-auto bg-white rounded-lg"
                autocomplete="off">
                @csrf

                <h1 class="text-xl font-bold"> {{ __('Login') }} </h1>
                <p class="text-sm text-[#8C7379]"> {{ __('Welcome Back, Let Explore Vibes') }} </p>

                <div class="space-y-3 mt-7">
                    <div>
                        <input type="email"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                            placeholder=" {{ __('Email') }} " autocomplete="false" name="email"
                            value="{{ old('email') }}" />
                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div data-id="input-field-show-text">
                        <div class="relative">
                            <input type="password" name="password"
                                class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                                placeholder=" {{ __('Password') }} " autocomplete="false" />




                            <i data-id="show-text"
                                class="fas fa-eye absolute top-2/4 right-3 text-black [transform:translateY(-50%)]"></i>

                            {{-- <svg class="" width="20"
                            height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5799 12C15.5799 13.98 13.9799 15.58 11.9999 15.58C10.0199 15.58 8.41992 13.98 8.41992 12C8.41992 10.02 10.0199 8.42 11.9999 8.42C13.9799 8.42 15.5799 10.02 15.5799 12Z"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M11.9998 20.27C15.5298 20.27 18.8198 18.19 21.1098 14.59C22.0098 13.18 22.0098 10.81 21.1098 9.4C18.8198 5.8 15.5298 3.72 11.9998 3.72C8.46984 3.72 5.17984 5.8 2.88984 9.4C1.98984 10.81 1.98984 13.18 2.88984 14.59C5.17984 18.19 8.46984 20.27 11.9998 20.27Z"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg> --}}

                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-3">
                    {{-- <a href="#" class="text-sm font-semibold">Forgot Password?</a> --}}
                </div>

                <button type="submit"
                    class="block w-full px-2 py-3 mt-5 text-base bg-[#31020E] font-medium text-white rounded-lg">
                    {{ __('Login') }} </button>
                <div class="flex justify-center mt-5">
                    <p class="text-sm text-[#808080]"> {{ __("Don't have an account?") }}<a href="#"
                            data-id="register-btn" class="text-[#31020E] font-semibold"> {{ __('Signup here') }} </a>
                    </p>
                </div>
            </form>
        </div>

    </div>
</div>

{{-- register popup --}}
<div wire:ignore id="desktop-register-popup" data-authenticated="{{ auth('admin')->check() }}"
    class="w-screen h-screen  hidden fixed top-0 z-[999]
        overflow-y-scroll
        inset-0 bg-black/50 !p-0 !m-0">
    <div class="flex items-center justify-center w-full h-full">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="relative flex-1 max-w-lg">
            {{-- Desktop Close Button --}}
            <button
                class="handle-close  absolute -right-3 -top-3 w-[30px] h-[30px] bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                <i class="text-white far fa-times"></i>
            </button>

            <form action="{{ route('sign-up.store') }}" method="POST" class="px-4 bg-white rounded-lg py-7"
                autocomplete="off">
                @csrf

                <h1 class="text-xl font-bold">{{ __('Signup') }}</h1>
                <p class="text-sm text-[#8C7379]">{{ __('Start Explore your Vibes and Experience Love') }} </p>

                <div class="space-y-3 mt-7">
                    {{-- <div>
                        <label for="avatar" class="block text-sm  text-[#74737A]">
                            Profile Picture
                        </label>
                        <input type="file" name="avatar" accept=".jpg, .jpeg, .png"
                            class="block w-full pt-1 text-sm text-[#74737A] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-black hover:file:bg-gray-200 " />
                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('avatar') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <div>
                        <input type="text"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                            placeholder="{{ __('User Name') }}*" name="username" autocomplete="false"
                            value="{{ old('username') }}" />
                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <input type="text"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                            placeholder="{{ __('Full Name') }}*" name="name" autocomplete="false"
                            value="{{ old('name') }}" />
                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('name') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <input type="text"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                            placeholder="{{ __('Mobile') }}" name="mobile_number" autocomplete="false"
                            value="{{ old('mobile_number') }}" />
                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('mobile_number') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <input type="email"
                            class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
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
                                class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                                placeholder="Password*" name="password" autocomplete="false"
                                value="{{ old('password') }}" />


                            <i data-id="show-text"
                                class="fas fa-eye absolute top-2/4 right-3 text-black [transform:translateY(-50%)]"></i>

                            {{-- <svg class=" absolute top-2/4 right-3 text-black [transform:translateY(-50%)]" width="20"
                            height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5799 12C15.5799 13.98 13.9799 15.58 11.9999 15.58C10.0199 15.58 8.41992 13.98 8.41992 12C8.41992 10.02 10.0199 8.42 11.9999 8.42C13.9799 8.42 15.5799 10.02 15.5799 12Z"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M11.9998 20.27C15.5298 20.27 18.8198 18.19 21.1098 14.59C22.0098 13.18 22.0098 10.81 21.1098 9.4C18.8198 5.8 15.5298 3.72 11.9998 3.72C8.46984 3.72 5.17984 5.8 2.88984 9.4C1.98984 10.81 1.98984 13.18 2.88984 14.59C5.17984 18.19 8.46984 20.27 11.9998 20.27Z"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg> --}}
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
                                class="border px-3 py-4 placeholder:text-[#74737A] text-sm  rounded-lg w-full focus:outline focus:outline-black"
                                placeholder="{{ __('Confirm Password') }}*" name="password_confirmation"
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
                    class="block w-full px-2 py-3 mt-5 text-base bg-[#31020E] font-medium text-white rounded-lg">{{ __('Signup') }}</button>
                <div class="flex justify-center mt-5">
                    <p class="text-sm text-[#808080]">{{ __('Already have an account?') }} <a href="#"
                            data-id="login-btn" class="text-[#31020E] font-semibold">{{ __('Login here') }}</a></p>
                </div>
            </form>
        </div>

    </div>
</div>
