@extends('layouts.design')

@section('title', 'Blogs')

@section('content')
<div class="container-fluid px-5 pt-5">
    <h1 class="text-center text-dark-green bold">All Blogs</h1>
    <div class="row pt-4 px-3">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card def-border" style="width: 80%;">
                    <img src="{{ $blog->image }}" class="card-img-top img-fluid p-2" style="height: 300px; object-fit:cover; border-radius:30px;" alt="{{ $blog->title_en }}">
                    <div class="card-body text-start">
                        <h5 class="card-title">{{ $blog->title_en }}</h5>
                        <p class="text-muted" style="font-size: 0.9rem;">
                            <i class="fa-solid fa-calendar-days pe-2"></i>{{ $blog->created_at->format('F j, Y, g:i a') }}
                        </p>
                        <p>{!! Str::limit($blog->description_en, 300) !!}</p>
                        <a href="{{ route('blogs_show', $blog->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No blogs found.</p>
        @endforelse
    </div>
</div>
@endsection
