@extends('admin.admin-main-layout')
@section('title', 'System Configuration')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Announcements</h1>
        <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#insertModalForm"><i class="material-icons">&#xE147;</i> Add</a>
    </div>

    <!-- Page Heading -->
    <p class="mb-4"></p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Announcements Configuration</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>File</th>
                            <th>Saved</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($announcement as $announcement)
                        <tr>
                            <td>{{$announcement->name}}</td>
                            <td>{{$announcement->file}}</td>                       
                            <td>{{$announcement->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.view-image', $announcement->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-success shadow-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.delete-announcements', $announcement->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach                                                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Insert Thesis Modal -->
    <div class="modal fade" id="insertModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Announcements</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Insert Form -->
                    <form action="{{ route('admin.insert-announcements') }}" method="POST" enctype="multipart/form-data">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                            <span class="text-danger">@error('name'){{$message}} @enderror</span>
                            <label for="floatingInput">Name</label>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group form-line">
                                    <label class="form-label" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                    <p>
                                        <i>(Kindly upload the soft copy of your entrance payment receipt, credentials, registration, consent, and promissory note in one PDF file.)</i>
                                        <br><i>(File format name (ex. Lastname-Firstname-MI-Requirements))</i>
                                    </p>
                                    <input type="file" placeholder="Choose file" class="form-control" name="file">
                                    <span class="text-danger">@error('file'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-warning btn-login fw-bold mb-2">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    <!-- /.container-fluid -->
    
@endsection