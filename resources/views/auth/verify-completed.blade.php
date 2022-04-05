@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Completed') }}</div>
                    <div class="card-body">
                        {{ __('Verify your email Completed.') }}
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="btn btn-primary">{{ __('OK') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
