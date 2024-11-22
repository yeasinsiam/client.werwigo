@extends('layouts.admin.index')

@section('metaTitle', 'Properties')

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
                    ])>Amenities</a>
                </li> --}}
            </ul>
        </div>
    @endrole


    @if (session()->has('success-message'))
        <div class="max-w-[86rem] mt-5 mb-2 mx-auto px-5 py-3 rounded-lg bg-green-200 text-green-900">
            {{ session()->get('success-message') }}
        </div>
    @endif

    <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
        <div class="flex justify-between">
            <h4 class="text-lg"> {{ __('Properties listing') }} </h4>
            <a href="{{ route('admin.hotels.create') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                {{ __('Create Properties') }}
            </a>
        </div>
        <!-- List -->
        <div class="mt-5 bg-white ">
            <div class="overflow-x-auto border-t border-x">
                <table class="w-full table-auto">
                    <thead class="border-b">
                        <tr class="bg-gray-100">
                            <th class="p-4 font-medium text-left">
                                ID
                            </th>
                            <th class="p-4 font-medium text-left">
                                {{ __('Headline') }}
                            </th>
                            <th class="p-4 font-medium text-left">
                                {{ __('Hotel Name') }}
                            </th>
                            <th class="p-4 font-medium text-left">
                                {{ __('Action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse  ($hotels as $hotel)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="flex items-center gap-2 p-4 min-w-[250px]">
                                    <img src="{{ $hotel->thumbnail->getUrl() }}" alt="{{ $hotel->title }}"
                                        class="object-cover w-20 h-20 rounded-lg">

                                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                        class="hover:underline ">{{ $hotel->headline }}</a>
                                    @if (auth('admin')->user()->hasRole('super-admin') && auth('admin')->user()->id != $hotel->admin_id)
                                        (<a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                            class="font-bold text-blue-600 hover:underline">{{ $hotel->admin->name }}</a>)
                                    @endif
                                </td>
                                <td class="p-4 min-w-[200px]">
                                    {{ $hotel->parentHotel->title }}
                                </td>
                                <td class="p-4 min-w-[200px]">
                                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type='submit'
                                            onclick="return confirm('Are you sure going to delete this ?')"
                                            class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                            {{ __('Delete') }}
                                        </button>

                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center" class="pt-3">No property found.please create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2">
            {{ $hotels->links() }}
        </div>
    </div>
@endsection
