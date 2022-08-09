<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link">Welcome, <b>{{$LoggedUserInfo->first_name}}</b></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="">Student Profile</a>
                    </li>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.logout-student')}}">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>

    <section class="details">

        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class="basic-details mt-5 px-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-sm-8">
                                <h2>Enrollment Profile</h2>
                                <div class="alert alert-light">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p class="mb-0" style="font-size: 40px; text-align: center;"><i class="bx bx-user-circle"></i></p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="profile-text">Student Number: <span style="font-weight: 600;"> </span> </p>
                                            <p class="profile-text">Contact Number: <span style="font-weight: 600;"> </span> </p>
                                        </div>
                                        <div class="col-md-5" style="">
                                            <p class="profile-text">Name: <span style="font-weight: 600; text-transform: uppercase;"> </span> </p>
                                            <p class="profile-text">Facebook Account: <span style="font-weight: 600;"></span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <ul class="nav nav-tabs nav-fill mt-4 mb-2" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link link-dark active" id="active-semester-tab" data-bs-toggle="tab" href="#active-semester" role="tab" aria-controls="active-semester" aria-selected="true">Enrollment Status</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link link-dark" id="enrolled-tab" data-bs-toggle="tab" href="#enrolled-subjects" role="tab" aria-controls="enrolled-subjects" aria-selected="false">Enrolled Subjects</a>
                            </li>
                        </ul>
                        <div class="manage-user-body container px-4">
                            <div class="tab-content mb-5" id="myTabContent">
                                <div class="tab-pane fade show active" id="active-semester" role="tabpanel" aria-labelledby="active-semester-tab">
                                    <div class="table-wrapper row">
                                        <table class="table table-fixed table-hover">
                                            <h4 class="title mb-2">Monitor Status</h4>
                                            <h6 class="form-header"><b>You are currently enrolled with the following details: </b></h6>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text"><b>Student Type: </b><span style="font-weight: 600; color: #4285F4;"> </span> {{$LoggedUserInfo->student_type}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="sub-text"><b>Program: </b><span style="font-weight: 600; color: #4285F4;"> </span> {{$LoggedUserInfo->program}} </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>