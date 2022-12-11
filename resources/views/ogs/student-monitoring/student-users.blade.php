@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Student Users')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Student Users</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of active student users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-1">Program</th>
                            <th class="col-sm-1">Student ID</th>
                            <th class="col-sm-1">Password</th>
                            <th class="col-sm-1">Contact Number</th>
                            <th class="col-sm-3">Date Enrolled</th>
                            <th class="col-sm-3">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($studentUsers as $students)
                        <tr>
                            <td>{{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                            <td>{{$students->getProgramID->program}}</td>
                            <td>{{$students->student_id}}</td>                       
                            <td>**********</td>
                            <td>{{$students->mobile_no}}</td>
                            <td>{{$students->created_at}}</td>
                            <td>
                                <a href="{{route('admin.edit-student-users', $students->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{route('delete-student-users', $students->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach                                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>

@endsection