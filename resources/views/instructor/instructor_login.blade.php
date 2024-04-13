<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- {{ asset('backend/') }} --}}

    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Cursos en Linea | Instructor Login</title>

</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="">
                <div class="row g-0">

                    {{-- Imagen login-cover --}}
                    <div
                        class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                            <div class="card-body">
                                <img src="{{ asset('backend/assets/images/login-images/login-cover.svg') }}"
                                    class="img-fluid auth-img-cover-login" width="650" alt="" />
                            </div>
                        </div>

                    </div>

                    {{-- Forma Login --}}
                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                            <div class="card-body p-sm-5">
                                <div class="">
                                    <div class="mb-3 text-center">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" width="60" alt="">
                                        </a>
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Instructor - Cursos en Linea</h5>
                                        <p class="mb-0">Favor de ingresar sus credenciales</p>
                                    </div>

                                    <div class="form-body">

                                        <form method="POST" action="{{ route('login') }}" class="row g-3">
                                            @csrf

                                            {{-- Correo Electrónico --}}
                                            <div class="col-12">

                                                <label for="inputEmailAddress" class="form-label">Correo Electrónico</label>

                                                <input class="form-control @error('email') is-invalid @enderror" 
                                                        name="email" 
                                                        id="email" 
                                                        type="email" 
                                                        placeholder="jhon@example.com"
                                                >

                                                @error('email')
                                                    <span class="text-danger" style="text-font-weight: lighter">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>

                                            {{-- Contraseña --}}
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Contraseña</label>

                                                <div class="input-group" id="show_hide_password">

                                                    <input class="form-control border-end-0 @error('password') is-invalid @enderror"
                                                        type="password"
                                                        id="password" 
                                                        name="password"
                                                        placeholder="Entre su contraseña"
                                                    > 

                                                    <a href="javascript:;"
                                                        class="input-group-text bg-transparent">
                                                        <i class="bx bx-hide"></i>
                                                    </a>

                                                </div>

                                                @error('password')
                                                    <br>
                                                    <span class="text-danger" style="text-font-weight: lighter">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>

                                            {{-- Recordarme --}}
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" 
                                                        type="checkbox"
                                                        {{-- id="flexSwitchCheckChecked" --}}
                                                        id="remember_me"
                                                        name="remember"
                                                    >
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Recordarme</label>
                                                </div>
                                            </div>

                                            {{-- Olvide mi contraseña --}}
                                            <div class="col-md-6 text-end"> 
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Olvide mi contraseña</a>
                                                @endif
                                            </div>

                                            {{-- Botón Iniciar Sesión --}}
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Iniciar
                                                        Sesión</button>
                                                </div>
                                            </div>

                                            {{-- Registrarse aquí --}}
                                            <div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Aun no tienes una cuenta <a
                                                            href="authentication-signup.html">Registrarse aquí</a>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                    <div class="login-separater text-center mb-5"> <span>O Iniciar Sesión con:</span>
                                        <hr>
                                    </div>
                                    <div class="list-inline contacts-social text-center">
                                        <a href="javascript:;"
                                            class="list-inline-item bg-facebook text-white border-0 rounded-3"><i
                                                class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-twitter text-white border-0 rounded-3"><i
                                                class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-google text-white border-0 rounded-3"><i
                                                class="bx bxl-google"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i
                                                class="bx bxl-linkedin"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
