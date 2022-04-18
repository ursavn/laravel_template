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
                        <th class="text-center border-bottom p-3" style="min-width: 200px;">
                            {{ __('Role') }}
                        </th>
                        <th class="text-right border-bottom p-3" style="width: 180px;"></th>
                        <th class="text-center border-bottom p-3" style="width: 80px;"></th>
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
                                        @if (mb_strlen($user->name) > 50)
                                            <span class="ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->name }}">
                                                {{ mb_substr($user->name, 0, 50).'...' }}
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
                            <td class="text-center p-3">
                                {{ isset($user->roles[0]) ? $user->roles[0]->name : '' }}
                            </td>
                            <td class="text-center p-3">
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
                            </td>
                            <td class="text-center p-3">
                                <form method="POST" action="{{ route('users.active', ['id' => $user->id]) }}">
                                    @csrf
                                    <input type="hidden" name="active" value="{{ $user->active }}">
                                    <label class="switch mr-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ $user->active == ON ? 'Deactive' : 'Active' }}"
                                    >
                                        <input type="checkbox" onchange="this.form.submit()"
                                            @if ($user->active == ON)
                                               checked
                                            @endif
                                        >
                                        <span class="slider round"></span>
                                    </label>
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

    @if ($users->lastPage() > 1)
        {{ $users->links('includes.pagination') }}
    @endif
@endsection
