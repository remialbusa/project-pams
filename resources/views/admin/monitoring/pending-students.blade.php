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
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="col-sm-2">Name</th>
                                <th class="col-sm-2">Student ID</th>
                                <th class="col-sm-1">Program</th>
                                <th class="col-sm-1">Requirements Form</th>
                                <th class="col-sm-1">Payment</th>
                                <th class="col-sm-1">Status</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>               
                        <tbody>
                        @foreach ($pendingStudents as $pendingStudents)
                            <tr>
                                <td>{{$pendingStudents->first_name}} {{$pendingStudents->middle_name}} {{$pendingStudents->last_name}}</td>
                                <td>{{$pendingStudents->student_id}}</td>
                                <td>{{$pendingStudents->getProgramID->program}}</td>
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
                                    <a href="{{ route('edit-pending', $pendingStudents->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" {{-- data-bs-toggle="modal" data-bs-target="#insertModalForm" --}}><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('approving-pending', $pendingStudents->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-check-circle"></i></a>
                                    <a href="{{ route('delete-pending', $pendingStudents->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                        @endforeach                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </div>

    {{-- <div class="modal fade" id="insertModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pending Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- login Form -->
                    <form action="{{route('admin.edit-pending')}}" method="POST" enctype="multipart/form-data">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                        @endif
            
                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                        @endif
            
                        @csrf
                        <div class="profile">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$pendingStudents['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            
                            <div class="row">
                                <div class="col ">
                                    <div class="form-outline ">
                                        <label class="form-label" for="form6Example2">Submitted Form</label>
                                        <select class="form-select form-line" aria-label="Default select example" name="submitted_form">
                                            @if($pendingStudents['submitted_form'] == 'Pending')
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            @else
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('submitted_form'){{$message}} @enderror</span>
                                    </div>
                                </div>
            
                                <div class="col ">
                                    <div class="form-outline ">
                                        <label class="form-label " for="form6Example2">Payment</label>
                                        <select class="form-select form-line" aria-label="Default select example" name="payment">
                                            @if($pendingStudents['payment'] == 'Pending')
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            @else
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                        
                                        <span class="text-danger">@error('payment'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                
                                <div class="col ">
                                    <div class="form-outline ">
                                        <label class="form-label" for="form6Example2">Status Form</label>
                                        <select class="form-select form-line" aria-label="Default select example" name="status">
                                            @if($pendingStudents['status'] == 'Pending')
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            @else
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('status'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="mt-3"><a href="{{ route('admin.view-pdf', $pendingStudents->id)}}" class="edit mx-2 bi bi-eye" target="_blank">View Requirements</a></div>
                            </div> 
                            
                            <div class="row mt-2 mb-3">
                                <div class="col-md-5 mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Student Type</label>
                                        <select class="no-border form-select" aria-label="Default select example" name="student_type">
                                            @if($pendingStudents['student_type'] == 'New Student')
                                            <option selected value="New Student">New Student</option>
                                            @else
                                            <option value="Continuing">Continuing</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="student_id" value="{{$pendingStudents['student_id']}}" />
                                        <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  --}}
</div>


@endsection