@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Thesis Management')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thesis Management</h1>
        <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#insertModalForm">Add Thesis</a>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thesis Directory</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>File</th>
                            <th>Saved Date</th>
                            <th>Updated Date</th>
                            <th class="col-sm-2">Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                        @foreach ($thesis as $thesis)
                        <tr>
                            
                            <td>{{$thesis['thesis_title']}}</td>
                            <td>{{$thesis['thesis_author']}}</td>
                            <td>{{$thesis['file']}}</td>
                            <td>{{$thesis['created_at']}}</td>
                            <td>{{$thesis['updated_at']}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.view-thesis-pdf', $thesis->id)}}" target="_blank" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-eye-fill"></i></a>
                                <a href="{{ route('thesis-edit', $thesis->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('thesis-delete', $thesis->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                        @endforeach                                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Insert Thesis Modal -->
    <div class="modal fade" id="insertModalForm" tabindex="-2" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Thesis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Insert Form -->
                    <form action="{{ route('thesis-save') }}" method="POST" enctype="multipart/form-data">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="thesis_title" placeholder="Thesis Title">
                            <span class="text-danger">@error('thesis_title'){{$message}} @enderror</span>
                            <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="thesis_author" placeholder="Thesis Author">
                            <span class="text-danger">@error('thesis_author'){{$message}} @enderror</span>
                            <label for="floatingInput">Author</label>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-12">
                                <div class="form-group form-line">
                                    <label class="form-label" for="form6Example1">Submit File: <label class="text-danger">*</label></label>
                                    <p>
                                        <i>(File type: pdf, xlx, csv)</i>
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