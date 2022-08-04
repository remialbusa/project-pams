<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom css -->
    <link type="text/css" href="{{url('css/manage-users.css')}}" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('auth.logout-admin')}}"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link active">Welcome, <b>{{$LoggedAdminInfo->name}}</b></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/manage-users">Manage Users</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/system-configuration">System Configuration</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.logout-admin')}}">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>

    <section class="manage-users-section">
        <div class="manage-users-body container mt-5 px-4">
            <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Users</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalForm"><i class="material-icons">&#xE147;</i> <span>Add User</span></a>                      
                        </div>
                    </div>
                </div>
                <hr>
            <div class="table-wrapper row">              
                <table class="table table-fixed table-hover">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $key => $admin)
                        <tr>
                            <td>{{$admin->employee_id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>
                                <a href="{{ route('edit-admin',  $adminData->id) }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        @endforeach                      
                    </tbody>
                </table>
                
            </div>
            <div class="clearfix px-4 mb-4">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <button type="submit" class="btn btn-lg btn-warning btn-login fw-bold mb-2">Login</button>                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <footer class="footer mb-0">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-8">
                    <div class="row text-white">
                        <div class="col col-12 col-sm-6">
                            <h5>Contact Us</h5>
                            <ul>
                                <li><a>Leyte Normal University</a></li>
                                <li><a>B. Paterno Street</a></li>
                                <li><a>Tacloban City, Leyte 6500</a></li>
                                <li><a><b>Phone:</b>+63 (53) 321 2176</a></li>
                                <li><a><b>Email:</b>info@lnu.edu.ph</a></li>
                            </ul>
                        </div>
                        <div class="col col-12 col-sm-3">
                            <h5>Useful Links</h5>
                            <ul>
                                <li><a href="#">LNU Official Website</a></li>
                                <li><a href="#">LNU Student Portal</a></li>
                                <li><a href="#">Enrollment Updates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 my-auto">
                    <img class="footer-logo" src="https://www.enrollment.lnu.edu.ph/assets/images/lnu_logo.png" alt="logo" />
                    <p>Follow our official social media platforms:</p>
                    <div class="row">
                        <div class="col col-xs-6 ml-2">
                            <i class="bi bi-facebook" style="font-size: 2rem; margin-right: 20px;"></i>
                            <i class="bi bi-youtube" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-light text-center">© Copyright <b>Leyte Normal University</b> . All Rights Reserved 2022</p>
            </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>