@extends('layouts.app')

@section('title')
    {{ __('Setting List') }}
@endsection

@section('content')
    @include('includes.alert-block')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="table-responsive shadow rounded">
                <table class="table table-center bg-white mb-0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($setting as $i => $item)
                        <tr>
                            <th>
                                #{{ ($i + 1) + (($setting->currentPage() - 1) * $setting->perPage()) }}
                            </th>
                            <td>
                                @if (mb_strlen($item->name) > 50)
                                    <span class="ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $item->name }}">
                                        {{ mb_substr($item->name, 0, 50).'...' }}
                                    </span>
                                @else
                                    <span class="ms-2">
                                        {{ $item->name }}
                                    </span>
                                @endif
                            </td>
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
                            <td colspan="3"></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($setting->lastPage() > 1)
        {{ $setting->links('includes.pagination') }}
    @endif
@endsection
