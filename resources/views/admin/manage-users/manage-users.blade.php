@extends('admin.admin-main-layout')
@section('title', 'Manage users')

@section('content')

<body>
    <div>
        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Active Admin Users</h1>
                <a class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#insertModalForm">Add User</a>
            </div>
            <p>List below are the admin users.</p>
            
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of users</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>               
                            <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->employee_id}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->role}}</td>
                                    <td>
                                        <a href="{{ route('edit-admin', $admin['id'])}}" class="edit mx-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('delete-admin', $admin['id'])}}" class="delete"><i class="bi bi-trash3"></i></a>
                                    </td>
                                </tr>
                            @endforeach                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
                    <!-- Modal -->
            <div class="modal fade" id="insertModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- login Form -->
                            <form action="{{ route('auth.save-admin') }}" method="POST">
                                @if(Session::get('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif

                                @if(Session::get('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif

                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" value="{{ old('employee_id') }}">
                                    <span class="text-danger">@error('employee_id'){{$message}} @enderror</span>
                                    <label for="floatingInput">Employee ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select form-select-lg" aria-label="Default select example" name="role">
                                        <option value="Admin">Admin</option>
                                        <option value="Admission Officer">OGS Officer</option>
                                        <option value="MIS Officer">MIS Officer</option>
                                    </select>
                                    <span class="text-danger">@error('role'){{$message}} @enderror</span>
                                    <label for="floatingInput">Role</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') }}">
                                    <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                    <label for="floatingInput">Middle Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                                    <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                    <label for="floatingInput">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                    <label for="floatingPassword">Password</label>
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
    </div>
</body>

@endsection