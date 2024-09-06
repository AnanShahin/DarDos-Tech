@extends('layouts.design')

@section('title', 'Home')

@section('content')
<section>
    <div class="container-fluid px-5 py-3">
        <div class="row">
            <h1 class="text-dark-green bold">About Our Company</h1>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{ $about->image }}" class="img-fluid def-border2" style="height: 300px; width:80%;" alt="About Image">
            </div>

            <div class="col-md-6">
                <p>{!! Str::limit($about->description_en, 1200) !!}</p>
                <div class="text-center">
                    <a href="{{ route('about_index') }}" class="btn btn-primary mt-3">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-5 py-3">
        <h1 class="text-dark-green bold">Latest Blogs</h1>
        <div class="swiper mySwiper pt-4 px-3">
            <div class="swiper-wrapper">
                @forelse ($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="card p-5 def-border">
                            <img src="{{ $blog->image }}" class="card-img-top img-fluid def-border" alt="{{ $blog->title_en }}">
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
            <br><br><div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="container-fluid px-5 py-3">
        <div class="row">
            <h1 class="ps-5 pt-5 text-dark-green bold">Contact Us</h1>
            <div class="col-md-6 ">
                <form class="px-5 py-4 ">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control rounded-0 border-dark" aria-label="Name">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control rounded-0 border-dark" aria-label="Email">
                        </div>
                    </div>
                    <div class="col-md-12 pt-4">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" class="form-control rounded-0 border-dark" rows="6"></textarea>
                    </div>
                    <div class="col-md-12 pt-4">
                        <button type="submit" class="btn btn-primary border-0 rounded-0 shadow" style="text-decoration: none;">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 text-center">
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.07842199369!2d35.898182299999995!3d31.985889500000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca01978195281%3A0x62409a5b47ca72ba!2sSport%20City%20Cir.%2C%20Amman!5e0!3m2!1sen!2sjo!4v1725634742857!5m2!1sen!2sjo" width="80%" height="350px" class="def-border" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });
</script>

<style>
    .swiper-pagination-bullet {
        width: 16px;
        height: 16px;
        background-color: #72AA48;
    }

    .swiper-slide {
        background-color: transparent !important;
    }
</style>
@endsection
