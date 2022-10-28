@extends('student.student-main-layout')
@section('title', 'Thesis Directory')

@section('content')
        <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thesis Management</h1>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thesis Directory</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Saved Date</th>
                            <th>Updated Date</th>
                        </tr>
                    </thead>               
                    <tbody>
                        @foreach ($thesis as $thesis)
                        <tr>
                            <td>{{$thesis['id']}}</td>
                            <td>{{$thesis['thesis_title']}}</td>
                            <td>{{$thesis['thesis_author']}}</td>
                            <td>{{$thesis['created_at']}}</td>
                            <td>{{$thesis['updated_at']}}</td>
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