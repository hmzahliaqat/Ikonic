
    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}


    <head>

        <meta charset="utf-8" />
        <title>ETM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>



    <body data-layout="horizontal" data-topbar="dark">

        <div class="authentication-bg min-vh-100">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">

                           <div class="text-center mb-4">
                                <a href="index.html">
                                </a>
                           </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                    </div>
                                    <div class="p-2 mt-4">

                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <form  method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label  class="form-label" for="email" :value="__('Email')">Email</label>
                                                <input  type="email" name="email" class="form-control" id="email" placeholder="Enter email" :value="old('email')" required autofocus autocomplete="username">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                            <div class="mb-3">
                                                <div class="float-end">

                                                    @if (Route::has('password.request'))
                                                                  <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                                    @endif
                                                </div>
                                                <label class="form-label" for="password" :value="__('Password')">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Enter password"  name="password"
                                                required autocomplete="current-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            </div>

                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>

                                            <div class="mt-3 text-end">
                                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                            </div>



                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Don't have an account ? <a href="/register" class="fw-medium text-primary"> Signup now </a> </p>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div><!-- end col -->
                    </div><!-- end row -->



                </div>
            </div><!-- end container -->
        </div>
        <!-- end authentication section -->

            <!-- JAVASCRIPT -->
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/feather-icons/feather.min.js"></script>

        </body>







