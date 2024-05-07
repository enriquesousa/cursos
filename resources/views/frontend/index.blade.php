@extends('frontend.master')
@section('home')

<!-- START HERO AREA -->
@include('frontend.home.hero-area')
<!-- end hero-area -->

<!-- START FEATURE AREA -->
@include('frontend.home.feature-area')
<!-- end feature-area -->

<!-- START CATEGORY AREA -->
@include('frontend.home.category-area')
<!-- end category-area -->

<!-- START COURSE AREA | Choose your desired courses -->
@include('frontend.home.courses-area')
<!-- end courses-area -->

<!-- START COURSE AREA LOS ESTUDIANTES ESTÁN VIENDO -->
@include('frontend.home.courses-viewing')
<!-- end courses-viewing -->

<!-- START FUN FACT AREA CONTADORES -->
@include('frontend.home.fact-counters')
<!-- end fun fact-counters -->

<!-- START CTA AREA | Get Started -->
@include('frontend.home.get-started-area')
<!-- end get-started-area -->

<!--START TESTIMONIAL AREA -->
@include('frontend.home.testimonial-area')
<!-- end testimonial-area -->

<div class="section-block"></div>

<!-- START ABOUT AREA -->
@include('frontend.home.about-area')
<!-- end about-area -->   

<div class="section-block"></div>

<!-- START REGISTER AREA -->
@include('frontend.home.register-area')
<!-- end register-area -->

<div class="section-block"></div>

<!-- START CLIENT-LOGO AREA | Our partners-->
@include('frontend.home.client-logo-area')
<!-- end client-logo-area -->

<!-- START BLOG AREA | News feeds -->
@include('frontend.home.blog-area')
<!-- end blog-area -->

<!-- START GET STARTED AREA | Start Teaching -->
@include('frontend.home.get-started-3cards')
<!-- end get-started-3cards -->

<!-- START SUBSCRIBER AREA | Subscribe to newsletter -->
@include('frontend.home.subscriber-area')
<!-- end subscriber-area -->

@endsection