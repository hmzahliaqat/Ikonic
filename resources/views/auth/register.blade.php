{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/symox-laravel/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2022 11:54:22 GMT -->
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
                                    <h5 class="text-primary">Register Account</h5>
                                    <p class="text-muted">Get your free  account now.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" :value="old('email')" required autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Username</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter username" :value="old('name')" required autofocus autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password" :value="__('Password')">Password</label>
                                            <input type="password" name="password" class="form-control"  id="password" placeholder="Enter password" required autocomplete="new-password">
                                              <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Enter password" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                        </div>



                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                            <label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Register</button>
                                        </div>



                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">Already have an account ? <a href="/login" class="fw-medium text-primary"> Login</a></p>
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

<!-- Mirrored from themesdesign.in/symox-laravel/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2022 11:54:22 GMT -->
</html>








