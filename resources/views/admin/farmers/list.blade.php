@extends('admin.admin-layouts.app')
@section('content')
 
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row mb-2">
        @include('message.message')
        <div class="col-sm-6"><h3 class="mb-0">Farmers</h3></div>
         <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('farmers/add') }}">
                <button  class="btn btn-success">+ Add New Farmer</button>
            </a>
         </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-md-6">
        </div>
         <!-- /.card -->
         <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">List of farmers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>NIN</th>
                    <th>Email</th>
                    <th>Number Of Dependents</th>
                    <th>District</th>
                    <th>Village</th>
                    {{-- <th>Date Of Birth (DOB)</th>
                    <th>Gender</th>
                    <th>Education Level</th> --}}
                    <th>Farmer Group</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($getRecord as $value)
                   <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->first_name}}</td>
                    <td>{{$value->last_name}}</td>
                    <td>{{$value->phone_number}}</td>
                    <td>{{$value->NIN}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->Number_of_dependents}}</td>
                    <td>{{$value->District}}</td>
                    <td>{{$value->Village}}</td>
                    {{-- <td>{{$value->Date_of_birth}}</td>
                    <td>{{$value->Gender}}</td>
                    <td>{{$value->Education_level}}</td> --}}
                    <td>{{$value->Farmer_group}}</td>
                   </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  
@endsection