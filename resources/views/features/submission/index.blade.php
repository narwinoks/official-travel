@extends('templates.main') @section('content')
    <div class="col-2 text-left my-4 mx-4" style="cursor: pointer">
        <div class="row">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Notif <span class="badge badge-light">4</span></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" id="form-1" href="#">Pengajuan Terbaru</a>
                    <a class="dropdown-item" id="form-2" href="#">History Pengajuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">List Master City</h6>
                <p class="card-description">Enter Your Master Data From City</p>
                <div id="table-1" class="table d-none">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="table d-none" id="table-2">
                    <div class="col-12">
                        <table id="dataTableExample2" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>

                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/submissions.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTableExample').DataTable({
                processing: true,
                responsive: true,
                //  serverSide: true,
                ajax: "{{ route('data.newsubmission') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'city'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTableExample2').DataTable({
                processing: true,
                responsive: true,
                //  serverSide: true,
                ajax: "{{ route('data.allsubmission') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'city'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'status'
                    },
                ]
            });
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
@endpush
