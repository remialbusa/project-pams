@extends('admin.ogs-main-layout')
@section('title', 'Programs')

@section('content')

<div>
    <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Programs</h1>
        <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalForm">New Programs</a>
    </div>
    <p>The list of Programs shown in the table below are the available subjects for the current S.Y.</p>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of programs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            
                            <th>Degree</th>
                            <th>Program</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>               
                    <tbody>
                    @foreach ($programs as $programs)
                        <tr>
                            <td>{{$programs->code}}</td>
                            <td>{{$programs->degree}}</td>                       
                            <td>{{$programs->program}}</td>
                            <td>{{$programs->description}}</td>
                            <td>
                                <a href="{{route('edit-program', $programs->id)}}" class="edit mx-2"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{route('delete-program', $programs->id)}}" class="delete"><i class="bi bi-trash3"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4 my-4">
                    <!-- login Form -->
                    <form action="{{ route('insert-program') }}" method="POST">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="code" placeholder="Code">
                            <span class="text-danger">@error('code'){{$message}} @enderror</span>
                            <label for="floatingInput">Code</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-lg" aria-label="Default select example" name="degree">
                                <option selected disabled>Select Degree</option>
                                <option value="Doctoral">Doctoral Degree</option>
                                <option value="Thesis Master’s">Thesis Master’s</option>
                                <option value="Non-Thesis Master’s">Non-Thesis Master’s</option>
                            </select>
                            <span class="text-danger">@error('degree'){{$message}} @enderror</span>
                            <label for="floatingInput">Degree</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="program" placeholder="Program">
                            <span class="text-danger">@error('program'){{$message}} @enderror</span>
                            <label for="floatingInput">Program</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="description" placeholder="description">
                            <span class="text-danger">@error('description'){{$message}} @enderror</span>
                            <label for="floatingInput">Description</label>
                        </div>               
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary shadow-sm btn-login fw-bold mb-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection