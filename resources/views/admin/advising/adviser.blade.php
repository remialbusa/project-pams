@extends('admin.ogs-main-layout')
@section('title', 'List of Instructor')

@section('content')

<div>
    <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Instructors</h1>
        <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalForm">New Adviser</a>
        <a href="{{ route('admin-export-instructors') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">Export Data</a>
    </div>
    <p>The list of subjects shown in the table below are the available subjects for the S.Y. 2022-2023.</p>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Instructors</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($adviser as $adviser)
                        <tr>
                            <td>{{$adviser->program}}</td>
                            <td>{{$adviser->title}}</td>
                            <td>{{$adviser->first_name}} {{$adviser->middle_name}} {{$adviser->last_name}}</td>
                            <td>
                                <a href="{{ route('edit-adviser', $adviser->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('delete-adviser', $adviser->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach                                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>       
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Instructor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4 my-4">
                    <!-- login Form -->
                    <form action="{{ route('insert-adviser') }}" method="POST">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="program">
                                <option disabled selected>Select Program</option>
                                @foreach ($programs as $programs)
                                    <option value="{{$programs->program}}">{{$programs->program}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('program'){{$message}} @enderror</span>
                            <label for="floatingInput">Program</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                            <span class="text-danger">@error('title'){{$message}} @enderror</span>
                            <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                            <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                            <label for="floatingInput">Middle Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                            <label for="floatingInput">Last Name</label>
                        </div>                    
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary shadow-sm btn-login fw-bold mb-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection