<style>
    html{
        font-family: arial, sans-serif;
    }
    .container {
        height: 100vh;
        background: #d2d6de;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card {
        width: 30%;
        background: #ffffff;
        padding: 20px 35px;
        border-radius: 3px;
    }
    .card-header{
        text-align: center;
        font-size: 24px;
        margin-bottom: 25px;
        color: #666;
    }
    .card-body div {
        margin-bottom: 10px;
    }
    .form-control {
        width: 100%;
        height: 40px;
        padding: 8px;
        margin-bottom: 5px;
        border: 1px solid #dbdbdb;
        border-radius: 4px;
        outline: none;
    }
    .invalid-feedback {
        color: red;
    }
    .btn-primary {
        color: #ffffff;
        font-size: 18px;
        font-weight: 400;
        width: 100%;
        height: 40px;
        border-radius: 4px;
        background-color: #7B68EE;
        border: none;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
