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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Student Number</th>
                            <th>Program</th>
                            <th>Contact Number</th>
                            <th>Date Enrolled</th>
                            <th>Action</th>
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
                                {{-- <a href="{{ route('mit-edit-student', $students->id)}}" class="edit mx-2"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('mit-delete-student', $students->id)}}" class="delete"><i class="bi bi-trash3"></i></a> --}}
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