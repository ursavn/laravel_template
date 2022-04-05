@extends('layouts.default')

@section('content')
    <!-- Hero Start -->
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-signin p-4 bg-white rounded shadow">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <a href="{{ route('home') }}">
                                <img
                                    src="{{ asset('templates/landrick/images/logo-icon.png') }}"
                                    class="avatar avatar-small mb-4 d-block mx-auto" alt=""
                                />
                            </a>
                            <h5 class="mb-3 text-center">
                                {{ __('Register your account') }}
                            </h5>

                            <div class="form-floating mb-2">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="floatingName"
                                    placeholder="Harry"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <label for="floatingName">{{ __('Full Name') }}</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="floatingEmail"
                                    placeholder="name@example.com"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                />
                                <label for="floatingEmail">
                                    {{ __('Email Address') }}
                                </label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword"
                                    placeholder="Password"
                                    required
                                    autocomplete="password"
                                >
                                <label for="floatingPassword">
                                    {{ __('Password') }}
                                </label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    id="floatingConfirmPassword"
                                    placeholder="Confirm Password"
                                    required
                                    autocomplete="confirm-password"
                                >
                                <label for="floatingConfirmPassword">
                                    {{ __('Confirm Password') }}
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ __('I Accept') }} <a href="#" class="text-primary">
                                        {{ __('Terms And Condition') }}
                                    </a>
                                </label>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">
                                {{ __('Register') }}
                            </button>

                            <div class="col-12 text-center mt-3">
                                <p class="mb-0 mt-3">
                                    <small class="text-dark me-2">
                                        {{ __('Already have an account ?') }}
                                    </small>
                                    <a
                                        href="{{ route('login') }}"
                                        class="text-dark fw-bold"
                                    >
                                        {{ __('Sign in') }}
                                    </a>
                                </p>
                            </div><!--end col-->

                            <p class="mb-0 text-muted mt-3 text-center">©
                                <script>document.write(new Date().getFullYear());</script>
                                URSA.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
@endsection
