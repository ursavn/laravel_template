@extends('layouts.app')

@section('content')
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
                            <input type="submit" class="btn btn-danger" value="{{ $item->status == ON ? 'Disable' : 'Enable' }}">
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
