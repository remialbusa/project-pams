@extends('admin.ogs-main-layout')
@section('title', 'Advising & Assigning Subjects')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Advising & Assigning Subjects</h1>
    <p class="mb-4"></p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-sm-2">Student Number</th>
                            <th class="col-sm-1">Program</th>
                            <th class="col-sm-2">First Subject / Schedule / Adviser</th>
                            <th class="col-sm-2">Second Subject / Schedule / Adviser</th>
                            <th class="col-sm-2">Third Subject / Schedule / Adviser</th>
                            <th class="col-sm-2">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($student as $students)
                        <tr>
                            <td>{{$students->student_id}}</td>                       
                            <td>{{$students->program}}</td>
                            <td>{{$students->first_period_sub}} / {{$students->first_period_sched}} / {{$students->first_period_adviser}}</td>
                            <td>{{$students->second_period_sub}} / {{$students->second_period_sched}} / {{$students->second_period_adviser}}</td>
                            <td>{{$students->third_period_sub}} / {{$students->third_period_sched}} / {{$students->third_period_adviser}}</td>
                            <td>
                                <a href="{{ route('edit-advising-assigning-subject', $students->id)}}" class="mx-3 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('delete-advising-assigning-subject', $students->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
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