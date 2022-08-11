<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- custom css -->
    <link href="./css/style.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="container-fluid ps-md-0 mt-4">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-4 mx-auto">
                        <h3 class="login-heading mb-4">Register</h3>
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
                                    <option value="OGS Officer">OGS Officer</option>
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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>