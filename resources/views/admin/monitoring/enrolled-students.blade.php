@extends('admin.ogs-main-layout')
@section('title', 'Enrolled Students')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Enrolled Students</h1>
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
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-1">Student Number</th>
                            <th class="col-sm-1">Program</th>
                            <th class="col-sm-1">Contact Number</th>
                            <th class="col-sm-2">Date Enrolled</th>
                            <th class="col-sm-3">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($enrolledStudents as $students)
                        <tr>
                            <td>{{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                            <td>{{$students->student_id}}</td>                       
                            <td>{{$students->program}}</td>
                            <td>{{$students->mobile_no}}</td>
                            <td>{{$students->created_at}}</td>
                            <td>
                                <a href="{{route('admin.view-enrolled-students', $students->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{route('admin.create-student-users', $students->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-check-circle"></i></a>
                                <a href="{{route('admin.edit-enrolled-students', $students->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{route('delete-enrolled-students', $students->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
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