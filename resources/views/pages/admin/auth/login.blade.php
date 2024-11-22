@extends('layouts.admin.auth.index')

@section('metaTitle', 'Login - oooHotels Admin')

@section('content')
    <form method="post" action="{{ route('admin.login.store') }}" class="flex-1 max-w-sm p-5 border rounded-lg shadow-lg">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email
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
                Password
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
        <div class="mt-3 space-x-3">
            <button type='submit'
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                Login
            </button>

            <a href="{{ route('admin.register.index') }}" class="text-sm">Register</a>

        </div>
    </form>
@endsection
