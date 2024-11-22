@extends('layouts.main.index')
@section('meta-title', 'Home - oooHotels')


@section('content')
    <section wire:ignore class="max-w-5xl px-3 mx-auto mt-10 lg:px-0 ">
        <div class="px-8 py-5 border shadow-xl rounded-xl [&>p]:text-gray-500 [&>ul>li]:text-gray-500  no-tailwindcss-base">
            {!! $termsOfServiceSection->content !!}
        </div>
    </section>
@endsection
