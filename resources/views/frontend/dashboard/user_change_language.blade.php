@extends('frontend.dashboard.user_dashboard')
@section('content')

    <div class="setting-body">
        <h3 class="fs-17 font-weight-semi-bold pb-4">{{ __('Change Language') }}</h3>

        <form method="post" class="mb-40px" action="{{ route('user.update.change.language') }}">
            @csrf


            @php
                $locale = App::getLocale();
            @endphp

            <input type="radio" name="lang" value="es" {{ $locale === 'es' ? 'checked' : '' }}>
            <img src="{{ asset('backend/assets/flags/4x3/mx.svg') }}" alt="" height="15">
            <label for="html">Español (Spanish)</label>
            <br>

            <input type="radio" name="lang" value="en" {{ $locale === 'en' ? 'checked' : '' }}>
            <img src="{{ asset('backend/assets/flags/4x3/us.svg') }}" alt="" height="15">
            <label for="css">Inglés (English)</label>
            <br>

            <button class="btn theme-btn mb-2 mt-4">Activar</button>

        </form>

        <div class="section-block"></div>


    </div><!-- end setting-body -->

@endsection
