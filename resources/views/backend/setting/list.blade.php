@extends('layouts.app')

@section('content')
    @include('includes.alert-block')
    <div class="container">
        <h2>Setting List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($setting as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('settings.update', ['id' => $item->id]) }}">
                            @csrf
                            <input type="hidden" name="status" value="{{ $item->status }}">
                            <label class="switch mr-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="{{ $item->status == ON ? 'Disable' : 'Enable' }}"
                            >
                                <input type="checkbox" onchange="this.form.submit()"
                                    @if ($item->status == ON)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2"></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
