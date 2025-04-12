@extends('admin.admin-layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md- mt-6">
                    <a href="{{ url('gardens/list') }}"><- Back To Lists</a>
                </div>
                <div class="col-md-12">
                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Garden Registration</div>
                        </div>

                        <form action="{{ url('gardens/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="garden_type" class="form-label">Garden Type</label>
                                    <select name="garden_type" id="garden_type" class="form-select" required>
                                        <option value="">Select Garden Type</option>
                                        <option value="Mother">Mother Garden</option>
                                        <option value="coffee">Coffee Garden</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="user" class="form-label">Garden Owner</label>
                                    <select name="user_id" id="user" class="form-select" required>
                                        <option value="">Select Garden Owner</option>
                                        @foreach($getGardenUser as $getGardenUser)
                                            <option value="{{ $getGardenUser->id }}">{{ $getGardenUser->first_name }} {{ $getGardenUser->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="garden_name" class="form-label">Garden Name</label>
                                    <input type="text" name="garden_name" class="form-control" id="garden_name" required value="{{ old('garden_name') }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="manager_name" class="form-label">Manager's Name</label>
                                    <input type="text" name="manager_name" class="form-control" id="manager_name" required value="{{ old('manager_name') }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="district" class="form-label">District</label>
                                    <select name="district_id" id="district" class="form-select" required>
                                        <option value="">Select District</option>
                                        @foreach($district as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="location_latitude" class="form-label">location_latitude (GPS)</label>
                                    <input type="number" name="location_latitude" class="form-control" id="location_latitude" required value="{{ old('location_latitude') }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="location_longitude" class="form-label">location_longitude (GPS)</label>
                                    <input type="number" name="location_longitude" class="form-control" id="location_longitude" required value="{{ old('location_longitude') }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="garden_size" class="form-label">Garden Size (Acres)</label>
                                    <input type="number" step="0.01" name="garden_size" class="form-control" id="garden_size" required value="{{ old('garden_size') }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="planting_method" class="form-label">Planting Method</label>
                                    <input name="planting_method" id="planting_method" class="form-control" required />   
                                </div>

                                <div class="mb-3">
                                    <label for="land_ownership" class="form-label">Land Ownership</label>
                                    <select name="land_ownership" id="land_ownership" class="form-select" required>
                                        <option value="">Select Ownership</option>
                                        <option value="Owned">Owned</option>
                                        <option value="Rented">Rented</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="farmer_ownership" class="form-label">Farmer Ownership</label>
                                    <select name="farmer_ownership" id="farmer_ownership" class="form-select" required>
                                        <option value="">Select Ownership Type</option>
                                        <option value="Family">Family</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Group">Group</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="date_started" class="form-label">Date Started</label>
                                    <input type="date" name="date_started" class="form-control" id="date_started" required value="{{ old('date_started') }}" />
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Register Garden</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
