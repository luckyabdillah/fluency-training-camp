@extends('layouts.main')

@section('content')
    <nav id="hero" class="pb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 order-lg-1 order-2 mt-3">
                    <h5 class="contact-title"><span style="color: #162A92">Contact</span> Us</h5>
                    <form id="contactForm" method="POST" action="/contact" target="_blank">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea rows="3" class="form-control" name="body" id="body" placeholder="Body" required autocomplete="off"></textarea>
                        </div>
                        <button class="btn btn-my-primary btn-send">Send</button>
                    </form>
                </div>
                <div class="col-lg-4 order-lg-2 order-1 my-auto">
                    <div class="rounded bg-secondary-solid px-3 py-4">
                        <h4>Reach Out Today</h4>
                        <p class="mb-0">Have questions or need assistance? We're just a message away.</p>
                        <div class="py-2">
                            <hr>
                        </div>
                        <h4>Our Location</h4>
                        <p class="mb-0">Visit us in person or find our contact details to connect with us directly.</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="py-5 bg-white">
    
        <div class="container text-center">
            <h1 class="mb-5 fw-semibold">We'd love to hear from you</h1>
            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.057806271677!2d104.04587631043351!3d1.1187204988658634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1729268888384!5m2!1sid!2sid"
                    width="900"
                    height="450"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    style="border-radius: 2rem"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </nav>
@endsection