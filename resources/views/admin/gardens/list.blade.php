@extends('admin.admin-layouts.app')
@section('content')
 
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row mb-2">
        @include('message.message')
        <div class="col-sm-6"><h3 class="mb-0">Gardens</h3></div>
         <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('gardens/add') }}">
                <button class="btn btn-success">+ Add New Garden</button>
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
              <h3 class="card-title">List of Gardens</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          {{-- <th>#</th> --}}
                          <th>Garden Name</th>
                          <th>Garden Type</th>
                          <th>Garden Owner</th>
                          <th>Manager's Name</th>
                          <th>District</th>
                          <th>GPS Location</th>
                          <th>Garden Size (Acres)</th>
                          <th>Planting Method</th>
                          <th>Land Ownership</th>
                          <th>Farmer Ownership</th>
                          <th>Date Started</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      
                  <tbody>
                   @foreach($getRecord as $getRecord)
                   <tr>
                    {{-- <td>{{$getRecord->id}}</td> --}}
                    <td>{{$getRecord->garden_name}}</td>
                    <td>{{$getRecord->garden_type}}</td>
                    <td>{{$getRecord->user->first_name}} {{$getRecord->user->last_name}}</td>
                    <td>{{$getRecord->manager_name}}</td>
                    <td>{{$getRecord->district->name}}</td>
                    <td>{{$getRecord->location_latitude}} {{$getRecord->location_longitude}}</td>
                    <td>{{$getRecord->garden_size}}</td>
                    <td>{{$getRecord->planting_method}}</td>
                    <td>{{$getRecord->land_ownership}}</td>
                    <td>{{$getRecord->farmer_ownership}}</td>
                    <td>{{$getRecord->date_started}}</td>
                    <td>
                      <a href="{{ url('gardens/edit/'.$getRecord->id) }}" class="btn"><img src="{{ url('/dist/assets/img/comfarnet/edit.png')}}" height="20px" width="20px" alt="edit"></a>
                      <a href="{{ url('gardens/delete/'.$getRecord->id)}}" class="btn" onclick="return confirm('Are you sure you want to delete farmer: {{ $getRecord->garden_name }}?')" ><img src="{{ url('/dist/assets/img/comfarnet/delete1.png')}}" height="20px" width="20px" alt="delete"></a>
                    </td>
                   </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
          <!-- /.card -->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  
@endsection