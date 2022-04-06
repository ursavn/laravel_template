@extends('layouts.default')

@section('content')
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-signin p-4 bg-white rounded shadow">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <a href="{{ route('home') }}">
                                <img
                                    src="{{ asset('templates/landrick/images/logo-icon.png') }}"
                                    class="avatar avatar-small mb-4 d-block mx-auto"
                                    alt=""
                                >
                            </a>
                            <h5 class="mb-3 text-center">
                                {{ __('Reset your password') }}
                            </h5>

                            <p class="text-muted">
                                {{ __('Please enter your email address. You will receive a link to create a new password via email.') }}
                            </p>

                            <div class="form-floating mb-3">
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="floatingEmail"
                                    placeholder="name@example.com"
                                    name="email"
                                    value="{{ $email ?? old('email') }}"
                                    required
                                    autocomplete="email"
                                    autofocus
                                >
                                <label for="floatingEmail">
                                    {{ __('Email address') }}
                                </label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100" type="submit">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <div class="col-12 text-center mt-3">
                                <p class="mb-0 mt-3">
                                    <small class="text-dark me-2">
                                        {{ __('Remember your password ?') }}
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
@endsection
