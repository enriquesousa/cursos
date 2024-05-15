@extends('frontend.dashboard.user_dashboard')
@section('content')
    {{-- Breadcrumb Content --}}
    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
        {{-- Foto de Perfil y Nombre de User --}}
        <div class="media media-card align-items-center">

            {{-- Foto de Perfil --}}
            <div class="media-img media--img media-img-md rounded-full">
                {{-- <img class="rounded-full" src="{{ asset('frontend/images/small-avatar-1.jpg') }}" alt="Student thumbnail image"> --}}
                <img class="rounded-full"
                    src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                    alt="Student thumbnail image">
            </div>

            <!-- Hola, Nombre -->
            <div class="media-body">

                <h2 class="section__title fs-30">Hola, {{ $profileData->name }}</h2>

                {{-- Calificación Estrellas --}}
                {{-- <div class="rating-wrap d-flex align-items-center pt-2">
                <div class="review-stars">
                    <span class="rating-number">4.4</span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star-o"></span>
                </div>
                <span class="rating-total pl-1">(20,230)</span>
            </div> --}}
                <!-- end rating-wrap -->

            </div>
            <!-- end media-body -->

            <!-- Última Interacción, Tiempo restante para logout, Ultimo Login y ip -->
            {{-- <div class="ml-5">

                <!-- Última Interacción -->
                <div class="d-block fs-14 lh-20">
                    <span class="rating-total pl-1"><strong>{{ __('Last Interacted') }}:</strong>
                        {{ Carbon\Carbon::parse($profileData->last_interacted)->diffForHumans() }}</span>
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
                    <span class="d-block fs-14 lh-20"><strong>{{ __('Time to logout') }}:</strong>
                        {{ $hours }}</span>
                </div>

                <!-- Ultimo Login -->
                <div class="text-sm">
                    <span class="d-block fs-14 lh-20"><strong>{{ __('Last login') }}:</strong>
                        {{ Carbon\Carbon::parse($profileData->last_login_at)->diffForHumans() }}</span>
                </div>

                <!-- Desde IP -->
                <div class="text-sm">
                    <span class="d-block fs-14 lh-20"><strong>Desde IP</strong>: {{ $profileData->last_login_ip }}</span>
                </div>

            </div> --}}
            <!-- end media-body -->

        </div>

        {{-- Boton de Upload --}}
        {{-- <div class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">
        <input type="file" name="files[]" class="multi file-upload-input">
        <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload a course</span>
    </div> --}}
        <!-- file-upload-wrap -->
    </div>
    <!-- end breadcrumb-content -->

    <div class="section-block mb-5"></div>

    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">{{ __('My Profile') }}</h3>
    </div>

    <div class="profile-detail mb-5">
        <ul class="generic-list-item generic-list-item-flash">

            <li>
                <span class="profile-name">{{ __('Registration Date') }}:</span>
                <span class="profile-desc">{{ formatFecha2($profileData->created_at) }}</span>
            </li>

            <li>
                <span class="profile-name">{{ __('Name') }}:</span>
                <span class="profile-desc">{{ $profileData->name }}</span>
            </li>

            <li>
                <span class="profile-name">{{ __('Username Short') }}:</span>
                <span class="profile-desc">{{ $profileData->username }}</span>
            </li>


            {{-- <li>
            <span class="profile-name">First Name:</span>
            <span class="profile-desc">Alex</span>
        </li> --}}

            {{-- <li>
            <span class="profile-name">Last Name:</span>
            <span class="profile-desc">Smith</span>
        </li> --}}

            {{-- <li>
            <span class="profile-name">User Name:</span>
            <span class="profile-desc">alex-admin</span>
        </li> --}}

            <li>
                <span class="profile-name">{{ __('Email') }}:</span>
                <span class="profile-desc">{{ $profileData->email }}</span>
            </li>

            <li>
                <span class="profile-name">{{ __('Phone Number') }}:</span>
                <span class="profile-desc">{{ formatPhoneNumber($profileData->phone) }}</span>
            </li>

            {{-- <li>
            <span class="profile-name">Bio:</span>
            <span class="profile-desc">Hello! I am a Alex Smith, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</span>
        </li> --}}

            <li>
                <span class="profile-name">Bio:</span>
                <span class="profile-desc">{{ $profileData->description }}</span>
            </li>

        </ul>
    </div>
@endsection
