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
                <button class="btn btn-success">+ Add New Farmer</button>
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
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th>#</th> --}}
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Phone Number</th>
                      <th>NIN</th>
                      <th>Email</th>
                      <th>District</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($getRecord as $value)
                     <tr>
                      {{-- <td>{{$value->id}}</td> --}}
                      <td>{{$value->first_name}}</td>
                      <td>{{$value->last_name}}</td>
                      <td>{{$value->phone_number}}</td>
                      <td>{{$value->NIN}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->District}}</td>
                      <td>
                        <a href="{{ url('farmers/edit/'.$value->id) }}" class="btn"><img src="{{ url('/dist/assets/img/comfarnet/edit.png')}}" height="20px" width="20px" alt="edit"></a>
                        <a href="{{ url('farmers/delete/'.$value->id)}}" class="btn" onclick="return confirm('Are you sure you want to delete farmer: {{ $value->first_name }} {{ $value->last_name }}?')" ><img src="{{ url('/dist/assets/img/comfarnet/delete1.png')}}" height="20px" width="20px" alt="delete"></a>
                      </td>
                     </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
            {{-- @if($getRecord->hasPages())
            <div class="card-footer clearfix">
              {{ $getRecord->links() }}
            </div>
            @endif --}}
          </div>
          <!-- /.card -->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  
@endsection