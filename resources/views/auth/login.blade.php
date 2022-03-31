@extends('layouts.default')

@section('content')
    <!-- Hero Start -->
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-signin p-4 bg-white rounded shadow">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <a href="{{ route('home') }}">
                                <img
                                    src="{{ asset('templates/landrick/images/logo-icon.png') }}"
                                    class="avatar avatar-small mb-4 d-block mx-auto" alt=""
                                />
                            </a>
                            <h5 class="mb-3 text-center">
                                {{ __('Login') }}
                            </h5>

                            <div class="form-floating mb-2">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    id="floatingEmail"
                                    placeholder="name@example.com"
                                    required
                                    autofocus
                                    autocomplete="email"
                                />
                                <label for="floatingEmail">Email address</label>
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
                                    autocomplete="current-password"
                                />
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="flexCheckDefault"
                                            {{ old('remember') ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                @if (Route::has('password.request'))
                                    <p class="forgot-pass mb-0">
                                        <a
                                            href="{{ route('password.request') }}"
                                            class="text-dark small fw-bold"
                                        >
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </p>
                                @endif
                            </div>

                            <button class="btn btn-primary w-100" type="submit">
                                {{ __('Login') }}
                            </button>

                            <div class="col-12 text-center mt-3">
                                <p class="mb-0 mt-3">
                                    <small class="text-dark me-2">{{ __('Don\'t have an account ?') }}</small>
                                    <a
                                        href="{{ route('register') }}" class="text-dark fw-bold"
                                    >
                                        {{ __('Sign Up') }}
                                    </a>
                                </p>
                            </div><!--end col-->

                            <p class="mb-0 text-muted mt-3 text-center">©
                                <script>document.write(new Date().getFullYear());</script>
                                URSA.
                            </p>
                        </form>
                    </div>
                    @if(FACEBOOK_LOGIN == ON)
                        <a href="{{ route('facebook.login') }}">
                            {{ __('Login with Facebook') }}
                        </a>
                    @endif
                    @if(GOOGLE_LOGIN == ON)
                        <a href="{{ url('google.login') }}">
                            {{ __('Login with Google') }}
                        </a>
                    @endif
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
@endsection
