@if (session('success'))
    <div class="alert alert-success alert-block no-margin">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-block no-margin">
        <strong>{{ session('error') }}</strong>
    </div>
@endif
