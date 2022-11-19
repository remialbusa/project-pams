@extends('admin.ogs-main-layout')
@section('title', 'Comprehensive Exam')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Comprehensive Exam</h1>
        
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Comprehensive Exam</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>Student ID</th>
                            <th>Program</th>
                            <th>Name</th>
                            <th>Exam Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                        @foreach ($cexam as $cexam)
                        <tr>
                            
                            <td>{{$cexam['student_id']}}</td>
                            <td>{{$cexam['program']}}</td>
                            <td>{{$cexam['name']}}</td>
                            <td>{{$cexam['exam_status']}}</td>
                            <td>
                                <a href="{{route('admin.exam-view', $cexam->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('exam-delete', $cexam->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
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