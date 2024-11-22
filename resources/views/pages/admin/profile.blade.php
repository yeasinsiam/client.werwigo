@extends('layouts.admin.index')

@section('metaTitle', 'Profile')


@section('content')




    @if ($errors->any())
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-red-200 text-red-900">
            Please check those field errors..
        </div>
    @endif



    <form action="{{ route('admin.profile.update') }}" method="POST"
        class="grid grid-cols-1 gap-5 mx-auto mt-5 max-w-[86rem] lg:grid-cols-11" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        @method('PUT')


        <div class="col-span-1 px-5 py-2 border rounded-lg shadow-md lg:col-span-11">
            <div class="flex justify-between">
                <h4 class="text-lg"> {{ __('Edit Profile') }} </h4>
                <button type="sumbit"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                    {{ __('Update') }}
                </button>
            </div>
        </div>
        {{-- ___General___ --}}
        <div class="col-span-1 lg:col-span-11">

            @if (session()->has('success-message'))
                <div class="max-w-[86rem] mt-5 mb-2 mx-auto px-5 py-3 rounded-lg bg-green-200 text-green-900">
                    {{ session()->get('success-message') }}
                </div>
            @endif

            <div class="grid grid-cols-12 px-5 py-2 border rounded-lg shadow-md">
                <div class="col-span-12 lg:col-span-3">
                    <div>
                        <img srcset="{{ $profile->avatar->getUrl() }}"
                            class="block object-cover mb-2 rounded-lg w-28 h-28" />
                        <div>
                            <label for="avatar" class="block text-sm font-medium text-gray-700">
                                {{ __('Profile Picture') }}
                            </label>
                            <input type="file" name="avatar" placeholder="sdf"
                                class="block w-full pt-1 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />

                            <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                @foreach ($errors->get('avatar') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-9">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">
                            {{ __('User Name') }}
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="username" value="{{ old('username', $profile->username) }}" required>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            {{ __('Full Name') }}
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="name" value="{{ old('name', $profile->name) }}" required>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('name') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="mt-3">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">
                            {{ __('') }} Mobile
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="mobile_number"
                            value="{{ old('mobile_number', $profile->mobile_number) }}">

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('mobile_number') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="mt-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            {{ __('') }} Email
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="email" name="email" value="{{ old('email', $profile->email) }}" required>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="mt-5">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="password" name="password" value="{{ old('password') }}"
                            placeholder="Empty Password fields won't change password" autocomplete="off">

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="mt-3">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            {{ __('Confirm Password') }}
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation', $profile->password_confirmation) }}" autocomplete="off">

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('password_confirmation') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>
        </div>



    </form>
@endsection
{{-- @push('footer')
    <script>
        jQuery("[type='file']").text("TEXT Choose file");
        jQuery("[type='file']").text("TEXT No file chosen");
    </script>
@endpush --}}
