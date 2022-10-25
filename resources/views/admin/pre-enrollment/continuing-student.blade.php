@extends('admin.main-layout')
@section('title', 'Continuing Students')

@section('content')

<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Continuing Students</h1>
<p class="mb-4">The data below are the students who filled out the pre-enrollment form during the pre-enrollment period.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of continuing students</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Program</th>
                        <th>Contact Number</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>               
                <tbody>
                @foreach ($continuingStudents as $student)
                    <tr>
                        <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                        <td>{{$student->student_id}}</td>                       
                        <td>{{$student->program}}</td>
                        <td>{{$student->mobile_no}}</td>
                        <td>{{$student->created_at}}</td>
                        <td>
                            <a href="{{ route('mit-edit-student', $student->id)}}" class="edit mx-2"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('mit-delete-student', $student->id)}}" class="delete"><i class="bi bi-trash3"></i></a>
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