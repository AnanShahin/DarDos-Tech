@extends('layouts.design')

@section('title', 'About Us')

@section('content')
<div>
    <section class="mt-5">
        <div class="container-fluid py-4 px-5">
            @if ($about)
                <h1 class="text-dark-green">{{ $about->title_en }}</h1>
                <p>{!! $about->description_en !!}</p>
            @else
            @endif
        </div>
    </section>
</div>
@endsection
