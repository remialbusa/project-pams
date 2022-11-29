@extends('admin.ogs-main-layout')
@section('title', 'New Students')

@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">New Students</h1>
</div>
<p class="mb-4">The data below are the students who filled out the pre-enrollment form during the pre-enrollment period.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of new students</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-sm-3">Name</th>
                        <th class="col-sm-2">Student Number</th>
                        <th class="col-sm-1">Program</th>
                        <th class="col-sm-2">Contact Number</th>
                        <th class="col-sm-2">Date</th>
                        <th class="col-sm-2">Action</th>
                    </tr>
                </thead>               
                <tbody>
                @foreach ($newStudents as $student)
                    <tr>
                        <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                        <td>{{$student->student_id}}</td>                       
                        <td>{{$student->program}}</td>
                        <td>{{$student->mobile_no}}</td>
                        <td>{{$student->created_at}}</td>
                        <td>
                            <a href="{{ route('student-edit', $student->id)}}" class="mx-3 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-check-circle"></i></a>
                            <a href="{{ route('student-delete', $student->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
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