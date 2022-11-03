@extends('admin.ogs-main-layout')
@section('title', 'Advising')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Advising Students</h1>
    <p class="mb-4"></p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student Type</th>
                            <th>Name</th>
                            <th>Student Number</th>
                            <th>Program</th>
                            <th>First Subject</th>
                            <th>Second Subject</th>
                            <th>Third Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($student as $students)
                        <tr>
                            <td>{{$students->student_type}}</td>
                            <td>{{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                            <td>{{$students->student_id}}</td>                       
                            <td>{{$students->program}}</td>
                            <td>{{$students->first_period_sub}} : {{$students->time_first_period_sub}} : {{$students->first_period_instructor}}</td>
                            <td>{{$students->second_period_sub}} : {{$students->time_first_period_sub}} : {{$students->second_period_instructor}}</td>
                            <td>{{$students->third_period_sub}} : {{$students->time_first_period_sub}} : {{$students->third_period_instructor}}</td>
                            <td>
                                <a href="{{ route('edit-advising', $students->id)}}" class="edit mx-2"><i class="bi bi-pencil-square"></i></a>
                                {{-- <a href="{{ route('delete-advising', $students->id)}}" class="delete"><i class="bi bi-trash3"></i></a> --}}
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