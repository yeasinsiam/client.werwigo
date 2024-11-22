@extends('layouts.admin.index')

@section('metaTitle', 'Properties Tags')

@section('content')
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


    @if ($tag)
        <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
            <h4 class="mb-2 text-lg">Update Tag</h4>

            <form action="{{ route('admin.hotel-tags.update', $tag->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Title
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="title" value="{{ old('title', $tag->title) }}" required>

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('title') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>

                <div>
                    <button type="submit"
                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>Save</button>
                </div>
            </form>
        </div>
    @else
        <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
            <h4 class="mb-2 text-lg">Create Tag</h4>

            <form action="{{ route('admin.hotel-tags.store') }}" method="POST">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Title
                    </label>
                    <input
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="title" value="{{ old('title') }}" required>

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('title') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>

                <div>

                    <button type="submit"
                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>Save</button>
                </div>
            </form>
        </div>

    @endif

    <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
        <div class="flex justify-between">
            <h4 class="text-lg">Properties Tags list</h4>
            <a href="{{ route('admin.hotel-tags.index') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                Create Tag
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
                                Title
                            </th>
                            <th class="p-4 font-medium text-left">
                                Slug
                            </th>
                            <th class="p-4 font-medium text-left">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tags as $tag)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4">
                                    {{ $tag->title }}
                                </td>
                                <td class="p-4">
                                    {{ $tag->slug }}

                                </td>
                                <td class="flex gap-3 p-4">
                                    <a href="{{ route('admin.hotel-tags.index', ['id' => $tag->id]) }}"
                                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.hotel-tags.destroy', $tag->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type='submit'
                                            onclick="return confirm('Are you sure going to delete this ?')"
                                            class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                            Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
