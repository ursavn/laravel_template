@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>
                <div class="card-body">
                    <div>Name: {{ $user->name }}</div>
                    <div>Email: {{ $user->email }}</div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-info" href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
