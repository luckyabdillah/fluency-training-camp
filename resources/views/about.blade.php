@extends('layouts.main')

@section('content')
<nav id="hero" class="pt-5">
    <div class="container content">
        <h1 class="title"><span style="color: #162A92">About</span> Us?</h1>
        <p>
          Fluency is a digital platform for online English courses that provides high-quality English learning services for those who want to learn English from absolute basics to mastery, guided directly by experts. With Fluency, you no longer need to worry about where to start improving your English skills. At Fluency, all classes are systematically and sequentially arranged, starting from Beginner to Advanced levels, based on a curriculum researched by experts. Oh, and one more thing—our classes and courses can be accessed anytime and anywhere without being tied to a schedule!
        </p>
        <div class="image-container">
          <img alt="Foto Fluency" height="400" src="{{ asset('assets/image/tentang kami.png') }}" width="600" />
        </div>
      </div>
</nav>
@endsection