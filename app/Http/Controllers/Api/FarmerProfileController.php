@extends('admin.admin-layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <!-- Back Button -->
                <div class="col-md-12 mt-3">
                    <a href="{{ url('farmers/list') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back To List
                    </a>
                </div>

                <!-- Main Form -->
                <div class="col-md-12">
                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Farmer Registration</div>
                        </div>

                        <form action="{{ url('farmers/add') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Personal Information Section -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name *</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" 
                                                   value="{{ old('first_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name *</label>
                                            <input type="text" name="last_name" class="form-control" id="last_name" 
                                                   value="{{ old('last_name') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Phone Number *</label>
                                            <input type="tel" name="phone_number" class="form-control" id="phone_number" 
                                                   value="{{ old('phone_number') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email" 
                                                   value="{{ old('email') }}">
                                            <small class="text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Identification -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nin" class="form-label">NIN (National ID) *</label>
                                            <input type="text" name="NIN" class="form-control" id="nin" 
                                                   value="{{ old('NIN') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dependents" class="form-label">Number of Dependents</label>
                                            <input type="number" name="Number_of_dependents" class="form-control" 
                                                   id="dependents" min="0" value="{{ old('Number_of_dependents') }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Information -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="district" class="form-label">District *</label>
                                            <select class="form-select" name="District" id="district" required>
                                                <option value="">Select District</option>
                                                @foreach(['District 1', 'District 2', 'District 3'] as $district)
                                                    <option value="{{ $district }}" {{ old('District') == $district ? 'selected' : '' }}>
                                                        {{ $district }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="village" class="form-label">Village *</label>
                                            <input type="text" name="Village" class="form-control" id="village" 
                                                   value="{{ old('Village') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Personal Details -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth *</label>
                                            <input type="date" name="Date_of_birth" class="form-control" id="dob" 
                                                   value="{{ old('Date_of_birth') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender *</label>
                                        <div class="d-flex gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Gender" 
                                                       id="male" value="Male" {{ old('Gender', 'Male') == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Gender" 
                                                       id="female" value="Female" {{ old('Gender') == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Education and Group -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="education" class="form-label">Education Level</label>
                                            <select class="form-select" name="Education_level" id="education">
                                                <option value="">Select Education Level</option>
                                                @foreach(['None', 'Primary', 'Secondary', 'Tertiary', 'University'] as $level)
                                                    <option value="{{ $level }}" {{ old('Education_level') == $level ? 'selected' : '' }}>
                                                        {{ $level }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="farmer_group" class="form-label">Farmer Group</label>
                                            <input type="text" name="Farmer_group" class="form-control" 
                                                   id="farmer_group" value="{{ old('Farmer_group') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Create Farmer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    // Client-side validation or additional functionality can go here
    document.addEventListener('DOMContentLoaded', function() {
        // Example: Format phone number input
        const phoneInput = document.getElementById('phone_number');
        phoneInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9+]/g, '');
        });
    });
</script>
@endpush