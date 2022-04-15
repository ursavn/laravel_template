@extends('layouts.app')

@section('title')
    {{ __('Users List') }}
@endsection

@section('content')
    @include('includes.alert-block')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="table-responsive shadow rounded">
                <table class="table table-center bg-white mb-0">
                    <thead>
                    <tr>
                        <th class="border-bottom p-3">
                            {{ __('No.') }}
                        </th>
                        <th class="border-bottom p-3" style="min-width: 220px;">
                            {{ __('Name') }}
                        </th>
                        <th class="text-center border-bottom p-3" style="min-width: 200px;">
                            {{ __('Email') }}
                        </th>
                        <th class="text-end border-bottom p-3" style="min-width: 200px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <!-- Start -->
                        <tr>
                            <th class="p-3">
                                #{{ $user->id }}
                            </th>
                            <td class="p-3">
                                <a href="#" class="text-primary">
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="{{ __('templates/landrick/images/client/01.jpg') }}"
                                            class="avatar avatar-ex-small rounded-circle shadow" alt=""
                                        >
                                        @if (strlen($user->name) > 50)
                                            <span class="ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->name }}">
                                                {{ substr($user->name, 0, 50).'...' }}
                                            </span>
                                        @else
                                            <span class="ms-2">
                                                {{ $user->name }}
                                            </span>
                                        @endif
                                    </div>
                                </a>
                            </td>
                            <td class="text-center p-3">
                                {{ $user->email }}
                            </td>
                            <td class="d-flex justify-content-end p-3">
                                <a
                                    class="btn btn-dark mr-1"
                                    href="{{ route('users.detail', ['id' => $user->id]) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="User detail"
                                >
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a
                                    class="btn btn-warning mr-1"
                                    href="{{ route('users.edit', ['id' => $user->id]) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="User edit"
                                >
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a
                                    class="btn btn-info mr-1"
                                    href="{{ route('users.get-change-password', ['id' => $user->id]) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Change Password"
                                >
                                    <i class="ti ti-key"></i>
                                </a>
                                <form method="POST" action="{{ route('users.active', ['id' => $user->id]) }}">
                                    @csrf
                                    <input type="hidden" name="active" value="{{ $user->active }}">
                                    <button
                                        type="submit" class="btn btn-danger mr-1"
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
                        <!-- End -->
                    @empty
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row text-center">
        <!-- PAGINATION START -->
        <div class="col-12 mt-4">
            <div class="d-md-flex align-items-center text-center justify-content-between">
                <span class="text-muted me-3">Showing 1 - 10 out of 50</span>
                <ul class="pagination mb-0 justify-content-center mt-4 mt-sm-0">
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next</a></li>
                </ul>
            </div>
        </div><!--end col-->
        <!-- PAGINATION END -->
    </div><!--end row-->
@endsection
