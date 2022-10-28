@extends('admin.main-layout')
@section('title', 'Thesis Management')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thesis Management</h1>
        <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalForm">Input Data</a>
    </div>

<form action="{{ url('/staff/admin/thesis-management')}}" method="POST">
    <div class="row justify-content-center">
        <div class="col-auto">
            <table class="table table-responsive"> 
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" placeholder="Enter Author">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>
@endsection