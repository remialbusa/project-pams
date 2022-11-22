@extends('admin.ogs-main-layout')
@section('title', 'Thesis Management')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Scheduling </h1>
    <p class="mb-4">The data below are the enrolled students in Masteral with thesis.</p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Enrolled Student in Masteral with thesis </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Program</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                        @foreach($student as $students)
                        <tr>
                            <td>{{$students->student_id}}</td>
                            <td>{{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                            <td>{{$students->program}}</td>
                            <td>
                                <a href="{{ route('student-schedule', $students->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-calendar-check"></i></a>
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