@extends('layouts.admin.index')

@section('metaTitle', $customerUser->full_name)

@section('content')


    @if ($errors->any())
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-red-200 text-red-900">
            Please check those field errors..
        </div>
    @endif


    @if (session()->has('success-message'))
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-green-200 text-green-900">
            {{ session()->get('success-message') }}
        </div>
    @endif



    <form action="{{ route('admin.users.update', $customerUser->id) }}" method="POST"
        class="max-w-[86rem] mt-5 mx-auto grid gap-5 grid-cols-1 lg:grid-cols-11" enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="col-span-1 lg:col-span-11 border shadow-md px-5 py-2  rounded-lg">
            <div class="flex justify-between">
                <h4 class="text-lg">{{ $customerUser->full_name }}</h4>
                <button type="sumbit"
                    class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Save
                </button>
            </div>
        </div>
        {{-- ___General___ --}}
        <div class="col-span-1 lg:col-span-7 ">
            <div class="border shadow-md px-5 py-2 rounded-lg">


                <h4 class="text-lg border-b">General</h4>
                <div class="mt-5">
                    {{-- Full name --}}
                    <div>
                        <label for="username" class="block font-medium text-sm text-gray-700">
                            Username*
                        </label>
                        <input
                            class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                            type="text" name="username" value="{{ old('username', $customerUser->username) }}" required>

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                    <div>
                        <label for="name" class="block font-medium text-sm text-gray-700">
                            Full name
                        </label>
                        <input
                            class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                            type="text" name="name" value="{{ old('name', $customerUser->name) }}" required>

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('name') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">
                            Email
                        </label>
                        <input
                            class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                            type="email" name="email" value="{{ old('email', $customerUser->email) }}" required>

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>

                    {{-- Mobile Number --}}
                    <div>
                        <label for="mobile_number" class="block font-medium text-sm text-gray-700">
                            Mobile Number
                        </label>
                        <input
                            class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                            type="mobile_number" name="mobile_number"
                            value="{{ old('mobile_number', $customerUser->mobile_number) }}">

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('mobile_number') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>


                </div>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-4 ">
            {{-- ___Media___ --}}
            <div class="border shadow-md px-5 py-2 rounded-lg">
                <h4 class="text-lg border-b">Media</h4>


                <div class="mt-5">
                    <img srcset="@if ($customerUser->avatar) {{ $customerUser->avatar->getUrl() }} @else /demo/avatar.jpg @endif"
                        class="w-32 h-32 object-cover block mb-2 rounded-lg" />
                    <div>
                        <label for="avatar" class="block font-medium text-sm text-gray-700">
                            avatar
                        </label>
                        <input type="file" name="avatar" accept=".jpg, .jpeg"
                            class=" pt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('avatar') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </form>



@endsection
