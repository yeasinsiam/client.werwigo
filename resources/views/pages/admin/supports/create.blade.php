@extends('layouts.admin.index')

@section('metaTitle', 'Create Question')

@section('content')


    @if ($errors->any())
        <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-red-200 text-red-900">
            Please check those field errors..
        </div>
    @endif

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}


    <form action="{{ route('admin.faqs.store') }}" method="POST"
        class="max-w-[86rem] mt-5 mx-auto grid gap-5 grid-cols-1 lg:grid-cols-11" enctype="multipart/form-data">
        @csrf


        <div class="col-span-1 px-5 py-2 border rounded-lg shadow-md lg:col-span-11">
            <div class="flex justify-between">
                <h4 class="text-lg">Create Question</h4>
                <button type="sumbit"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                    Create
                </button>
            </div>
        </div>
        {{-- ___General___ --}}
        <div class="col-span-1 lg:col-span-11">
            <div class="px-5 py-2 border rounded-lg shadow-md">


                <div class="mt-5">
                    {{-- question --}}
                    <div>
                        <label for="question" class="block text-sm font-medium text-gray-700">
                            Question
                        </label>
                        <input
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="question" value="{{ old('question') }}" required>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
                            @foreach ($errors->get('question') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>

                    </div>


                    {{-- answer --}}
                    <div class="mt-3">
                        <label for="answer" class="block text-sm font-medium text-gray-700">
                            Answer
                        </label>

                        <textarea
                            class='w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:border-indigo-500 focus:ring-indigo-500 lock'
                            type="text" name="answer" rows="3">{{ old('answer') }}</textarea>

                        <ul class='mt-2 space-y-1 text-sm text-red-600'>
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
