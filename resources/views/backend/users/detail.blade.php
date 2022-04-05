@extends('layouts.app')

@section('title')
    {{ __('User Detail') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <div>Name: {{ $user->name }}</div>
                    <div>Email: {{ $user->email }}</div>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('users.edit', ['id' => $user->id]) }}">{{ __('Edit User') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
