@extends('layouts.main')

@section('content')
<nav id="home" class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Indonesia's No. 1 English Online Course Platform</h2>
                <h1 class="display-4"><span style="color: #162A92">English</span> Training Camp</h1>
                <p>
                  Join our platform to master English with hands-on guidance from experts. Explore complete courses in Grammar, Speaking, Reading, Writing, and Listening, and let's become a pro in English together. Register now to get started!
                </p>
                <a href="/register" class="btn custom-button">Register Now</a>
              </div>
            <div class="col-md-6 mb-3 order-md-2 order-1">
                <img src="{{ asset('assets/image/discuss.png') }}" alt="Discuss" class="img-fluid">
            </div>
        </div>
    </div>
</nav>
<nav id="skills" class="py-5">
    <div class="container">
        <h3 class="text-center">Valuable Skills</h3>
        <div class="row justify-content-center text-center">
            <div class="col-md-4 col-6 mb-3 px-5">
                <img src="{{ asset('assets/image/listening.png') }}" alt="Listening" class="img-fluid rounded-circle mb-2">
                <span class="skill-title">Listening</span>
            </div>
            <div class="col-md-4 col-6 mb-3 px-5">
                <img src="{{ asset('assets/image/grammar.png') }}" alt="Grammar" class="img-fluid rounded-circle mb-2">
                <span class="skill-title">Grammar</span>
            </div>
            <div class="col-md-4 col-6 mb-3 px-5">
                <img src="{{ asset('assets/image/image.png') }}" alt="Reading" class="img-fluid rounded-circle mb-2">
                <span class="skill-title">Reading</span>
            </div>
            <div class="col-md-4 col-6 mb-3 px-5">
                <img src="{{ asset('assets/image/speaking.png') }}" alt="Speaking" class="img-fluid rounded-circle mb-2">
                <span class="skill-title">Speaking</span>
            </div>
            <div class="col-md-4 col-6 mb-3 px-5">
                <img src="{{ asset('assets/image/writing.jpg') }}" alt="Writing" class="img-fluid rounded-circle mb-2">
                <span class="skill-title">Writing</span>
            </div>
        </div>
    </div>
</nav>

<nav id="why-us" class="py-5">
    <div class="container mt-5">
        <h1 class="section-title mb-3"><span style="color: #162A92">Why</span> Us?</h1>
        <div class="row justify-content-center">
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-custom">
              <img src="{{ asset('assets/image/materi.jpg') }}" alt="" />
              <div class="card-body card-body-custom">
                <h5 class="card-title">Super Complete Material</51>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-custom">
              <img src="{{ asset('assets/image/akses.jpg') }}" alt="" />
              <div class="card-body card-body-custom">
                <h5 class="card-title">
                    Access Anywhere Anytime</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-custom">
              <img src="{{ asset('assets/image/dosen.jpg') }}" alt="" />
              <div class="card-body card-body-custom">
                <h5 class="card-title">Compiled By Experts</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-custom">
              <img src="{{ asset('assets/image/paham.jpg') }}" alt="" />
              <div class="card-body card-body-custom">
                <h5 class="card-title">Easy to understand</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
</nav>

<nav id="faq" class="py-5">
    <div class="container">
        <h3 class="mb-5 title-faq"><span style="color: #162A92">Frequently</span> Asked Questions</h3>
        <div class="row">   
            <div class="col-md-6">
                <img src="{{ asset('assets/image/faq.jpg') }}" alt="FAQ Illustration" class="img-fluid">
            </div>
            <div class="col-md-6 my-auto">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                What is Fluency?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Fluency is an English learning platform designed to improve your speaking, listening, reading, and writing skills through a flexible and enjoyable approach.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                How do I register on Fluency?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                You can register by clicking the "Sign Up" button at the top of the page and filling out the registration form as instructed.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                                What sets Fluency apart from other platforms?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Fluency offers an interactive learning approach with professional tutors, practical exercises, and regularly updated materials to ensure you learn in the most effective way.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Is the content suitable for beginners?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Absolutely! We offer courses for various skill levels, from beginners to advanced learners. You will also take a placement test to determine the appropriate learning level.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Can I learn on a mobile device?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Yes, our platform is fully responsive and can be accessed via mobile devices, tablets, or desktops. We also have a dedicated app for a more convenient learning experience.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@endsection