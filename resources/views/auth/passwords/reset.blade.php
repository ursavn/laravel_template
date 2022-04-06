@extends('layouts.default')

@section('content')
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-signin p-4 bg-white rounded shadow">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

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

                            <div class="form-floating mb-3">
                                <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword"
                                    name="password"
                                    value="{{ $password ?? old('password') }}"
                                    required
                                    autocomplete="new-password"
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
                                    class="form-control"
                                    id="floatingConfirmPassword"
                                    name="password_confirmation"
                                    required
                                    autocomplete="confirm-password"
                                >
                                <label for="floatingConfirmPassword">
                                    {{ __('Confirm Password') }}
                                </label>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">
                                {{ __('Save') }}
                            </button>

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
