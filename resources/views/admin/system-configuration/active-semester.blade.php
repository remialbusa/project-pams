@extends('admin.admin-main-layout')
@section('title', 'System Configuration')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Active Semester</h1>
    <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalForm">New Semester</a>
    </div>
    
    <p class="mb-4"></p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Active Semester</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th class="col-sm-2">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                        @foreach ($school_year as $school_year)
                        <tr>
                            
                            <td>{{$school_year->school_year}}</td>
                            <td>{{$school_year->semester}}</td>                       
                            <td>{{$school_year->status}}</td>
                            <td class="text-center">
                                <a href="{{route('auth.edit-active-semester', $school_year->id)}}" class=" d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{route('auth.delete-semester', $school_year->id)}}" class=" d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Instructor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4 my-4">
                    <!-- login Form -->
                    <form action="{{ route('auth.insert-semester') }}" method="POST">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="school_year" placeholder="School Year">
                            <span class="text-danger">@error('school_year'){{$message}} @enderror</span>
                            <label for="floatingInput">School Year</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="semester" placeholder="Semester">
                            <span class="text-danger">@error('semester'){{$message}} @enderror</span>
                            <label for="floatingInput">Semester</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example"" name="status" placeholder="Status">
                                <option disabled selected>N/A</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <span class="text-danger">@error('status'){{$message}} @enderror</span>
                            <label for="floatingInput">Status</label>
                        </div>     
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary shadow-sm btn-login fw-bold mb-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection