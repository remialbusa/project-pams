@extends('admin.admin-main-layout')
@section('title', 'System Configuration')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Active Semester</h1>
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
                            <th>Toggle</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                        @foreach ($school_year as $school_year)
                        <tr>
                            
                            <td>{{$school_year->school_year}}</td>
                            <td>{{$school_year->semester}}</td>                       
                            <td>{{$school_year->status}}</td>
                            <td>
                                <div class="ml-3 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </td>
                            <td>
                                <a href="" class="mx-1 d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>
    <!-- /.container-fluid -->
    
@endsection