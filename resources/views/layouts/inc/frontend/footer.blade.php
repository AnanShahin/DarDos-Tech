<footer class="footer py-5">
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/logo-removebg-preview.png') }}" alt="Logo">
                <p>{!! $globalsettings->description !!}</p>
            </div>

            <div class="col-md-4">
                <h4 class="pb-3">Quick Links</h4>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="/" class="no-decor">Home</a></li>
                    <li class="mb-3"><a href="{{ route('blogs_index') }}" class="no-decor">Blogs</a></li>
                    <li class="mb-3"><a href="{{ route('about_index') }}" class="no-decor">About Us</a></li>
                    <li class="mb-3"><a href="{{ route('contact_index') }}" class="no-decor">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h4 class="pb-3">Contact Us</h4>
                <address>
                    {!! $globalsettings->address !!}
                </address>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.07842199369!2d35.898182299999995!3d31.985889500000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca01978195281%3A0x62409a5b47ca72ba!2sSport%20City%20Cir.%2C%20Amman!5e0!3m2!1sen!2sjo!4v1725634742857!5m2!1sen!2sjo" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</footer>
