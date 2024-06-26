@extends('frontend.dashboard.user_dashboard')
@section('content')

{{-- Breadcrumb Content --}}
<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
    {{-- Foto de Perfil y Nombre de User --}}
    <div class="media media-card align-items-center">

        {{-- Foto de Perfil --}}
        <div class="media-img media--img media-img-md rounded-full">
            {{-- <img class="rounded-full" src="{{ asset('frontend/images/small-avatar-1.jpg') }}" alt="Student thumbnail image"> --}}
            <img class="rounded-full" src="{{ (!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="Student thumbnail image">
        </div>

        
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

{{-- Settings --}}
{{-- <div class="dashboard-heading mb-5">
    <h3 class="fs-22 font-weight-semi-bold">Settings</h3>
</div> --}}

{{-- Editar Perfil, Foto, Formulario: Nombre, Username, Phone, Email, Bio(textarea) | Botón Guardar Cambios --}}
{{-- <div class="setting-body">

    <!-- Titulo Edit Profile -->
    <h3 class="fs-17 font-weight-semi-bold pb-4">{{ __('Edit Profile') }}</h3>

    <!-- Formulario: Foto de Perfil, Nombre, Username, Phone, Email, Bio(textarea) | Botón Guardar Cambios -->
    <form method="post" class="row pt-40px" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Foto de Perfil y Botón para Upload Imagen -->
        <div class="media media-card align-items-center">

            <!-- Foto de Perfil -->
            <div class="media-img media-img-lg mr-4 bg-gray">
                <img class="mr-3" src="{{ (!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="avatar image">
            </div>

            <!-- Botón de Upload -->
            <div class="media-body">

                <div class="file-upload-wrap file-upload-wrap-2">
                    <input type="file" name="photo" class="multi file-upload-input with-preview" multiple>
                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>{{ __('Upload a Photo') }}</span>
                </div><!-- file-upload-wrap -->

                <p class="fs-14">{{ __('Max file size is 1MB, Minimum dimension: 200x200 And Suitable files are .jpg & .png') }}</p>
                
            </div>

        </div>

        <!-- Nombre -->
        <div class="input-box col-lg-6">
            <label class="label-text">{{ __('Name') }}</label>
            <div class="form-group">
                <input class="form-control form--control" type="text" name="name" value="{{ $profileData->name }}">
                <span class="la la-user input-icon"></span>
            </div>
        </div><!-- end input-box -->

        <!-- User Name -->
        <div class="input-box col-lg-6">
            <label class="label-text">{{ __('Username Short') }}</label>
            <div class="form-group">
                <input class="form-control form--control" type="text" name="username" value="{{ $profileData->username }}">
                <span class="la la-user input-icon"></span>
            </div>
        </div><!-- end input-box -->

        <!-- Email Address -->
        <div class="input-box col-lg-6">
            <label class="label-text">{{ __('Email') }}</label>
            <div class="form-group">
                <input class="form-control form--control" type="email" name="email" value="{{ $profileData->email }}">
                <span class="la la-envelope input-icon"></span>
            </div>
        </div><!-- end input-box -->

        <!-- Phone Number -->
        <div class="input-box col-lg-12">
            <label class="label-text">{{ __('Phone Number') }}</label>
            <div class="form-group">
                <input class="form-control form--control" type="number" name="phone" value="{{ $profileData->phone }}">
                <span class="la la-phone input-icon"></span>
            </div>
        </div><!-- end input-box -->

        <!-- Dirección -->
        <div class="input-box col-lg-12">
            <label class="label-text">{{ __('Address') }}</label>
            <div class="form-group">
                <input class="form-control form--control" type="text" name="address" value="{{ $profileData->address }}">
                <span class="la la-pencil input-icon"></span>
            </div>
        </div><!-- end input-box -->

        <!-- Bio -->
        <div class="input-box col-lg-12">
            <label class="label-text">{{ __('Description') }}</label>
            <div class="form-group">
                <textarea class="form-control form--control user-text-editor pl-3" name="message">
                    {{ $profileData->description }}
                </textarea>
            </div>
        </div>
        <!-- end input-box -->


        <!-- Botón de Guardar cambios -->
        <div class="input-box col-lg-12 py-2">
            <button class="btn theme-btn">{{ __('Save Changes') }}</button>
        </div><!-- end input-box -->

    </form>

</div> --}}
<!-- end setting-body -->


{{-- Tabs | Profile, password, Change Email, Withdraw, Account --}}
<ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">

    <li class="nav-item">
        <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="false">
            {{ __('Profile') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true">
            {{ __('Password') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="change-email-tab" data-toggle="tab" href="#change-email" role="tab" aria-controls="change-email" aria-selected="false">
            {{ __('Change Email') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="change-email-tab" data-toggle="tab" href="#change-language" role="tab" aria-controls="change-language" aria-selected="false">
            {{ __('Change Language') }}
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" role="tab" aria-controls="withdraw" aria-selected="false">
            Withdraw
        </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">
            {{ __('Account') }}
        </a>
    </li>

</ul>

{{-- Tabs | Contenido --}}
<div class="tab-content" id="myTabContent">

    {{-- Tab | Editar Perfil, Foto, Formulario: Nombre, Username, Phone, Email, Bio(textarea) | Botón Guardar Cambios  --}}
    <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
        <div class="setting-body">

            <!-- Titulo Edit Profile -->
            <h3 class="fs-17 font-weight-semi-bold pb-4">{{ __('Edit Profile') }}</h3>
        
            <!-- Formulario: Foto de Perfil, Nombre, Username, Phone, Email, Bio(textarea) | Botón Guardar Cambios -->
            <form method="post" class="row pt-40px" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                @csrf
        
                <!-- Foto de Perfil y Botón para Upload Imagen -->
                <div class="media media-card align-items-center">
        
                    <!-- Foto de Perfil -->
                    <div class="media-img media-img-lg mr-4 bg-gray">
                        <img class="mr-3" src="{{ (!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="avatar image">
                    </div>
        
                    <!-- Botón de Upload -->
                    <div class="media-body">
        
                        <div class="file-upload-wrap file-upload-wrap-2">
                            <input type="file" name="photo" class="multi file-upload-input with-preview" multiple>
                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>{{ __('Upload a Photo') }}</span>
                        </div><!-- file-upload-wrap -->
        
                        <p class="fs-14">{{ __('Max file size is 1MB, Minimum dimension: 200x200 And Suitable files are .jpg & .png') }}</p>
                        
                    </div>
        
                </div>
        
                <!-- Nombre -->
                <div class="input-box col-lg-6">
                    <label class="label-text">{{ __('Name') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="name" value="{{ $profileData->name }}">
                        <span class="la la-user input-icon"></span>
                    </div>
                </div><!-- end input-box -->
        
                <!-- User Name -->
                <div class="input-box col-lg-6">
                    <label class="label-text">{{ __('Username Short') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="username" value="{{ $profileData->username }}">
                        <span class="la la-user input-icon"></span>
                    </div>
                </div><!-- end input-box -->
        
                <!-- Email Address -->
                <div class="input-box col-lg-6">
                    <label class="label-text">{{ __('Email') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="email" name="email" value="{{ $profileData->email }}">
                        <span class="la la-envelope input-icon"></span>
                    </div>
                </div><!-- end input-box -->
        
                <!-- Phone Number -->
                <div class="input-box col-lg-12">
                    <label class="label-text">{{ __('Phone Number') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="number" name="phone" value="{{ $profileData->phone }}">
                        <span class="la la-phone input-icon"></span>
                    </div>
                </div><!-- end input-box -->
        
                <!-- Dirección -->
                <div class="input-box col-lg-12">
                    <label class="label-text">{{ __('Address') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="address" value="{{ $profileData->address }}">
                        <span class="la la-pencil input-icon"></span>
                    </div>
                </div><!-- end input-box -->
        
                <!-- Bio / Descripción -->
                <div class="input-box col-lg-12">
                    <label class="label-text">{{ __('Description') }}</label>
                    <div class="form-group">
                        <textarea class="form-control form--control user-text-editor pl-3" name="description">{{ $profileData->description }}</textarea>
                    </div>
                </div>
                <!-- end input-box -->
        
        
                <!-- Botón de Guardar cambios -->
                <div class="input-box col-lg-12 py-2">
                    <button class="btn theme-btn">{{ __('Save Changes') }}</button>
                </div><!-- end input-box -->
        
            </form>
        
        </div>
    </div>
    <!-- end tab-pane -->

    {{-- Tab | Editar Contraseña, oldpassword, newpassword, confirmnewpassword | Botón de Cambiar Contraseña | Recuperar Contraseña  --}}
    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

        <div class="setting-body">

            <h3 class="fs-17 font-weight-semi-bold pb-4">{{ __('Change Password') }}</h3>

            <!-- Cambiar Contraseña -->
            <form method="post" class="row" action="{{ route('user.password.update') }}">
                @csrf

                <!-- old password -->
                <div class="input-box col-lg-4">
                    <label class="label-text">{{ __('Current Password') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control @error('old_password') is-invalid @enderror" type="password" name="old_password" id="old_password" placeholder="{{ __('Enter current password') }}">
                        @error('old_password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <span class="la la-lock input-icon"></span>
                    </div>
                </div><!-- end input-box -->

                <!-- new password -->
                <div class="input-box col-lg-4">
                    <label class="label-text">{{ __('New Password') }} ({{ __('Min. 8 characters') }})</label>
                    <div class="form-group">
                        <input class="form-control form--control @error('new_password') is-invalid @enderror"" type="password" name="new_password" id="new_password" placeholder="{{ __('Enter new password') }}">
                        @error('new_password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <span class="la la-lock input-icon"></span>
                    </div>
                </div><!-- end input-box -->

                <!-- confirm new password -->
                <div class="input-box col-lg-4">
                    <label class="label-text">{{ __('Confirm New Password') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="{{ __('Confirm new password') }}">
                        <span class="la la-lock input-icon"></span>
                    </div>
                </div><!-- end input-box -->

                <!-- Botón Cambiar Contraseña -->
                <div class="input-box col-lg-12 py-2">
                    <button class="btn theme-btn">{{ __('Change Password') }}</button>
                </div><!-- end input-box -->

            </form>

            <!-- Recuperar Contraseña  -->
            <form method="post" class="pt-5 mt-5 border-top border-top-gray">
                <h3 class="fs-17 font-weight-semi-bold pb-1">{{ __('Recover Password') }}</h3>
                <p class="pb-4">{{ __('Enter the email of your account to reset password. Then you will receive a link to email to reset the password. If you have any issue about reset password') }}
                    <a href="contact.html" class="text-color">{{ __('contact us') }}</a></p>
                <div class="input-box">
                    <label class="label-text">{{ __('Email Address') }}</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="email" name="email" placeholder="{{ __('Enter email address') }}">
                        <span class="la la-envelope input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box py-2">
                    <button class="btn theme-btn">{{ __('Recover Password') }}</button>
                </div><!-- end input-box -->
            </form>

        </div><!-- end setting-body -->
    </div>
    <!-- end tab-pane -->

    {{-- Tab | Change Email --}}
    <div class="tab-pane fade" id="change-email" role="tabpanel" aria-labelledby="change-email-tab">
        <div class="setting-body">
            <h3 class="fs-17 font-weight-semi-bold pb-4">Change Email</h3>
            <form method="post" class="row">
                <div class="input-box col-lg-4">
                    <label class="label-text">Old Email</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" placeholder="Old Email">
                        <span class="la la-envelope input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-4">
                    <label class="label-text">New Email</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" placeholder="New Email">
                        <span class="la la-envelope input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-4">
                    <label class="label-text">Confirm New Email</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" placeholder="Confirm New Email">
                        <span class="la la-envelope input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12 py-2">
                    <button class="btn theme-btn">Change Email</button>
                </div><!-- end input-box -->
            </form>
        </div><!-- end setting-body -->
    </div>
    <!-- end tab-pane -->

    {{-- Tab | Change Language --}}
    <div class="tab-pane fade" id="change-language" role="tabpanel" aria-labelledby="change-language-tab">
        <div class="setting-body">

            <h3 class="fs-17 font-weight-semi-bold pb-4">{{ __('Change Language') }}</h3>

            <p class="pb-4">{{ __('Change your preferred language') }}</p>

            <form method="post" class="mb-40px" action="{{ route('user.update.change.language') }}">
                @csrf
    
                {{-- Check que lenguaje prefiere usuario, campo language de la tabla users --}}
                @php
                    $locale = $profileData->language;
                @endphp
                {{-- @dd($locale) --}}
            
    
                {{-- Check que lenguaje esta en la sesión --}}
                {{-- @php
                    $locale = App::getLocale();
                @endphp --}}
    
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
    </div>
    <!-- end tab-pane -->

    {{-- Tab | Seleccionar Método de Retiro --}}
    {{-- <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
        <div class="setting-body">
            <h3 class="fs-17 font-weight-semi-bold pb-4">Select a Withdraw Method</h3>
            <form method="post" class="row mb-40px">
                <div class="col-lg-2 responsive-column-half">
                    <div class="custom-control custom-radio mb-3 pl-0">
                        <input type="radio" class="custom-control-input" id="bankTransfer" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="bankTransfer">
                            <span class="font-weight-semi-bold text-black d-block">Bank Transfer</span>
                            <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                        </label>
                    </div>
                </div><!-- end col-lg-2 -->
                <div class="col-lg-2 responsive-column-half">
                    <div class="custom-control custom-radio mb-3 pl-0">
                        <input type="radio" class="custom-control-input" id="eCheck" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="eCheck">
                            <span class="font-weight-semi-bold text-black d-block">E-Check</span>
                            <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                        </label>
                    </div>
                </div><!-- end col-lg-2 -->
                <div class="col-lg-2 responsive-column-half">
                    <div class="custom-control custom-radio mb-3 pl-0">
                        <input type="radio" class="custom-control-input" id="payoneer" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="payoneer">
                            <span class="font-weight-semi-bold text-black d-block">Payoneer</span>
                            <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                        </label>
                    </div>
                </div><!-- end col-lg-2 -->
                <div class="col-lg-2 responsive-column-half">
                    <div class="custom-control custom-radio mb-3 pl-0">
                        <input type="radio" class="custom-control-input" id="PayPal" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="PayPal">
                            <span class="font-weight-semi-bold text-black d-block">PayPal</span>
                            <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                        </label>
                    </div>
                </div><!-- end col-lg-2 -->
                <div class="col-lg-2 responsive-column-half">
                    <div class="custom-control custom-radio mb-3 pl-0">
                        <input type="radio" class="custom-control-input" id="skrill" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="skrill">
                            <span class="font-weight-semi-bold text-black d-block">Skrill</span>
                            <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                        </label>
                    </div>
                </div><!-- end col-lg-2 -->
                <div class="col-lg-2 responsive-column-half">
                    <div class="custom-control custom-radio mb-3 pl-0">
                        <input type="radio" class="custom-control-input" id="stripe" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="stripe">
                            <span class="font-weight-semi-bold text-black d-block">Stripe</span>
                            <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                        </label>
                    </div>
                </div><!-- end col-lg-2 -->
            </form>
            <form method="post" class="row">
                <h3 class="fs-17 font-weight-semi-bold pb-4 col-lg-12">Account info</h3>
                <div class="input-box col-lg-4">
                    <label class="label-text">Account Name</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" value="Alex Smith">
                        <span class="la la-user input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-4">
                    <label class="label-text">Account Number</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" value="3275476222500">
                        <span class="la la-pencil input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-4">
                    <label class="label-text">Bank Name</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" value="South State Bank">
                        <span class="la la-bank input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-6">
                    <label class="label-text">IBAN</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" value="3030">
                        <span class="la la-pencil input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-6">
                    <label class="label-text">BIC/SWIFT</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="text" value="CDDHDBBL">
                        <span class="la la-pencil input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12 py-2">
                    <button class="btn theme-btn">Save withdraw account</button>
                </div><!-- end input-box -->
            </form>
        </div><!-- end setting-body -->
    </div> --}}
    <!-- end tab-pane -->

    {{-- Tab | Cuenta Activar o Desactivar --}}
    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
        <div class="setting-body">
            <h3 class="fs-17 font-weight-semi-bold pb-4">My Account</h3>
            <form method="post" class="mb-40px">
                <div class="custom-control-wrap d-flex flex-wrap align-items-center">
                    <div class="custom-control custom-radio pl-0 flex-shrink-0 mr-3 mb-2">
                        <input type="radio" class="custom-control-input" id="deactivateAccount" name="radio-stacked" required>
                        <label class="custom-control-label custom--control-label custom--control-label-boxed" for="deactivateAccount">
                            <span class="font-weight-semi-bold text-black">Deactivate Account</span>
                        </label>
                    </div>
                    <button class="btn theme-btn mb-2">Deactivate</button>
                </div><!-- end custom-control-wrap -->
            </form>
            <div class="section-block"></div>
            <div class="danger-zone pt-40px">
                <h4 class="fs-17 font-weight-semi-bold text-danger">Delete Account Permanently</h4>
                <p class="pt-1 pb-4"><span class="text-warning">Warning: </span>Once you delete your account, there is no going back. Please be certain.</p>
                <button class="btn theme-btn" data-toggle="modal" data-target="#deleteModal">Delete my account</button>
            </div>
        </div><!-- end setting-body -->
    </div>
    <!-- end tab-pane -->

</div>
<!-- end tab-content -->


@endsection