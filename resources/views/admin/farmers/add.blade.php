@extends('admin.admin-layouts.app')

@section('content')

<main class="app-main">
    <!--begin::App Content Header-->
    
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
          <!--begin::Col-->
          <div class="col-md- mt-6">
            <a  href="{{ url('farmers/list')}}"><- Back To Lists</a>
          </div>
          <!--end::Col-->
          <!--begin::Col-->
          <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-success card-outline mb-4">
              <!--begin::Header-->
              <div class="card-header">
                <div class="card-title">Farmer Registration</div>
                
              </div>
              <!--end::Header-->
              <!--begin::Form-->
              <form action="{{ url('farmers/add')}}" method="post">
                {{ csrf_field() }}
                <!--begin::Body-->
                <div class="card-body">
                  <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" required />
                  </div>
                  
                  <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" required />
                  </div>
                  
                  <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="tel" name="phone_number" class="form-control" id="phone_number" required />
                  </div>
                  
                  <div class="mb-3">
                    <label for="nin" class="form-label">NIN (National Identification Number)</label>
                    <input type="text" name="NIN" class="form-control" id="nin" required />
                  </div>
                  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" />
                    <div id="emailHelp" class="form-text">
                      We'll never share your email with anyone else.
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label for="dependents" class="form-label">Number of Dependents</label>
                    <input type="number" name="Number_of_dependents" class="form-control" id="dependents" min="0" />
                  </div>
                  
                  {{-- <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <select class="form-select" name="district" id="district" required>
                      <option value="">Select District</option>
                      <option value="District1">District 1</option>
                      <option value="District2">District 2</option>
                      <option value="District3">District 3</option>
                      <!-- Add more districts as needed -->
                    </select>
                  </div> --}}

                  <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <input type="number" name="District" class="form-control" id="district" required />
                  </div>
                  
                  <div class="mb-3">
                    <label for="village" class="form-label">Village</label>
                    <input type="text" name="Village" class="form-control" id="village" required />
                  </div>
                  
                  <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="Date_of_birth" class="form-control" id="dob" required />
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="Gender" id="male" value="Male" checked>
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                      <label class="form-check-label" for="female">Female</label>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label for="education" class="form-label">Education Level</label>
                    <select class="form-select" name="Education_level" id="education">
                      <option value="">Select Education Level</option>
                      <option value="None">None</option>
                      <option value="Primary">Primary</option>
                      <option value="Secondary">Secondary</option>
                      <option value="Tertiary">Tertiary</option>
                      <option value="University">University</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label for="farmer_group" class="form-label">Farmer Group</label>
                    <input type="text" name="Farmer_group" class="form-control" id="farmer_group" />
                  </div>
                  
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Create Farmer</button>
                </div>
                <!--end::Footer-->
              </form>
              <!--end::Form-->
            </div>
            <!--end::Quick Example-->
            
          </div>
          <!--end::Col-->

         
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
  </main>
@endsection