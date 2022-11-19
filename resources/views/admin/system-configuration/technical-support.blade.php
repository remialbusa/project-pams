@extends('admin.admin-main-layout')
@section('title', 'System Configuration')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Technical Support</h1>
    <p class="mb-4"></p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Technical Support</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>ID No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Concern</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($technicalForm as $technicalForm)
                        <tr>
                            <td>{{$technicalForm->program}}</td>
                            <td>{{$technicalForm->id_no}}</td>                       
                            <td>{{$technicalForm->name}}</td>
                            <td>{{$technicalForm->email}}</td>
                            <td>{{$technicalForm->concern}}</td>
                            <td>
                                <a href="{{ route('technicalform-delete', $technicalForm->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
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