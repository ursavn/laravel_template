@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User List</h2>
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
                        <a class="btn btn-info">Change Password</a>
                        <a class="btn btn-danger">Deactivate</a>
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
