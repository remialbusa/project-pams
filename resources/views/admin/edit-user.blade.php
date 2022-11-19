<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- ph locations jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>

    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
    <title>Edit User</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/manage-users">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid ps-md-0 mt-4">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-4 mx-auto">
                        <h3 class="login-heading mb-4">Update User</h3>
                        <!-- login Form -->
                        <form action="{{route('update-admin')}}" method="POST">
                            @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$adminData['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput">ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" value="{{$adminData['employee_id']}}">
                                <span class="text-danger">@error('employee_id'){{$message}} @enderror</span>
                                <label for="floatingInput">Employee ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select form-select-lg" aria-label="Default select example" name="role">
                                    @if($adminData['role'] == 'Admin')
                                    <option selected value="Admin">Admin</option>
                                    <option value="OGS Officer">OGS Officer</option>
                                    <option value="MIS Officer">MIS Officer</option>
                                    @elseif($adminData['role'] == 'OGS Officer')
                                    <option value="Admin">Admin</option>
                                    <option selected value="OGS Officer">OGS Officer</option>
                                    <option value="MIS Officer">MIS Officer</option>
                                    @else
                                    <option value="Admin">Admin</option>
                                    <option value="OGS Officer">OGS Officer</option>
                                    <option selected value="MIS Officer">MIS Officer</option>
                                    @endif              
                                </select>
                                <span class="text-danger">@error('role'){{$message}} @enderror</span>
                                <label for="floatingInput">Role</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$adminData['name']}}">
                                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{$adminData['middle_name']}}">
                                <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                <label for="floatingInput">Middle Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$adminData['last_name']}}">
                                <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                <label for="floatingInput">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-warning btn-login fw-bold mb-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>