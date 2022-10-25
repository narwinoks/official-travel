@include('templates.head')
@include('templates.sedibar')
@include('templates.navbar')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 col-sm-11">
            @include('templates.alert')
        </div>
            @yield('content')
        {{-- </div> --}}
    </div>
</div>
@include('templates.footer')
