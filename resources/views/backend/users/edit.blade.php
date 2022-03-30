@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                <input name="id" value="{{ $user->id }}" type="hidden">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" name="name" value="{{ $user->name }}" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" value="{{ $user->email }}" type="text">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
