<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LNU Graduate School Manangement System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">

</head>

<body>
    
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a href="" class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item px-2">
                    </li>
                    <li class="nav-item px-2">
                        <a href="student/auth/faqs" class="nav-link" href="#">FAQ's</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Login as
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="student/auth/login">Student</a></li>
                        <li><a class="dropdown-item" href="staff/auth/login">Employee</a></li>
                    </ul>
                </div>
            </div>
    </nav>
    <section class="hero-main">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col col-xs-6 my-auto">
                    <!-- sign up form -->
                    <div class="card bg-none text-white">
                        <div class="card-title">
                            <h1 class="pt-3">
                                Welcome to LNU Graduate School Management System
                            </h1>
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text">
                                <b>Graduate School Pre Advising Management System</b>
                            </p>
                            <p class="card-text">
                                The pre-enrollment for 1st Semester S.Y. 2022 - 2023
                                is currently on going! Pre-enrollment period:
                                July 16 - August 7, 2022. Enrollment Period: August 08 - 19, 2022.
                                Classes will start on August 22, 2022.

                            </p>
                            <a href="{{ route('enrollment') }}" class="btn btn-warning bg-warning btn-block mt-3">Enroll now</a>
                            <a href="{{ route('process')}}" class="btn btn-warning bg-warning btn-block mt-3">Enrollment process</a>
                        </div>
                    </div>
                </div>
                <div class="col col-xs-9 my-auto hero-img-col">
                    <img class="hero-img" src="./images/teaching.svg" alt="hero-img" />
                </div>
            </div>
        </div>
    </section>

    <section class="container feature pt-5 mt-5">
        <!-- what we do -->
        <h1 class="text-center display-6">Enrollment Updates</h1>
        <hr>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/handshake-colour-thumbnail.png" class="d-block w-50" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/responsive.png" class="d-block w-50" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/customisable.jpg" class="d-block w-50" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

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
                <p class="text-light text-center">© Copyright <b>Leyte Normal university</b> . All Rights Reserved 2022</p>
            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>