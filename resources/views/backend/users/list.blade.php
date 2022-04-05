@extends('layouts.app')

@section('title')
    {{ __('Users List') }}
@endsection

@section('content')
    @include('includes.alert-block')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <a class="btn btn-success mb-3" href="{{ route('users.create') }}">Create</a>
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
                                <td class="d-flex">
                                    <a class="btn btn-dark mr-1"
                                       href="{{ route('users.detail', ['id' => $user->id]) }}"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="User detail"
                                    >
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a class="btn btn-warning mr-1"
                                       href="{{ route('users.edit', ['id' => $user->id]) }}"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="User edit"
                                    >
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a class="btn btn-info mr-1"
                                       href="{{ route('users.get-change-password', ['id' => $user->id]) }}"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Change Password"
                                    >
                                        <i class="ti ti-key"></i>
                                    </a>
                                    <form method="POST" action="{{ route('users.active', ['id' => $user->id]) }}">
                                        @csrf
                                        <input type="hidden" name="active" value="{{ $user->active }}">
                                        <button type="submit" class="btn btn-danger mr-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{{ $user->active == ON ? 'Active' : 'Deactivate' }}"
                                        >
                                            @if($user->active == ON)
                                                <i class="ti ti-lock"></i>
                                            @else
                                                <i class="ti ti-lock-open"></i>
                                            @endif
                                        </button>
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
            </div>
        </div>
    </div>
@endsection
