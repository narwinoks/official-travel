@extends('templates.main')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Master City</h6>
                <p class="card-description">Enter Your Data For City</p>
                <div class="card-body">
                    <h6 class="card-title">Basic Form</h6>
                    <form class="forms-sample" action="{{ route('city.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" value="">
                                <div class="col-md-6 col-sm-12">
                                    <label>Form City</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>To City</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" value="">
                                <div class="col-md-6 col-sm-12">
                                    <label>Start Date</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>End Date</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="col-form-label">Text Area</label>
                                    <textarea id="description" class="form-control" maxlength="100" rows="8"
                                        placeholder="This textarea has a limit of 100 chars." name="desccription" readonly></textarea>
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
                                            <td class="text-info">12 HARI</td>
                                            <td>
                                                <h4 class="text-info">781 KM</h4>
                                                <p class="text-muted">200000</p>
                                                <p class="text-small">Jarak > 60 km</p>
                                            </td>
                                            <td>7200000</td>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="row justify-content-center mx-3 mt-5">
                                    <button class="btn btn-primary">Approve</button>
                                    <button class="btn btn-danger">Reaject</button>
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
        
    </script>
@endpush
