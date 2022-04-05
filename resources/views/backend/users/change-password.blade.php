@extends('layouts.app')

@section('title')
    {{ __('Change Password') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.post-change-password', $id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                            <div class="form-icon position-relative">
                                <i data-feather="key" class="fea icon-sm icons"></i>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <div class="form-icon position-relative">
                                <i data-feather="key" class="fea icon-sm icons"></i>
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
