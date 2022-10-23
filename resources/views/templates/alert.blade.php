@if (session()->has('success'))
    <div class="alert alert-fill-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('danger'))
    <div class="alert alert-fill-danger" role="alert">
        {{ session('danger') }}
    </div>
@endif
