@extends('frontend.dashboard.user_dashboard')
@section('content')
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


                    <!-- Última Interacción, Tiempo restante para logout, Ultimo Login y ip -->
                    <div class="container-fluid">
                        <div class="row mt-1">
                            <div class="col-sm-12 text-center">

                                <!-- User Name -->
                                <div class="d-block fs-14 lh-20">
                                    <span class="rating-total pl-1">
                                        <strong>{{ __('Name') }}:</strong>
                                        {{ $profileData->name }}
                                    </span>
                                </div>

                                <!-- Última Interacción -->
                                <div class="d-block fs-14 lh-20">
                                    <span class="rating-total pl-1">
                                        <strong>{{ __('Last Interacted') }}:</strong>
                                        {{ Carbon\Carbon::parse($profileData->last_interacted)->diffForHumans() }}
                                    </span>
                                </div>

                                <!-- Tiempo restante para logout -->
                                <div class="text-sm">
                                    @php
                                        $timeLeft =
                                            Config::get('session.lifetime') -
                                            Carbon\Carbon::parse($profileData->last_interacted)->diffInMinutes();
                                        $minutes = $timeLeft;
                                        $hours = intdiv($minutes, 60) . 'h ' . $minutes % 60 . 'min';
                                    @endphp
                                    <span class="d-block fs-14 lh-20">
                                        <strong>{{ __('Time to logout') }}:</strong>
                                        {{ $hours }}
                                    </span>
                                </div>

                                <!-- Ultimo Login -->
                                <div class="text-sm">
                                    <span class="d-block fs-14 lh-20">
                                        <strong>{{ __('Last login') }}:</strong>
                                        {{ Carbon\Carbon::parse($profileData->last_login_at)->diffForHumans() }}
                                    </span>
                                </div>

                                <!-- Desde IP -->
                                <div class="text-sm">
                                    <span class="d-block fs-14 lh-20">
                                        <strong>Desde IP</strong>:
                                        {{ $profileData->last_login_ip }}
                                    </span>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Copyright de TJ Web --}}
                    <div class="container-fluid">
                        <div class="row mt-4">

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
@endsection
