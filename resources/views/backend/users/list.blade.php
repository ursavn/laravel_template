@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User List</h2>
        @include('includes.alert-block')
        <a class="btn btn-primary mb-3" href="{{ route('users.create') }}">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('users.detail', ['id' => $user->id]) }}">Detail</a>
                        <a class="btn btn-warning" href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('users.get-change-password', ['id' => $user->id]) }}">Change Password</a>
                        <form method="POST" action="{{ route('users.active', ['id' => $user->id]) }}">
                            @csrf
                            <input type="hidden" name="active" value="{{ $user->active }}">
                            <input type="submit" class="btn btn-danger" value="{{ $user->active == ON ? 'Deactivate' : 'Active' }}">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
