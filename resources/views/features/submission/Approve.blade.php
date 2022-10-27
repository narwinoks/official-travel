@extends('templates.main')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Master Approve</h6>
                <p class="card-description">Approve Your Submission</p>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('city.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{ $submission->User->username }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" value="{{ $submission->id }}">
                                <div class="col-md-6 col-sm-12">
                                    <label>Form City</label>
                                    <input type="text" class="form-control" value="{{ $submission->FromCity->city }}"
                                        readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>To City</label>
                                    <input type="text" class="form-control" value="{{ $submission->Tocity->city }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" value="">
                                <div class="col-md-6 col-sm-12">
                                    <label>Start Date</label>
                                    <input type="text" class="form-control"
                                        value="{{ tgltoview($submission->start_at) }}" readonly id="start_date">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>End Date</label>
                                    <input type="text" class="form-control" value="{{ tgltoview($submission->end_at) }}"
                                        readonly id="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="col-form-label">Text Area</label>
                                    <textarea id="description" class="form-control" maxlength="100" rows="8"
                                        placeholder="This textarea has a limit of 100 chars." name="desccription" readonly>{{ $submission->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table text-center">
                                    <thead>
                                        <tr class="table-info">
                                            <td>Days</td>
                                            <td>Mileage</td>
                                            <td>Total</td>
                                        </tr>
                                        <tr>
                                            <td class="text-info"><span
                                                    id="lama">{{ distance($submission->start_at, $submission->end_at) }}</span>
                                                HARI</td>
                                            <td>
                                                <h4 class="text-info">{{ $distance }} KM</h4>
                                                @if ($distance >= 61)
                                                    <p class="text-muted">
                                                        {{ konversi_uang($data['nominal'], $data['satuan']) }}</p>
                                                    <p class="text-small">Jarak > 60 km</p>
                                                @endif
                                            </td>
                                            <td>{{ konversi_uang(distance($submission->start_at, $submission->end_at) * $data['nominal'], $data['satuan']) }}
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                                <p class="small text-danger"> {{ $data['status'] }}</p>
                                <div class="mb-3 text-center mt-5">
                                    @if ($submission->status == null)
                                        <button class="btn btn-primary mr-2 approve_submission"
                                            id="{{ $submission->id }}">Approve</button>
                                        <button class="btn btn-danger reaject_submission"
                                            id="{{ $submission->id }}">Reajct</button>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).on('click', '.approve_submission', function() {

            var id = $(this).attr("id");
            $.ajax({
                url: "{{ route('submission.approve.store') }}",
                method: "POST",
                data: {
                    "id": id,
                    "status": 1
                },
                success: function(msg) {
                    // alert(msg)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        $(document).on('click', '.reaject_submission', function() {

            var id = $(this).attr("id");
            $.ajax({
                url: "{{ route('submission.approve.store') }}",
                method: "POST",
                data: {
                    "id": id,
                    "status": 0
                },
                success: function(msg) {
                    console.log(msg);
                    // alert(msg)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endpush
