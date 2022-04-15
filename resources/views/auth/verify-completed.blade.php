@extends('layouts.default')

@section('content')
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-signin p-4 bg-white rounded shadow">
                    <div class="card-header bg-white">{{ __('Verify Completed') }}</div>
                    <div class="card-body">
                        {{ __('Verify your email Completed.') }}
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="btn btn-primary">{{ __('OK') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--end container-->
</section><!--end section-->
@endsection
