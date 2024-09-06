@extends('layouts.design')

@section('title', 'Contact Us')

@section('content')
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
@endsection
