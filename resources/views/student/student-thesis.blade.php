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
    <div class="offcanvas offcanvas-start w-25" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
        <div class="offcanvas-header container-fluid">
            <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                <li class="nav-item">
                    <a href="/student/student-profile" class="nav-link">
                        <i class="fs-5 bi-person-lines-fill"></i><span class="ms-1 d-none d-sm-inline">Student Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/student/monitor-enrollment" class="nav-link">
                        <i class="fs-5 bi-display"></i><span class="ms-1 d-none d-sm-inline">Monitor Enrollment</span></a>
                </li>
                <li>
                    <a href="/student/student-thesis" class="nav-link">
                        <i class="fs-5 bi-folder-fill"></i><span class="ms-1 d-none d-sm-inline">Thesis</span></a>
                </li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
        <div class="container">
            <div>
                <button class="btn float-start" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                    <i class="bi bi-list fs-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
                </button>
            </div>
            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link">Welcome, <b>{{$LoggedUserInfo->first_name}}</b></a>
                    </li>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.logout-student')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="details">
        <div class="manage-users-body container mt-5 mb-5">
            <div class="container h-100">
                <div class="basic-details mt-5 px-4">
                    <h4>Thesis<h4>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>