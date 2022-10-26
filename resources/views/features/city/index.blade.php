@extends('templates.main')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">List Master City</h6>
                <p class="card-description">Enter Your Master Data From City</p>
                <a href="{{ route('city.create') }}" class="btn btn-success my-3 btn-sm">Add Data</a>
                <div class="table">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kota</th>
                                <th>Provinsi</th>
                                <th>Pulau</th>
                                <th>Latitude</th>
                                <th>Logtitude</th>
                                <th>Luar Negri</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $city->city }}</td>
                                    <td>{{ $city->province }}</td>
                                    <td>{{ $city->island }}</td>
                                    <td>{{ $city->latitude }}</td>
                                    <td>{{ $city->longitude }}</td>
                                    <td>{{ $city->overseas == '1' ? 'YA' : 'Tidak' }}</td>
                                    <td>
                                        <form action="{{ route('city.destroy', $city->id) }}" class="d-inline"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                            <a href="{{ route('city.edit', $city->id) }}"
                                                class="btn btn-primary bt-sm">Update</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endpush
