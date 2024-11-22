@extends('layouts.admin.auth.index')

@section('metaTitle', 'Register - oooHotels Admin')

@section('content')
    <form method="post" action="{{ route('admin.register.store') }}" class="flex-1 max-w-sm p-5 border rounded-lg shadow-lg"
        enctype="multipart/form-data">
        @csrf

        <div>
            <div>
                <label for="avatar" class="block text-sm font-medium text-gray-700">
                    Profile Picture
                </label>
                <input type="file" name="avatar" accept=".jpg, .jpeg, .png"
                    class="block w-full pt-1 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />

                <ul class='mt-2 space-y-1 text-sm text-red-600'>
                    @foreach ($errors->get('avatar') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>

            </div>
        </div>

        <div class="mt-2">
            <label for="username" class="block text-sm font-medium text-gray-700">
                User Name*
            </label>

            <input
                class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                type="text" name="username" value="{{ old('username') }}" required>

            <ul class='space-y-1 text-sm text-red-600 mt-w'>
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>

        </div>
        <div class="mt-2">
            <label for="name" class="block text-sm font-medium text-gray-700">
                Full Name*
            </label>

            <input
                class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                type="text" name="name" value="{{ old('name') }}" required>

            <ul class='space-y-1 text-sm text-red-600 mt-w'>
                @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>

        </div>
        <div class="mt-2">
            <label for="mobile_number" class="block text-sm font-medium text-gray-700">
                Mobile Number
            </label>

            <input
                class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                type="text" name="mobile_number" value="{{ old('mobile_number') }}">

            <ul class='space-y-1 text-sm text-red-600 mt-w'>
                @foreach ($errors->get('mobile_number') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>

        </div>
        <div class="mt-2">
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email*
            </label>

            <input
                class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                type="email" name="email" value="{{ old('email') }}" required>

            <ul class='space-y-1 text-sm text-red-600 mt-w'>
                @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>

        </div>
        <div class="mt-2">
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password*
            </label>

            <input
                class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                type="password" name="password" value="{{ old('password') }}" required>

            <ul class='space-y-1 text-sm text-red-600 mt-w'>
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        <div class="mt-2">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                Confirm Password*
            </label>

            <input
                class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>

            <ul class='space-y-1 text-sm text-red-600 mt-w'>
                @foreach ($errors->get('password_confirmation') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>


        <div class="mt-3 space-x-3">
            <button type='submit'
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                Register
            </button>

            <a href="{{ route('admin.login.index') }}" class="text-sm">{{ __('Login') }}</a>


        </div>
    </form>
@endsection
