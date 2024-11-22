@extends('layouts.admin.index')

@section('metaTitle', 'Edit carousel')

@section('content')
    @if ($errors->any())
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-red-200 text-red-900">
            Please check those field errors..
        </div>
    @endif

    <div class="max-w-[86rem] mx-auto border shadow-md p-5 mt-5 rounded-lg">
        <h4 class="text-lg mb-2"></h4>

        <form action="{{ route('admin.discover-section-carousel.update', $discoverSectionCarousel->id) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div>
                <img srcset="{{ $discoverSectionCarousel->thumbnail->getSrcset() }}"
                    class="w-52 h-52 object-cover block mb-2 rounded-lg" />
                <div>
                    <label for="thumbnail" class="block font-medium text-sm text-gray-700">
                        Thumbnail
                    </label>
                    <input type="file" name="thumbnail" accept=".jpg, .jpeg"
                        class=" pt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />

                    <ul class='text-sm text-red-600 space-y-1 mt-2'>
                        @foreach ($errors->get('thumbnail') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="mt-5">
                <label for="category" class="block font-medium text-sm text-gray-700">
                    Selete Category
                </label>
                <select id="select-booking-type"
                    class='form-select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                    name="category" required autocomplete="off">

                    @foreach ($hotelCategories as $category)
                        <option value="{{ $category->id }}" @selected(old('category', $discoverSectionCarousel->category->id) == $category->id)>{{ $category->title }}</option>
                    @endforeach
                </select>

                <ul class='text-sm text-red-600 space-y-1 mt-2'>
                    @foreach ($errors->get('category') as $message)
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
@endsection
