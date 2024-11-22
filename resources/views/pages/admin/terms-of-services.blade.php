@extends('layouts.admin.index')

@section('metaTitle', 'Terms of services')


@section('content')


    @if ($errors->any())
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-red-200 text-red-900">
            Please check those field errors..
        </div>
    @endif

    @if (session()->has('success-message'))
        <div class="max-w-[86rem] mt-5 mb-2 mx-auto px-5 py-3 rounded-lg bg-green-200 text-green-900">
            {{ session()->get('success-message') }}
        </div>
    @endif


    <form action="{{ route('admin.terms-of-service.update') }}" method="POST"
        class="max-w-[86rem] mt-5 mx-auto grid gap-5 grid-cols-1 lg:grid-cols-11" enctype="multipart/form-data">
        @csrf


        <div class="col-span-1 lg:col-span-11 border shadow-md px-5 py-2  rounded-lg">
            <div class="flex justify-between">
                <h4 class="text-lg">Edit Terms of Service</h4>
                <button type="submit"
                    class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Update
                </button>
            </div>
        </div>
        {{-- ___General___ --}}
        <div class="col-span-1 lg:col-span-11">
            <div class="border shadow-md px-5 py-2 rounded-lg">


                <div class="mt-5">
                    {{-- question --}}
                    <div>
                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('content') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                        <textarea name="content">{{ old('content', $termsOfServiceSection->content) }}</textarea>

                    </div>

                </div>
            </div>
        </div>



    </form>
@endsection






@prepend('header')
    {{-- Google font --}}
    <link rel="preconnect" href="//fonts.googleapis.com">
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
    <link
        href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/pfifs64v2jopqnv6ff1ljvjmhpn0x9wt15zrn880y2bficzl/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endprepend
@push('footer')
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 900,
            // font_family_formats: 'Poppins=Poppins;',
            // plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',

            // content_style: " body { font-family: Poppins; }",
        });
    </script>
@endpush
