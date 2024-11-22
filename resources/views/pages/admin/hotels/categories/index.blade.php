@extends('layouts.admin.index')

@section('metaTitle', 'Properties Categories')

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


    @if ($category)
        <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
            <h4 class="mb-2 text-lg">Update Category</h4>

            <form action="{{ route('admin.hotel-categories.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="title" value="{{ old('title', $category->title) }}" required>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('title') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>

                    {{-- <div class="flex flex-col 1 gap-2 lg:flex-row lg:flex-wrap ">

                        <div>
                            <label id="icon-field" class="block text-sm font-medium text-gray-700 min-w-[200px]">
                                <div class="flex items-center gap-1">
                                    <span>Icon</span>
                                    @if ($category->icon)
                                        <img style="height:21px;" src="{{ $category->icon?->getUrl() }}" alt="">
                                    @endif
                                </div>
                                <div class="mt-1 p-2 border border-black flex gap-2 items-center">
                                    <span class="text-black border border-black p-1 rounded-lg  font-bold">Browse</span>
                                    <img id="icon-preview-image" class="hidden   rounded-md" alt="Preview" />
                                </div>
                                <input class="hidden" type="file" name="icon" accept="image/png" />
                            </label>
                            <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                @foreach ($errors->get('icon') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div> --}}



                </div>


                <div class="mt-5">
                    <button type="submit"
                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>Save</button>
                </div>
            </form>
        </div>
    @else
        <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
            <h4 class="mb-2 text-lg">Create Category</h4>

            <form action="{{ route('admin.hotel-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Title
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm  form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="title" value="{{ old('title') }}" required>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('title') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>

                    {{-- icon  --}}
                    {{-- <div class="flex flex-col 1 gap-2 lg:flex-row lg:flex-wrap ">

                        <div>
                            <label id="icon-field" class="block text-sm font-medium text-gray-700 min-w-[200px]">
                                <span>Icon</span>
                                <div class="mt-1 p-2 border border-black flex gap-2 items-center">
                                    <span class="text-black border border-black p-1 rounded-lg  font-bold">Browse</span>
                                    <img id="icon-preview-image" class="hidden   rounded-md" alt="Preview" />
                                </div>
                                <input class="hidden" type="file" name="icon" accept="image/png" />
                            </label>
                            <ul class='mt-2 space-y-1 text-sm text-red-600'>
                                @foreach ($errors->get('icon') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                </div>
                {{-- Svg Active  --}}
                {{-- <div class="mt-3">
                    <label for="svg_active" class="block text-sm font-medium text-gray-700">
                        Svg (Active) - (Change only height)
                    </label>

                    <textarea
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="svg_active" rows="3">{{ old('svg_active') }}</textarea>

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('svg_active') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div> --}}
                {{-- Svg  --}}
                {{-- <div class="mt-3">
                    <label for="svg" class="block text-sm font-medium text-gray-700">
                        Svg (Change only height)
                    </label>

                    <textarea
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="svg" rows="3">{{ old('svg') }}</textarea>

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('svg') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div> --}}
                {{-- Svg Active  --}}
                {{-- <div class="mt-3">
                    <label for="svg_active" class="block text-sm font-medium text-gray-700">
                        Svg (Active) - (Change only height)
                    </label>

                    <textarea
                        class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:border-indigo-500 focus:ring-indigo-500 lock'
                        type="text" name="svg_active" rows="3">{{ old('svg_active') }}</textarea>

                    <ul class='mt-2 space-y-1 text-sm text-red-600'>
                        @foreach ($errors->get('svg_active') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>

                </div> --}}

                <div class="mt-5">

                    <button type="submit"
                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>Save</button>
                </div>
            </form>
        </div>

    @endif

    <div class="p-5 mx-auto mt-5 border rounded-lg shadow-md max-w-[86rem]">
        <div class="flex justify-between">
            <h4 class="text-lg"> Categories list</h4>
            <a href="{{ route('admin.hotel-categories.index') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                Create Category
            </a>
        </div>
        <!-- List -->
        <div class="mt-5 bg-white ">
            <livewire:admin.pages.hotels.categories.categoly-listing />
        </div>
    </div>
@endsection

@push('footer')
    <style>
        .draggable-mirror {
            background: white;
            width: 450px;
            display: flex;
            align-items: center;
        }
    </style>

    {{-- <script>
        $(document).ready(function() {
            $('#icon-field input').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#icon-field img#icon-preview-image').fadeIn().attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file);
                }
            });
            $('#icon-active-field input').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#icon-active-field img#icon-active-preview-image').fadeIn().attr('src', e
                            .target.result);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script> --}}
@endpush
