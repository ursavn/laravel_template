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
    .offset-md-4 {
        color: #7B68EE;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }
    a {
        color: #7B68EE;
        text-decoration: none;
    }
    .login-with a {
        border: 1px solid rgba(0,0,0,.26);
        color: rgba(0,0,0,.87);
        border-radius: 2px;
        padding: 8px;
        margin-right: 20px;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __() }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            <div class="login-with">
                @if(FACEBOOK_LOGIN == ON)
                    <a href="{{ route('facebook.login') }}">
                        Login with Facebook
                    </a>
                @endif
                @if(GOOGLE_LOGIN == ON)
                    <a href="{{ url('google.login') }}">
                        Login with Google
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
