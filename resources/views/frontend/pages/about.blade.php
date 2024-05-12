@extends('frontend.master')
@section('home')
    <!-- ================================
            START BREADCRUMB AREA
        ================================= -->
    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">{{ __('About') }}</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">{{ __('Home') }}</a></li>
                    <li>{{ __('Pages') }}</li>
                    <li>{{ __('About') }}</li>
                </ul>
            </div><!-- end breadcrumb-content -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
            END BREADCRUMB AREA
        ================================= -->

    <!-- ================================
               START CONTACT AREA
        ================================= -->
    <section class="contact-area section--padding position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title text-center fs-24 lh-35 pb-4">{{ __('About') }}</h3>
                            <div class="section-block"></div>

                            {{-- avatar Imagen que representa este proyecto --}}
                            <div class="user-profile text-center mt-3">

                                <div class="">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('frontend/images/web_dev_image.png') }}" class="rounded-circle"
                                            alt="thumbnail" width="150px">
                                    </a>
                                </div>

                                <div class="mt-3">
                                    <h5 class="mb-1">
                                        {{ __('Full Stack Web Developer') }}
                                    </h5>
                                </div>

                            </div>

                            {{-- Logo de TJ Web --}}
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <img src="{{ asset('frontend/images/TJWeblogo.png') }}" alt="" width="100px">
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{-- Copyright de TJ Web --}}
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-sm-12 text-center">
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>© TJ Web.
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="text-center d-none d-sm-block">
                                            {{ __('Made with') }} <i class="la la-heart mr-1"></i>
                                            {{ __('by') }} TJ Web.
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Footer: Version de Laravel y PHP --}}
                            <div class="form-group row mt-4">
                                <div class="col-sm-12">
                                    <div class="text-center d-none d-sm-block">

                                        <small class="text-muted">
                                            Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                                            (PHP v{{ PHP_VERSION }})
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            {{-- {!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime(now()))) !!}  --}}
                                            @php
                                                $mytime = Carbon\Carbon::now();
                                                // echo $mytime->toDateTimeString();
                                            @endphp
                                            {{-- {{ $mytime->format('d-M-Y H:i') }}  --}}
                                            {{ formatFecha1($mytime) }} {{ $mytime->format('h:i A') }}
                                        </small>

                                    </div>
                                </div>
                            </div>


                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
               END CONTACT AREA
        ================================= -->
@endsection
