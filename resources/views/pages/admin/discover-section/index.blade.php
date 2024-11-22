@extends('layouts.admin.index')

@section('metaTitle', 'Discover Section')

@section('content')


    <div class="max-w-[86rem] mx-auto border shadow-md p-5 mt-5 rounded-lg">
        <h4 class="text-lg mb-2">Update Headings</h4>

        <form action="{{ route('admin.discover-section.update', 1) }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="title" class="block font-medium text-sm text-gray-700">
                    Title
                </label>
                <input
                    class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                    type="text" name="title" value="{{ old('title', $discoverSection->title) }}" required>

                <ul class='text-sm text-red-600 space-y-1 mt-2'>
                    @foreach ($errors->get('title') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>

            </div>
            <div>
                <label for="subtitle" class="block font-medium text-sm text-gray-700">
                    Subtitle
                </label>
                <input
                    class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                    type="text" name="subtitle" value="{{ old('subtitle', $discoverSection->subtitle) }}" required>

                <ul class='text-sm text-red-600 space-y-1 mt-2'>
                    @foreach ($errors->get('subtitle') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>

            </div>

            <div>
                <button type="submit"
                    class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>Save</button>
            </div>
        </form>
    </div>


    <div class="max-w-[86rem] mx-auto border shadow-md p-5 mt-5 rounded-lg">
        <div class="flex justify-between">
            <h4 class="text-lg">Carousels </h4>
            <a href="{{ route('admin.discover-section-carousel.create') }}"
                class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                Create
            </a>
        </div>
        <!-- List -->
        <div class="bg-white mt-5 ">
            <div class="overflow-x-auto border-x border-t">
                <table class="table-auto w-full">
                    <thead class="border-b">
                        <tr class="bg-gray-100">
                            <th class="text-left p-4 font-medium">
                                ID
                            </th>
                            <th class="text-left p-4 font-medium">
                                Thumbnail
                            </th>
                            <th class="text-left p-4 font-medium">
                                Category
                            </th>
                            <th class="text-left p-4 font-medium">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discoverSectionCarousel as $carouselItem)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4 flex items-center gap-2">
                                    <img src="{{ $carouselItem->thumbnail->getUrl() }}" alt="{{ $carouselItem->title }}"
                                        class="w-20 h-20 rounded-lg">

                                    <a href="{{ route('admin.discover-section-carousel.edit', $carouselItem->id) }}"
                                        class="hover:underline">{{ $carouselItem->title }}</a>
                                </td>
                                <td>

                                    <a href="{{ route('admin.hotel-categories.index', ['id' => $carouselItem->category->id]) }}"
                                        class="hover:underline">{{ $carouselItem->category->title }}</a>

                                </td>
                                <td class="p-4">
                                    <a href="{{ route('admin.discover-section-carousel.edit', $carouselItem->id) }}"
                                        class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                        Edit
                                    </a>
                                    <form
                                        action="{{ route('admin.discover-section-carousel.destroy', $carouselItem->id) }}"
                                        method="POST" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type='submit'
                                            onclick="return confirm('Are you sure going to delete this ?')"
                                            class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
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
