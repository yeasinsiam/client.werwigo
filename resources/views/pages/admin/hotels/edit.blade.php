@extends('layouts.admin.index')

@section('metaTitle', $hotel->headline)

@section('content')
    @role('super-admin')
        <div class="px-5 py-2 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
            <ul class="flex flex-col gap-3 lg:flex-row">

                <li>
                    <a href="{{ route('admin.hotels.index') }}" @class([
                        'text-[#000000]' => request()->routeIs('admin.hotels.*'),
                        'hover:underline',
                    ])>Listing</a>
                </li>
                <li>
                    <a href="{{ route('admin.hotel-categories.index') }}" @class([
                        'text-[#000000]' => request()->routeIs('admin.hotel-categories.*'),
                        'hover:underline',
                    ])>Categories</a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.hotel-tags.index') }}" @class([
                        'text-[#000000]' => request()->routeIs('admin.hotel-tags.*'),
                        'hover:underline',
                    ])>Tags</a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('admin.hotel-services.index') }}" @class([
                        'text-[#000000]' => request()->routeIs('admin.hotel-services.*'),
                        'hover:underline',
                    ])>Services</a>
                </li> --}}
            </ul>
        </div>
    @endrole

    @if ($errors->any())
        <div class="px-5 py-3 mx-auto mt-5 text-red-900 bg-red-200 rounded-lg max-w-[86rem]">
            {{ __('Please check those field errors') }}..
        </div>
    @endif

    @if (session()->has('success-message'))
        <div class="max-w-[86rem] mt-5 mb-2 mx-auto px-5 py-3 rounded-lg bg-green-200 text-green-900">
            {{ session()->get('success-message') }}
        </div>
    @endif


    <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST"
        class="grid grid-cols-1 gap-5 mx-auto mt-5 max-w-[86rem] lg:grid-cols-11" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="col-span-1 px-5 py-2 border rounded-lg shadow-md lg:col-span-11">
            <div class="flex justify-between">
                <h4 class="text-lg">{{ $hotel->headline }}</h4>
                <button type="sumbit"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                    {{ __('Save') }}
                </button>
            </div>
        </div>

        {{-- ___Google ___ --}}
        <div class="col-span-1 lg:col-span-11 ">
            <div class="px-5 py-2 border rounded-lg shadow-md">


                <div class="mt-5">


                    <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">


                        <div class="flex-1">
                            <input id="location-input"
                                class="w-full mt-1 mb-3 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock"
                                type="text" placeholder="{{ __('Enter a location') }}" />
                            <div id="map" class="w-full rounded-lg h-96"></div>
                            <div id="selected-result"></div>
                            <input type="hidden" id="place-id-input" name="place_id" />
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 ">
                                <div class="hidden col-span-2">
                                    <label for="google_place_id" class="block text-sm font-medium text-gray-700">
                                        Google place ID
                                    </label>
                                    <input id="google_place_id-field"
                                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                                        type="text" name="google_place_id"
                                        value="{{ old('google_place_id', $hotel->parentHotel->google_place_id) }}" required
                                        readonly>

                                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                        @foreach ($errors->get('google_place_id') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- Title --}}
                                <div class="col-span-2">
                                    <label for="title" class="block col-span-2 text-sm font-medium text-gray-700">
                                        {{ __('Title') }}
                                    </label>
                                    <input id="title-field"
                                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                                        type="text" name="title"
                                        value="{{ old('title', $hotel->parentHotel->title) }}" required readonly>

                                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                        @foreach ($errors->get('title') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>

                                </div>

                                {{-- Address --}}
                                <div class="relative col-span-2" id="address-field-wrapper">
                                    <label for="address" class="block text-sm font-medium text-gray-700">
                                        {{ __('Address') }}
                                    </label>
                                    <input id="address-field"
                                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                                        type="text" name="address"
                                        value="{{ old('address', $hotel->parentHotel->address) }}" required readonly
                                        autocomplete="off">

                                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                        @foreach ($errors->get('address') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>

                                    {{-- <div data-id="address-suggestion" class="absolute z-40 hidden w-full pt-1 top-full">
                                <ul class="p-2 bg-white border rounded-lg shadow-lg " tabindex="-1">
                                    {{-- <li class="text-sm text-[#5B5B5B] py-1 px-2 hover:underline" tabindex="-1">Rokon</li> --}}
                                    </ul>
                                </div>
                                {{-- City and Country --}}
                                <div class="relative col-span-2" id="city-country-field-wrapper">
                                    <label for="city-country-field" class="block text-sm font-medium text-gray-700">
                                        {{ __('City And Country') }}
                                    </label>
                                    <input id="city-country-field"
                                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                                        type="text" name="city_country"
                                        value="{{ old('city_country', $hotel->parentHotel->city_country) }}" required
                                        readonly autocomplete="off">

                                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                        @foreach ($errors->get('city_country') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>


                                    </ul>
                                </div>

                                {{--  Google Rating --}}
                                <div class="relative" id="google_rating-field-wrapper">
                                    <label for="google_rating" class="block text-sm font-medium text-gray-700">
                                        {{ __('Google Rating') }}
                                    </label>
                                    <input id="google_rating-field"
                                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                                        type="text" name="google_rating"
                                        value="{{ old('google_rating', $hotel->parentHotel->google_rating) }}" required
                                        autocomplete="off" readonly>

                                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                        @foreach ($errors->get('google_rating') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>

                                </div>
                                {{--  Google total reviews --}}
                                <div class="relative" id="google_total_reviews-field-wrapper">
                                    <label for="google_total_reviews" class="block text-sm font-medium text-gray-700">
                                        {{ __('Google total reviews') }}
                                    </label>
                                    <input id="google_total_reviews-field"
                                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                                        type="text" name="google_total_reviews"
                                        value="{{ old('google_total_reviews', $hotel->parentHotel->google_total_reviews) }}"
                                        required autocomplete="off" readonly>

                                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                        @foreach ($errors->get('google_total_reviews') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- ___General___ --}}
        <div class="col-span-1 lg:col-span-7 ">
            <div class="px-5 py-2 border rounded-lg shadow-md">




                {{-- Headline --}}
                <div>
                    <label for="headline" class="block text-sm font-medium text-gray-700">
                        {{ __('Headline') }}
                    </label>
                    <input id="headline-field"
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="headline" value="{{ old('headline', $hotel->headline) }}" required />

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('headline') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>


                {{-- <h4 class="text-lg border-b">General</h4> --}}
                <div class="mt-5">


                    {{-- Excerpt --}}
                    {{-- <div class="mt-3">
                        <label for="excerpt" class="block text-sm font-medium text-gray-700">
                            Excerpt
                        </label>

                        <textarea
                            class='w-full p-1 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="excerpt" rows="3">{{ old('excerpt', $hotel->excerpt) }}</textarea>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('excerpt') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div> --}}

                    {{-- Description --}}
                    <div class="mt-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            {{ __('Description') }}
                        </label>

                        <textarea
                            class='w-full p-1 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="description" rows="10">{{ old('description', $hotel->description) }}</textarea>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('description') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>




                </div>
            </div>
            {{-- ___Category___ --}}
            <div class="px-5 py-2 mt-5 border rounded-lg shadow-md ">
                <h4 class="text-lg border-b"> {{ __('Category') }} </h4>
                <div class="mt-3">

                    <ul class='mb-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('categories') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                    <ul class="space-y-1">
                        @foreach ($categories as $category)
                            <li class="flex items-center gap-2">
                                <label class='block w-full'> <input
                                        class='border-gray-300 rounded-md shadow-sm form-checkbox focus:border-indigo-500 focus:ring-indigo-500 lock '
                                        type="checkbox" name="categories[]" value='{{ $category->id }}'
                                        @checked(in_array($category->id, old('categories', $hotel->categories->pluck('id')->toArray())))>
                                    <span>{{ $category->title }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            {{-- __Tags___ --}}
            <div class="px-5 py-2 mt-5 border rounded-lg shadow-md">
                <h4 class="text-lg border-b"> {{ __('Tags') }} </h4>
                <div class="mt-3">
                    <div class="relative">
                        <input id="tags-input" name="tags"
                            value="{{ old('tags', $hotel->tags->pluck('title')->implode(',')) }}"
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm tag-input form-input focus:border-indigo-500 focus:ring-indigo-500 lock"
                            type="text" placeholder="Enter tags">
                    </div>

                    <ul class='mb-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('tags') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                    {{--    <ul class="space-y-1">
                        @foreach ($tags as $tag)
                            <li class="flex items-center gap-2">
                                <label class='block w-full'> <input
                                        class='border-gray-300 rounded-md shadow-sm form-checkbox focus:border-indigo-500 focus:ring-indigo-500 lock '
                                        type="checkbox" name="tags[]" value='{{ $tag->id }}'
                                        @checked(in_array($tag->id, old('tags', $hotel->tags->pluck('id')->toArray())))>
                                    <span>{{ $tag->title }}</span>
                                </label>
                            </li>
                        @endforeach

                    </ul> --}}
                </div>

            </div>

        </div>

        <div class="col-span-1 lg:col-span-4 ">
            {{-- ___Media___ --}}
            <div class="px-5 py-2 border rounded-lg shadow-md">
                <h4 class="text-lg border-b"> {{ __('Media') }} </h4>


                <div class="mt-5">
                    <img srcset="{{ $hotel->thumbnail->getSrcset() }}"
                        class="block object-cover mb-2 rounded-lg w-52 h-52" />
                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">
                            {{ __('Thumbnail') }}
                        </label>
                        <input type="file" name="thumbnail" accept=".jpg, .jpeg"
                            class="block w-full pt-1 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('thumbnail') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <div class="mt-5">
                    <div class="mt-5">

                        <livewire:admin.pages.hotels.edit.manage-hotel-gallery :hotel="$hotel" />

                        <label for="gallery" class="block text-sm font-medium text-gray-700">
                            {{ __('Gallery') }}
                        </label>
                        <input type="file" name="gallery[]" accept=".jpg, .jpeg" multiple
                            class="block w-full pt-1 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('gallery') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

            {{-- ___Meta___ --}}
            <div class="px-5 py-2 mt-5 border rounded-lg shadow-md">
                <h4 class="text-lg border-b">Meta</h4>
                {{-- Slug --}}
                <div class="mt-3">
                    <label for="slug" class="block text-sm font-medium text-gray-700">
                        Slug
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="slug" value="{{ old('slug', $hotel->slug) }}">

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('slug') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>



        </div>

    </form>


    <div class='px-5 py-2 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]'>
        {{-- Rattings --}}
        <h4 class="text-lg border-b"> {{ __('Rating') }} </h4>
        <form action="{{ route('admin.hotel-ratings.store', ['hotel' => $hotel->id, 'type' => 'romantic']) }}"
            class="col-span-12 mt-3 " method="POST">

            @csrf
            <div class="flex flex-col gap-3 lg:flex-row">
                {{-- Romantic --}}
                <div>
                    <label for="romantic" class="block text-sm font-medium text-gray-700">
                        {{ __('Romantic') }}
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="romantic" value="{{ old('rate') }}"
                        placeholder="{{ __('Enter Score') }}" required>


                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('romantic') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>
                {{-- Intimate --}}

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('Intimate') }}
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="intimate" value="{{ old('intimate') }}"
                        placeholder="{{ __('Enter Score') }}" required>


                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('intimate') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>
                {{-- Luxury --}}

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('Luxurious') }}
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="luxury" value="{{ old('luxury') }}"
                        placeholder="{{ __('Enter Score') }}" required>


                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('luxury') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>

                {{-- Date --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('Date') }}
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm date-picker form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="created_at" value="{{ old('created_at') }}" required>


                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('created_at') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>

            {{-- opinion  --}}
            <div class="mt-3">
                <label for="opinion " class="block text-sm font-medium text-gray-700">
                    {{ __('Opinion') }}
                </label>

                <textarea
                    class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:border-indigo-500 focus:ring-indigo-500 lock'
                    type="text" name="opinion" rows="3" required>{{ old('opinion ') }}</textarea>

                <ul class='mt-2 space-y-1 text-sm text-red-600'>
                    @foreach ($errors->get('opinion ') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>

            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ __('Create') }}
            </button>



        </form>





        <div class="grid grid-cols-12">
            <div class="flex flex-col col-span-12 gap-3 mt-3 lg:flex-row ">
                {{-- Romantic --}}
                <div class="mt-5 bg-white ">
                    <h2 class='mb-2'> {{ __('Romantic') }} </h2>
                    <div class="overflow-x-auto border-t border-x">
                        <table class="w-full table-auto">
                            <thead class="border-b">
                                <tr class="bg-gray-100">
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Date') }} <span class="text-xs whitespace-nowrap">( {{ __('Total') }}
                                            :
                                            {{ $rating_romantic_total }})</span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Rate') }} <span class="text-xs whitespace-nowrap">(Avg:
                                            {{ $hotel->parentHotel->getRomanticRating() }})</span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rating_romantic as $romantic)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-4">
                                            {{ $romantic->created_at->format('d M,Y') }}
                                            @if ($authAdmin->id != $romantic->admin_id)
                                                <sub class="font-bold text-blue-500">{{ $romantic->admin->name }}</sub>
                                            @endif
                                        </td>
                                        <td class="p-4 ">
                                            {{ $romantic->rate }}
                                        </td>

                                        <td class="p-4">
                                            {{-- <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                                        Edit
                                                    </a> --}}
                                            @if ($romantic->admin_id == $authAdmin->id || $authAdmin->hasRole('super-admin'))
                                                <form action="{{ route('admin.hotel-ratings.delete', $romantic->id) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf @method('DELETE')
                                                    <button type='submit'
                                                        onclick="return confirm('Are you sure going to delete this ?')"
                                                        class='inline-flex items-center px-3 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-[9px] text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                                        {{ __('Delete') }}
                                                    </button>
                                            @endif
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $rating_romantic->links() }}
                    </div>
                </div>

                {{-- Intimate --}}
                <div class="mt-5 bg-white ">
                    <h2 class='mb-2'> {{ __('Intimate') }}</h2>

                    <div class="overflow-x-auto border-t border-x">
                        <table class="w-full table-auto">
                            <thead class="border-b">
                                <tr class="bg-gray-100">
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Date') }} <span class="text-xs whitespace-nowrap">( {{ __('Total') }}
                                            :
                                            {{ $rating_intimate_total }})</span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Rate') }} <span class="text-xs whitespace-nowrap">(Avg:
                                            {{ $hotel->parentHotel->getIntimateRating() }})</span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rating_intimate as $intimate)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-4">
                                            {{ $intimate->created_at->format('d M,Y') }}
                                            @if ($authAdmin->id != $intimate->admin_id)
                                                <sub class="font-bold text-blue-500">{{ $intimate->admin->name }}</sub>
                                            @endif
                                        </td>
                                        <td class="p-4 ">
                                            {{ $intimate->rate }}
                                        </td>
                                        <td class="p-4">
                                            {{-- <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                                        Edit
                                                    </a> --}}
                                            @if ($intimate->admin_id == $authAdmin->id || $authAdmin->hasRole('super-admin'))
                                                <form action="{{ route('admin.hotel-ratings.delete', $intimate->id) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf @method('DELETE')
                                                    <button type='submit'
                                                        onclick="return confirm('Are you sure going to delete this ?')"
                                                        class='inline-flex items-center px-3 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-[9px] text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                                        {{ __('Delete') }}
                                                    </button>

                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $rating_romantic->links() }}
                    </div>
                </div>

                {{-- Luxury --}}
                <div class="mt-5 bg-white ">
                    <h2 class='mb-2'>{{ __('Luxurious') }}</h2>
                    <div class="overflow-x-auto border-t border-x">
                        <table class="w-full table-auto">
                            <thead class="border-b">
                                <tr class="bg-gray-100">
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Date') }} <span class="text-xs whitespace-nowrap">( {{ __('Total') }}
                                            :
                                            {{ $rating_luxury_total }})</span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Rate') }} <span class="text-xs whitespace-nowrap">(Avg:
                                            {{ $hotel->parentHotel->getLuxuryRating() }})</span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rating_luxury as $luxury)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-4">
                                            {{ $luxury->created_at->format('d M,Y') }}
                                            @if ($authAdmin->id != $luxury->admin_id)
                                                <sub class="font-bold text-blue-500">{{ $luxury->admin->name }}</sub>
                                            @endif
                                        </td>
                                        <td class="p-4 ">
                                            {{ $luxury->rate }}
                                        </td>
                                        <td class="p-4">
                                            {{-- <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                                        Edit
                                                    </a> --}}
                                            @if ($luxury->admin_id == $authAdmin->id || $authAdmin->hasRole('super-admin'))
                                                <form action="{{ route('admin.hotel-ratings.delete', $luxury->id) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf @method('DELETE')
                                                    <button type='submit'
                                                        onclick="return confirm('Are you sure going to delete this ?')"
                                                        class='inline-flex items-center px-3 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-[9px] text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                                        {{ __('Delete') }}
                                                    </button>

                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $rating_romantic->links() }}
                    </div>
                </div>
            </div>
            <div class="col-span-12 ">
                {{-- opinions --}}
                <div class="mt-5 bg-white ">
                    <h2 class='mb-2'> {{ __('') }} Opinions</h2>
                    <div class="overflow-x-auto border-t border-x">
                        <table class="w-full table-auto">
                            <thead class="border-b">
                                <tr class="bg-gray-100">
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Comment') }} </span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Date') }} </span>
                                    </th>
                                    <th class="p-4 font-medium text-left">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hotel->parentHotel->opinions()->with('admin')->latest('id')->get() as $opinion)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-4">
                                            {{ $opinion->comment }}
                                        </td>
                                        <td class="p-4 ">
                                            {{ $opinion->created_at->format('d M,Y') }}
                                            @if ($authAdmin->id != $opinion->admin_id)
                                                <sub class="font-bold text-blue-500">{{ $opinion->admin->name }}</sub>
                                            @endif
                                        </td>
                                        <td class="p-4">
                                            {{-- <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                                        Edit
                                                    </a> --}}
                                            @if ($opinion->admin_id == $authAdmin->id || $authAdmin->hasRole('super-admin'))
                                                <form action="{{ route('admin.hotel-opinions.delete', $opinion->id) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf @method('DELETE')
                                                    <button type='submit'
                                                        onclick="return confirm('Are you sure going to delete this ?')"
                                                        class='inline-flex items-center px-3 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-[9px] text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                                        {{ __('Delete') }}
                                                    </button>

                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="mt-5">
                        {{ $rating_romantic->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


@endsection

@push('header')
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
    <!-- jQuery UI CSS -->
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css"> --}}
    <style>
        /**
                                                                                                                                                                                                                                                                                                                                                                                     * Tagator jQuery Plugin
                                                                                                                                                                                                                                                                                                                                                                                     * A plugin to make input elements, tag holders
                                                                                                                                                                                                                                                                                                                                                                                     * version 1.0, Jan 13th, 2014
                                                                                                                                                                                                                                                                                                                                                                                     * by Ingi á Steinamørk
                                                                                                                                                                                                                                                                                                                                                                                     */

        /* reset */
        .tagator_element * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            text-decoration: none;
        }

        /* dimmer */
        #tagator_dimmer {
            background-color: rgba(0, 0, 0, .1);
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 100;

        }

        /* Main box */
        .tagator_element {
            border: 1px solid #abadb3;
            border-radius: 3px;
            box-sizing: border-box;
            background-color: #fff;
            display: inline-block;
            text-decoration: none;
        }

        .tagator_element.options-visible {
            position: relative;
            z-index: 101;
        }

        /* placeholder */
        .tagator_placeholder {
            position: absolute;
            color: #999;
            left: 4px;
            top: 4px;
            font-size: 13px;
        }

        /* chosen items holder */
        .tagator_tags {
            display: inline;
        }

        /* chosen item */
        .tagator_tag {
            display: inline-block;
            background-color: black;
            border-radius: 2px;
            color: #fff;
            padding: 2px 20px 2px 4px;
            font-size: 13px;
            margin: 2px;
            position: relative;
            vertical-align: top;
        }

        /* chosen item remove button */
        .tagator_tag_remove {
            display: inline-block;
            font-weight: bold;
            color: #fff;
            margin: 0 0 0 5px;
            padding: 6px 5px 4px 5px;
            cursor: pointer;
            font-size: 11px;
            line-height: 10px;
            vertical-align: top;
            border-radius: 0 2px 2px 0;
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
        }

        .tagator_tag_remove:hover {
            color: #000;
            background-color: lightgray;
        }

        /* input box */
        .tagator_input,
        .tagator_textlength {
            border: 0;
            display: inline-block;
            margin: 0;
            background-color: transparent;
            font-size: 13px;
            outline: none;
            padding: 4px 0 0 5px;
            position: relative;
            z-index: 1;
        }

        .tagator_input {
            /*padding: 0px 0px;*/
        }

        /* options holder */
        .tagator_options {
            margin: 0;
            padding: 0;
            border: 1px solid #7f9db9;
            border-radius: 0 0 3px 3px;
            font-family: sans-serif;
            position: absolute;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            z-index: 101;
            background-color: #fff;
            overflow: auto;
            max-height: 250px;
            list-style: none;
            left: -1px;
            right: -1px;
        }

        .tagator_element.options-hidden .tagator_options {
            display: none;
        }

        /* result item */
        .tagator_option {
            padding: 5px;
            cursor: pointer;
            color: #000;
        }

        .tagator_option.active {
            background-color: black;
            color: #fff;
        }
    </style>
@endpush

@push('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://unpkg.com/js-datepicker"></script>
    <script>
        document.querySelectorAll('.date-picker').forEach((e) => {
            const picker = datepicker(e, {
                formatter: (input, date, instance) => {
                    const value = moment(date).format('DD MMM,YYYY')
                    input.value = value
                }
            });
        })
    </script>
@endpush



@push('footer')
    <!-- jQuery UI library -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="//cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>

    <script>
        // Initialize the Google Places service and the Autocomplete service
        const placesService = new google.maps.places.PlacesService(
            document.createElement("div")
        );
        const autocompleteService = new google.maps.places.AutocompleteService();

        // Create the map
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 0,
                lng: 0
            },
            zoom: 2,
        });

        // Create the marker for the selected place
        const marker = new google.maps.Marker({
            map: map,
        });

        // Create the info window to display place details
        const infoWindow = new google.maps.InfoWindow();

        // Create the autocomplete search field
        const autocompleteInput = document.getElementById("location-input");
        const autocomplete = new google.maps.places.Autocomplete(
            autocompleteInput,

            // {
            //     fields: ['geometry', 'place_id', "name", "formatted_address", 'rating', 'user_ratings_total']
            // }
        );

        // Set the fields to be retrieved for the selected place
        // autocomplete.setFields(['geometry', 'place_id', "name", "formatted_address", 'rating', 'user_ratings_total']);

        // Handle place selection from autocomplete suggestions
        autocomplete.addListener("place_changed", function() {
            const place = autocomplete.getPlace();


            if (!place.geometry) {
                window.alert("No details available for the selected place.");
                return;
            }

            // Set the map center and marker position to the selected place
            map.setCenter(place.geometry.location);
            marker.setPosition(place.geometry.location);

            // Open the info window with the place details
            const content = `
    <strong>${place.name}</strong><br>
    ${place.formatted_address}
  `;
            infoWindow.setContent(content);
            infoWindow.open(map, marker);


            // Retrieve the locality and country from the address components
            let locality = '';
            let country = '';
            place.address_components.forEach(component => {
                if (component.types.includes('locality')) {
                    locality = component.long_name;
                } else if (component.types.includes('administrative_area_level_1')) {
                    locality = component.long_name;
                } else if (component.types.includes('country')) {
                    country = component.long_name;
                }
            });

            // console.log({
            //     place_id: place.place_id,
            //     name: place.name,
            //     formatted_address: place.formatted_address,
            //     rating: place.rating,
            //     user_ratings_total: place.user_ratings_total,

            // });
            const googlePlaceIdFindInput = $('#google_place_id-field');
            const titleInput = $('#title-field')
            const addressInput = $('#address-field')
            const cityAndCountryInput = $('#city-country-field')
            const googleRatingInput = $('#google_rating-field')
            const googleTotalReviewsInput = $('#google_total_reviews-field')


            googlePlaceIdFindInput.val(place.place_id)
            titleInput.val(place.name)
            addressInput.val(place.formatted_address)
            cityAndCountryInput.val(`${locality}, ${country}`)
            googleRatingInput.val(place.rating)
            googleTotalReviewsInput.val(place.user_ratings_total)

        });
    </script>



    {{-- Tagator --}}
    <script>
        /*
                                                                                                                                                                                                                                                                                                                                                                         Tagator jQuery Plugin
                                                                                                                                                                                                                                                                                                                                                                         A plugin to make input elements, tag holders
                                                                                                                                                                                                                                                                                                                                                                         version 1.2, Aug 9th, 2016
                                                                                                                                                                                                                                                                                                                                                                         by Ingi á Steinamørk

                                                                                                                                                                                                                                                                                                                                                                         The MIT License (MIT)

                                                                                                                                                                                                                                                                                                                                                                         Copyright (c) 2014 Qodio

                                                                                                                                                                                                                                                                                                                                                                         Permission is hereby granted, free of charge, to any person obtaining a copy of
                                                                                                                                                                                                                                                                                                                                                                         this software and associated documentation files (the "Software"), to deal in
                                                                                                                                                                                                                                                                                                                                                                         the Software without restriction, including without limitation the rights to
                                                                                                                                                                                                                                                                                                                                                                         use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
                                                                                                                                                                                                                                                                                                                                                                         the Software, and to permit persons to whom the Software is furnished to do so,
                                                                                                                                                                                                                                                                                                                                                                         subject to the following conditions:

                                                                                                                                                                                                                                                                                                                                                                         The above copyright notice and this permission notice shall be included in all
                                                                                                                                                                                                                                                                                                                                                                         copies or substantial portions of the Software.

                                                                                                                                                                                                                                                                                                                                                                         THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                                                                                                                                                                                                                                                                                                                                                                         IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
                                                                                                                                                                                                                                                                                                                                                                         FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
                                                                                                                                                                                                                                                                                                                                                                         COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
                                                                                                                                                                                                                                                                                                                                                                         IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
                                                                                                                                                                                                                                                                                                                                                                         CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
                                                                                                                                                                                                                                                                                                                                                                         */

        (function($) {
            $.tagator = function(source_element, options) {
                var defaults = {
                    prefix: 'tagator_',
                    height: 'auto',
                    useDimmer: false,
                    showAllOptionsOnFocus: false,
                    allowAutocompleteOnly: false,
                    autocomplete: []
                };

                var self = this;
                var selected_index = -1;
                var $source_element = $(source_element);
                var $tagator_element = null;
                var $tags_element = null;
                var $placeholder_element = null;
                var $input_element = null;
                var $textlength_element = null;
                var $options_element = null;
                var key = {
                    backspace: 8,
                    enter: 13,
                    escape: 27,
                    left: 37,
                    up: 38,
                    right: 39,
                    down: 40,
                    comma: 188
                };
                self.settings = {};


                // INITIALIZE PLUGIN
                self.init = function() {
                    self.settings = $.extend({}, defaults, options);

                    //// ================== CREATE ELEMENTS ================== ////
                    // dimmer
                    if (self.settings.useDimmer) {
                        if ($('#' + self.settings.prefix + 'dimmer').length === 0) {
                            var $dimmer_element = $(document.createElement('div'));
                            $dimmer_element.attr('id', self.settings.prefix + 'dimmer');
                            $dimmer_element.hide();
                            $(document.body).prepend($dimmer_element);
                        }
                    }
                    // box element
                    $tagator_element = $(document.createElement('div'));
                    if ($source_element[0].id !== undefined) {
                        $tagator_element.attr('id', self.settings.prefix + $source_element[0].id);
                    }
                    $tagator_element.addClass(self.settings.prefix + 'element options-hidden');
                    $tagator_element.css({
                        padding: $source_element.css('padding'),
                        'flex-grow': $source_element.css('flex-grow'),
                        position: 'relative'
                    });
                    if (parseInt($source_element.css('width')) !== 0) {
                        $tagator_element.css({
                            width: $source_element.css('width')
                        });
                    }
                    if (self.settings.height === 'element') {
                        $tagator_element.css({
                            height: $source_element.outerHeight + 'px'
                        });
                    }
                    $source_element.after($tagator_element);
                    $source_element.hide();
                    // textlength element
                    $textlength_element = $(document.createElement('span'));
                    $textlength_element.addClass(self.settings.prefix + 'textlength');
                    $textlength_element.css({
                        position: 'absolute',
                        visibility: 'hidden'
                    });
                    $tagator_element.append($textlength_element);
                    // tags element
                    $tags_element = $(document.createElement('div'));
                    $tags_element.addClass(self.settings.prefix + 'tags');
                    $tagator_element.append($tags_element);
                    // placeholder element
                    $placeholder_element = $(document.createElement('div'));
                    $placeholder_element.addClass(self.settings.prefix + 'placeholder');
                    $tagator_element.append($placeholder_element);
                    // input element
                    $input_element = $(document.createElement('input'));
                    $input_element.addClass(self.settings.prefix + 'input');
                    $input_element.width(20);
                    $input_element.attr('autocomplete', 'false');
                    $tagator_element.append($input_element);
                    // options element
                    $options_element = $(document.createElement('ul'));
                    $options_element.addClass(self.settings.prefix + 'options');

                    $tagator_element.append($options_element);

                    //// ================== BIND ELEMENTS EVENTS ================== ////
                    // source element
                    $source_element.change(function() {
                        refreshTags();
                    });
                    // box element
                    $tagator_element.bind('focus', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        showOptions();
                        $input_element.focus();
                    });
                    $tagator_element.bind('mousedown', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        $input_element.focus();
                        if ($input_element[0].setSelectionRange) {
                            $input_element.focus();
                            $input_element[0].setSelectionRange($input_element.val().length,
                                $input_element.val().length);
                        } else if ($input_element[0].createTextRange) {
                            var range = $input_element[0].createTextRange();
                            range.collapse(true);
                            range.moveEnd('character', $input_element.val().length);
                            range.moveStart('character', $input_element.val().length);
                            range.select();
                        }
                    });
                    $tagator_element.bind('mouseup', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                    $tagator_element.bind('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (self.settings.showAllOptionsOnFocus) {
                            //showOptions();
                            searchOptions();
                        }
                        $input_element.focus();
                    });
                    $tagator_element.bind('dblclick', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        $input_element.focus();
                        $input_element.select();
                    });
                    // input element
                    $input_element.bind('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                    $input_element.bind('dblclick', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                    $input_element.bind('keydown', function(e) {
                        e.stopPropagation();
                        var keyCode = e.keyCode || e.which;
                        switch (keyCode) {
                            case key.up:
                                e.preventDefault();
                                if (selected_index > -1) {
                                    selected_index = selected_index - 1;
                                } else {
                                    selected_index = $options_element.find('.' + self.settings.prefix +
                                        'option').length - 1;
                                }
                                refreshActiveOption();
                                scrollToActiveOption();
                                break;
                            case key.down:
                                e.preventDefault();
                                if (selected_index < $options_element.find('.' + self.settings.prefix +
                                        'option').length - 1) {
                                    selected_index = selected_index + 1;
                                } else {
                                    selected_index = -1;
                                }
                                refreshActiveOption();
                                scrollToActiveOption();
                                break;
                            case key.escape:
                                e.preventDefault();
                                break;
                            case key.comma:
                                e.preventDefault();
                                if (selected_index === -1) {
                                    if ($input_element.val() !== '') {
                                        addTag($input_element.val());
                                    }
                                }
                                resizeInput();
                                break;
                            case key.enter:
                                e.preventDefault();
                                if (selected_index !== -1) {
                                    selectOption();
                                } else {
                                    if ($input_element.val() !== '') {
                                        addTag($input_element.val());
                                    }
                                }
                                resizeInput();
                                break;
                            case key.backspace:
                                if ($input_element.val() === '') {
                                    $source_element.val($source_element.val().substring(0,
                                        $source_element.val().lastIndexOf(',')));
                                    $source_element.trigger('change');
                                    searchOptions();
                                }
                                resizeInput();
                                break;
                            default:
                                resizeInput();
                                break;
                        }
                        refreshPlaceholder();
                    });
                    $input_element.bind('keyup', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var keyCode = e.keyCode || e.which;
                        if (keyCode === key.escape || keyCode === key.enter) {
                            hideOptions();
                        } else if (keyCode < 37 || keyCode > 40) {
                            searchOptions();
                        }
                        if ($tagator_element.hasClass('options-hidden') && (keyCode === key.left ||
                                keyCode === key.right || keyCode === key.up || keyCode === key.down)) {
                            searchOptions();
                        }
                        resizeInput();
                        refreshPlaceholder();
                    });
                    $input_element.bind('focus', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (!$options_element.is(':empty') || self.settings.showAllOptionsOnFocus) {
                            searchOptions();
                            showOptions();
                        }
                    });
                    $input_element.bind('blur', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        hideOptions();
                    });
                    refreshTags();
                };


                // RESIZE INPUT
                var resizeInput = function() {
                    $textlength_element.html($input_element.val());
                    $input_element.css({
                        width: ($textlength_element.width() + 20) + 'px'
                    });
                };


                // SET AUTOCOMPLETE LIST
                self.autocomplete = function(autocomplete) {
                    self.settings.autocomplete = autocomplete !== undefined ? autocomplete : [];
                };


                // REFRESH TAGS
                self.refresh = function() {
                    refreshTags();
                };
                var refreshTags = function() {
                    $tags_element.empty();
                    var tags = $source_element.val().split(',');
                    $.each(tags, function(key, value) {
                        if (value !== '' && checkAllowedTag(value)) {
                            var $tag_element = $(document.createElement('div'));
                            $tag_element.addClass(self.settings.prefix + 'tag');
                            $tag_element.html(value);
                            // remove button
                            var $button_remove_element = $(document.createElement('div'));
                            $button_remove_element.data('text', value);
                            $button_remove_element.addClass(self.settings.prefix + 'tag_remove');
                            $button_remove_element.bind('mousedown', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                            });
                            $button_remove_element.bind('mouseup', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                removeTag($(this).data('text'));
                                $source_element.trigger('change');
                            });
                            $button_remove_element.html('X');
                            $tag_element.append($button_remove_element);
                            // clear
                            var $clear_element = $(document.createElement('div'));
                            $clear_element.css('clear', 'both');
                            $tag_element.append($clear_element);

                            $tags_element.append($tag_element);
                        }
                    });
                    refreshPlaceholder();
                    searchOptions();
                };

                // REFRESH PLACEHOLDER
                var refreshPlaceholder = function() {
                    if ($tags_element.is(':empty') && !$input_element.val() && $source_element.attr(
                            'placeholder')) {
                        $placeholder_element.html($source_element.attr('placeholder'));
                        $placeholder_element.show();
                    } else {
                        $placeholder_element.hide();
                    }
                };

                // REMOVE TAG FROM ORIGINAL ELEMENT
                var removeTag = function(text) {
                    var tagsBefore = $source_element.val().split(',');
                    var tagsAfter = [];
                    $.each(tagsBefore, function(key, value) {
                        if (value !== text && value !== '') {
                            tagsAfter.push(value);
                        }
                    });
                    $source_element.val(tagsAfter.join(','));
                };

                // CHECK IF TAG IS PRESENT
                var hasTag = function(text) {
                    var tags = $source_element.val().split(',');
                    var hasTag = false;
                    $.each(tags, function(key, value) {
                        if ($.trim(value) === $.trim(text)) {
                            hasTag = true;
                        }
                    });
                    return hasTag;
                };

                // CHECK IF TAG IS ALLOWED
                var checkAllowedTag = function(text) {
                    if (!self.settings.allowAutocompleteOnly) {
                        return true;
                    }

                    var checkAllowedTag = false;
                    $.each(self.settings.autocomplete, function(key, value) {
                        if ($.trim(value) === $.trim(text)) {
                            checkAllowedTag = true;
                        }
                    });
                    return checkAllowedTag;
                };

                // ADD TAG TO ORIGINAL ELEMENT
                var addTag = function(text) {
                    if (!hasTag(text) && checkAllowedTag(text)) {
                        $source_element.val($source_element.val() + ($source_element.val() !== '' ? ',' : '') +
                            text);
                        $source_element.trigger('change');
                    }
                    $input_element.val('');
                    $tagator_element.focus();
                    hideOptions();
                };

                // OPTIONS SEARCH METHOD
                var searchOptions = function() {
                    $options_element.empty();
                    if ($input_element.val().replace(/\s/g, '') !== '' || self.settings.showAllOptionsOnFocus) {
                        var optionsArray = [];
                        $.each(self.settings.autocomplete, function(key, value) {
                            if (value.toLowerCase().indexOf($input_element.val().toLowerCase()) !== -
                                1) {
                                if (!hasTag(value)) {
                                    optionsArray.push(value);
                                }
                            }
                        });
                        generateOptions(optionsArray);
                    }
                    if ($input_element.is(':focus')) {
                        if (!$options_element.is(':empty')) {
                            showOptions();
                        } else {
                            hideOptions();
                        }
                    } else {
                        hideOptions();
                    }
                    selected_index = -1;
                };

                // GENERATE OPTIONS
                var generateOptions = function(optionsArray) {
                    var index = -1;
                    $(optionsArray).each(function(key, value) {
                        index++;
                        var option = createOption(value, index);
                        $options_element.append(option);
                    });
                    refreshActiveOption();
                };

                // CREATE RESULT OPTION
                var createOption = function(text, index) {
                    // holder li
                    var option = document.createElement('li');
                    $(option).data('index', index);
                    $(option).data('text', text);
                    $(option).html(text);
                    $(option).addClass(self.settings.prefix + 'option');
                    if (this.selected) {
                        $(option).addClass('active');
                    }

                    // BIND EVENTS
                    $(option).bind('mouseover', function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        selected_index = index;
                        refreshActiveOption();
                    });
                    $(option).bind('mousedown', function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                    });
                    $(option).bind('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        selectOption();
                    });


                    return option;
                };

                // SHOW OPTIONS AND DIMMER
                var showOptions = function() {
                    $tagator_element.removeClass('options-hidden').addClass('options-visible');
                    if (self.settings.useDimmer) {
                        $('#' + self.settings.prefix + 'dimmer').show();
                    }
                    $options_element.css('top', ($tagator_element.outerHeight - 2) + 'px');
                    if ($tagator_element.hasClass('single')) {
                        selected_index = $options_element.find('.' + self.settings.prefix + 'option').index(
                            $options_element.find('.' + self.settings.prefix + 'option.active'));
                    }
                    scrollToActiveOption();
                };

                // HIDE OPTIONS AND DIMMER
                var hideOptions = function() {
                    $tagator_element.removeClass('options-visible').addClass('options-hidden');
                    if (self.settings.useDimmer) {
                        $('#' + self.settings.prefix + 'dimmer').hide();
                    }
                };

                // REFRESH ACTIVE IN OPTIONS METHOD
                var refreshActiveOption = function() {
                    $options_element.find('.active').removeClass('active');
                    if (selected_index !== -1) {
                        $options_element.find('.' + self.settings.prefix + 'option').eq(selected_index)
                            .addClass('active');
                    }
                };

                // SCROLL TO ACTIVE OPTION IN OPTIONS LIST
                var scrollToActiveOption = function() {
                    var $active_element = $options_element.find('.' + self.settings.prefix + 'option.active');
                    if ($active_element.length > 0) {
                        $options_element.scrollTop($options_element.scrollTop() + $active_element.position()
                            .top - $options_element.height() / 2 + $active_element.height() / 2);
                    }

                };

                // SELECT ACTIVE OPTION
                var selectOption = function() {
                    addTag($options_element.find('.' + self.settings.prefix + 'option').eq(selected_index).data(
                        'text'));
                };


                // REMOVE PLUGIN AND REVERT INPUT ELEMENT TO ORIGINAL STATE
                self.destroy = function() {
                    $tagator_element.remove();
                    $source_element.removeData('tagator');
                    $source_element.show();
                    if ($('.tagator').length === 0) {
                        $('#' + self.settings.prefix + 'dimmer').remove();
                    }
                };

                // Initialize plugin
                self.init();
            };

            $.fn.tagator = function() {
                var parameters = arguments[0] !== undefined ? arguments : [{}];
                return this.each(function() {
                    if (typeof(parameters[0]) === 'object') {
                        if (undefined === $(this).data('tagator')) {
                            var plugin = new $.tagator(this, parameters[0]);
                            $(this).data('tagator', plugin);
                        }
                    } else if ($(this).data('tagator')[parameters[0]]) {
                        $(this).data('tagator')[parameters[0]].apply(this, Array.prototype.slice.call(
                            parameters, 1));
                    } else {
                        $.error('Method ' + parameters[0] + ' does not exist in $.tagator');
                    }
                });
            };
        }(jQuery));


        $(function() {
            $('.tagator').each(function() {
                var $this = $(this);
                var options = {};
                $.each($this.data(), function(key, value) {
                    if (key.substring(0, 7) === 'tagator') {
                        var value_temp = value.toString().replace(/'/g, '"');
                        value_temp = $.parseJSON(value_temp);
                        if (typeof value_temp == 'object') {
                            value = value_temp;
                        }
                        options[key.substring(7, 8).toLowerCase() + key.substring(8)] = value;
                    }
                });
                $this.tagator(options);
            });
        });
    </script>




    <script>
        $(document).ready(function() {
            let debounceTimeout;

            // var availableTags = [
            //     "tag1",
            //     "tag2",
            //     "tag3",
            //     // Add more tags as needed
            // ];
            // Initialize Tagator plugin with empty tags

            $('#tags-input').tagator({
                // autocomplete: [],
                useDimmer: true,
                showAllOptionsOnFocus: true,
                allowCustomEntry: true,
                placeholder: false,
                separator: ',',
                className: 'tag-input',
                dropdownClassName: 'tag-dropdown',
                highlightInvalid: true,
                showAllOptionsOnEmpty: true
            });
            // function initializeTagator(tags) {
            // }
            // initializeTagator([]);


            // Fetch autocomplete results based on user input
            function fetchAutocompleteResults(keyword) {
                return $.ajax({
                    url: `/api/tag-keywords?q=${keyword}`, // Replace with your autocomplete endpoint URL
                    method: 'GET',
                });
            }

            fetchAutocompleteResults('').done(function(response) {
                $('#tags-input').tagator('autocomplete', response);
            }).fail(function(error) {
                console.error('Failed to fetch autocomplete results:', error);
            });


            $('.tagator_input').on('focus', function() {
                $('.tagator_placeholder').hide();
            });
            $('.tagator_input').on('focusout', function() {
                $('.tagator_placeholder').show();
            });

            // Function to debounce input changes
            // function debounceInput(callback, delay) {
            //     clearTimeout(debounceTimeout);
            //     debounceTimeout = setTimeout(callback, delay);
            // }

            // // Listen to input event on the tag input field
            // function handle() {
            //     const keyword = $(this).val();

            //     debounceInput(function() {
            //         fetchAutocompleteResults(keyword).done(function(response) {

            //             $('#tags-input').tagator('autocomplete', response);
            //         }).fail(function(error) {
            //             console.error('Failed to fetch autocomplete results:', error);
            //         });
            //     }, 300)
            // }
            // $('.tagator_input').on('focus', handle);
            // $('.tagator_input').on('input', handle);
        })
    </script>
    {{-- <script>
        $(function() {
            var availableTags = [
                "tag1",
                "tag2",
                "tag3",
                // Add more tags as needed
            ];
            console.log($('#tags-input'))
            // Initialize the tags input field
            $('#tags-input').on('keydown', function(event) {
                if (event.keyCode === $.ui.keyCode.TAB && $(this).autocomplete('instance').menu.active) {
                    event.preventDefault();
                }
            }).autocomplete({
                source: availableTags,
                // source: function(request, response) {
                //     // Replace 'your-autocomplete-api-url' with the actual URL for your autocomplete suggestions
                //     $.ajax({
                //         url: 'your-autocomplete-api-url',
                //         dataType: 'json',
                //         data: {
                //             term: request.term
                //         },
                //         success: function(data) {
                //             response(data);
                //         }
                //     });
                // },
                focus: function() {
                    return false;
                },
                select: function(event, ui) {
                    var terms = this.value.split(',');
                    terms.pop();
                    terms.push(ui.item.value);
                    terms.push('');
                    this.value = terms.join(',');
                    return false;
                }
            });
        });
    </script> --}}
@endpush
