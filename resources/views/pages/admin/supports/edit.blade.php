@extends('layouts.admin.index')

@section('metaTitle', $faq->quenstion)

@section('content')


    @if ($errors->any())
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-red-200 text-red-900">
            Please check those field errors..
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif


    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST"
        class="max-w-[86rem] mt-5 mx-auto grid gap-5 grid-cols-1 lg:grid-cols-11" enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="col-span-1 lg:col-span-11 border shadow-md px-5 py-2  rounded-lg">
            <div class="flex justify-between">
                <h4 class="text-lg">Edit Question</h4>
                <button type="sumbit"
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
                        <label for="question" class="block font-medium text-sm text-gray-700">
                            Question
                        </label>
                        <input
                            class='form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                            type="text" name="question" value="{{ old('question', $faq->question) }}" required>

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('question') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>


                    {{-- answer --}}
                    <div class="mt-3">
                        <label for="answer" class="block font-medium text-sm text-gray-700">
                            Answer
                        </label>

                        <textarea
                            class='form-textarea border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm lock mt-1 w-full'
                            type="text" name="answer" rows="3">{{ old('answer', $faq->answer) }}</textarea>

                        <ul class='text-sm text-red-600 space-y-1 mt-2'>
                            @foreach ($errors->get('answer') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>


                </div>
            </div>
        </div>



    </form>
@endsection
