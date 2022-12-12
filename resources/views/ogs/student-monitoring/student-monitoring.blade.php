@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Enrolled Students')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Enrolled Students</h1>
        <a href="{{ route('admin.export-enrolled-students') }}"class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">Export Data</a>
    </div>
    <p class="mb-4">Monitor students who are enrolled this School Year</p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Enrolled Students</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-sm-4">Name</th>
                            <th class="col-sm-1">Student Number</th>
                            <th class="col-sm-1">Program</th>
                            <th class="col-sm-1">Contact No</th>
                            <th class="col-sm-2">Date Enrolled</th>
                            <th class="col-sm-2">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($enrolledStudents as $students)
                        <tr>
                            <td>{{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                            <td>{{$students->student_id}}</td>
                            <td>{{$students->getProgramID->program}}</td>
                            <td>{{$students->mobile_no}}</td>          
                            <td>{{$students->created_at}}</td>
                            <td class="text-center">
                                <a href="#" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-eye"></i></a>
                                <a href="#" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a onclick="return confirm('Are you sure?')" href="#" class="d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
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