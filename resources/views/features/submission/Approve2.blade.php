@extends('templates.main')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Master City</h6>
                <p class="card-description">Enter Your Data For City</p>
                {{-- <div class="card-body">
                    <h6 class="card-title">Basic Form</h6>
                    <form class="forms-sample" action="{{ route('submission.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Form City</label>
                                    <select class="js-example w-100 @error('from_city_id') is-invalid @enderror"
                                        name="from_city_id">
                                        <option>--Select type--</option>
                                        @foreach ($city as $item)
                                            <option value="{{ $item->id }}">{{ $item->city }}</option>
                                        @endforeach
                                    </select>
                                    @error('from_city_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>To City</label>
                                    <select class="js-example-basic w-100 @error('to_city_id') is-invalid @enderror"
                                        name="to_city_id">
                                        <option selected hidden>Select City</option>
                                        @foreach ($city as $item)
                                            <option value="{{ $item->id }}">{{ $item->city }}</option>
                                        @endforeach
                                    </select>
                                    @error('to_city_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="city">Start Date</label>
                                    <input type="date" class="form-control @error('city') is-invalid @enderror"
                                        id="from_date" autocomplete="off" placeholder="Solo" name="from_date"
                                        autocomplete="off" value="{{ old('city') }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="to">End Date</label>
                                    <input type="date" class="form-control @error('city') is-invalid @enderror"
                                        id="endDate" autocomplete="off" placeholder="Solo" name="end_date"
                                        autocomplete="off" value="{{ old('city') }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="col-form-label">Description</label>
                                    <textarea id="description" class="form-control" maxlength="100" rows="8"
                                        placeholder="This textarea has a limit of 100 chars." name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for="" class="form Label">Total Perjalaan Dinas</label>
                                <h4><span id="result">11</span> Hari</h4>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                </div> --}}
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
        $(document).on('change', '#from_date, #endDate', function() {
            var startDate = $("#from_date").val() || Date();
            var endDate = $("#endDate").val() || Date();

            var date1 = new Date(startDate);
            var date2 = new Date(endDate);
            console.log(date1);
            console.log(date2);
            const oneDay = 1000 * 60 * 60 * 24;
            const diffInTime = date2.getTime() - date1.getTime();
            const diffInDays = Math.round(diffInTime / oneDay);
            document.getElementById("result").innerHTML = diffInDays;
        });
    </script>
@endpush
