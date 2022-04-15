@extends('layouts.app')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    @if(auth()->user()->active === ON)
        {{ __('You are logged in!') }}
    @else
        {{ __('Your account is inactive!') }}
    @endif
@endsection
