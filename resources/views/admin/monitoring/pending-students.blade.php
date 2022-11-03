@extends('admin.ogs-main-layout')
@section('title', 'Pending Students')

@section('content')

<div>
        <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pending Students</h1>
        </div>
        <p>Monitor students who submitted requirements for enrollment this S.Y. 2022 - 2023.</p>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Pending Students</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Requirements Form</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>               
                        <tbody>
                        @foreach ($pendingStudents as $pendingStudents)
                            <tr>
                                <td>{{$pendingStudents->student_id}}</td>
                                @if($pendingStudents->submitted_form == "Pending")
                                <td><span class="badge badge-warning">{{$pendingStudents->submitted_form}}</span></td>   
                                @else 
                                <td><span class="badge badge-success">{{$pendingStudents->submitted_form}}</span></td>  
                                @endif
                                @if($pendingStudents->payment == "Pending")                    
                                <td><span class="badge badge-warning">{{$pendingStudents->payment}}</span></td>
                                @else
                                <td><span class="badge badge-success">{{$pendingStudents->payment}}</span></td>
                                @endif
                                @if($pendingStudents->status == "Pending")
                                <td><span class="badge badge-warning">{{$pendingStudents->status}}</span></td>
                                @else
                                <td><span class="badge badge-success">{{$pendingStudents->status}}</span></td>
                                @endif
                                <td>
                                    <a href="{{ route('edit-pending', $pendingStudents->id)}}" class="edit mx-2"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('view-pending', $pendingStudents->id)}}" class="edit mx-2"><i class="bi bi-check-circle"></i></a>
                                    <a href="{{ route('delete-pending', $pendingStudents->id)}}" class="delete"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                        @endforeach                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </div>
</div>


@endsection