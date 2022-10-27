@extends('templates.main')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Master Users</h6>
                <p class="card-description">Enter Your Data For User</p>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" value="{{ $user->id }}" name="id">
                                <input type="hidden" value="{{ $user->username }}" name="username_old">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" autocomplete="off" placeholder="winarno" name="username"
                                        autocomplete="off" value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="overseas">Role:</label>
                                    <select class="form-select" aria-label="Default select example" name="role_id">
                                        <option selected disabled>Open this select menu</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $role->id == $user->roles[0]->id ? 'selected' : '' }}>
                                                {{ $role->display_name }}</option>
                                        @endforeach
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
