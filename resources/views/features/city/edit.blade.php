@extends('templates.main')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Master City</h6>
                <p class="card-description">Enter Your Data For City</p>
                <div class="card-body">
                    <h6 class="card-title"> Form Edit City</h6>
                    <form class="forms-sample" action="{{ route('city.update', $city->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $city->id }}">
                        <input type="hidden" name="cityOld" value="{{ $city->city }}">

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                                autocomplete="off" placeholder="Solo" name="city" autocomplete="off"
                                value="{{ old('slug', $city->city) }}"">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="longitude">longitude</label>
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                        id="longitude" placeholder="107.60762330092848" name="longitude" autocomplete="off"
                                        value="{{ old('longitude', $city->longitude) }}">
                                    @error('longitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="latitude">latitude</label>
                                    <input type="text" name="latitude"
                                        class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                                        placeholder="6.887769562651903" autocomplete="off"
                                        value="{{ old('latitude', $city->latitude) }}">
                                    @error('latitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control  @error('province') is-invalid @enderror"
                                id="province" autocomplete="off" placeholder="Jawa Tengah" name="province"
                                autocomplete="off" value="{{ old('province', $city->province) }}">
                            @error('province')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="Island">Island</label>
                                    <input type="text" class="form-control @error('island') is-invalid @enderror"
                                        id="Island" placeholder="Java" name="island" autocomplete="off"
                                        value="{{ old('island', $city->island) }}">
                                    @error('island')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="overseas">Overseas:</label>
                                    <select class="form-select" aria-label="Default select example" id="overseas"
                                        name="overseas">
                                        <option selected disabled>Open this select menu</option>
                                        <option value="1" {{ $city->overseas == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $city->overseas == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
