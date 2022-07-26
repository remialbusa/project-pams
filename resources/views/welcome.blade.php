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

    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png"/>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow-5-strong">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a href="/welcome" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item px-2">
                    </li>
                    <li class="nav-item px-2">
                        <a href="/faqs" class="nav-link">FAQ's</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Login as
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="student/auth/login">Student</a></li>
                        <li><a class="dropdown-item" href="staff/auth/login">Staff</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <section class="hero-main">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col col-xs-6 my-auto">
                    <div class="card bg-none text-white">
                        <div class="card-title">
                            <h1 class="pt-3">
                                Welcome to LNU Graduate School Management System
                            </h1>
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text">
                                <b>Graduate School Managment System</b>
                            </p>
                            <p class="card-text">
                                @foreach ($school_year as $school_year)
                                @if ($school_year->status == 'Active')
                                    The pre-enrollment for {{$school_year->semester}} S.Y. {{$school_year->school_year}}
                                    is currently on going! Pre-enrollment period:
                                    July 16 - August 7, 2022. Enrollment Period: August 08 - 19, 2022.
                                    Classes will start on August 22, 2022.
                                @else
                                @endif
                                @endforeach
                            </p>

                            <a href="{{ route('enrollment') }}" class="button1 text-decoration-none">Enroll now</a>
                            <a href="{{ route('process') }}" class="button text-decoration-none">Enrollment process</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container feature pt-5 mt-5 mb-5">

        <!-- what we do -->
        <h1 class="text-center display-6">Announcements</h1>
        <hr/>
        <div class="container h-100">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item text-center active">
                        <img src="./images/handshake-colour-thumbnail.png" class="rounded mx-auto d-block img-fit" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item text-center">
                        <img src="./images/responsive.png" class="rounded d-block mx-auto img-fit" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item text-center">
                        <img src="./images/customisable.jpg" class="rounded d-block mx-auto img-fit" alt="...">
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
        </div>
    </section>

    {{-- <section class="hero-body pt-5 mt-5 mb-5">
        <h1 style="color:white;"class="text-center display-6">Event Calendar</h1>
        <hr/>
        <div class="container h-100 mt-5">
            <div class="text-center">
                <img src="./images/handshake-colour-thumbnail.png" class="rounded mx-auto d-block img-fit" alt="...">
            </div>
        </div>
    </section> --}}

    <section class="container feature pt-5 mt-5">

        <!-- what we do -->
        <h1 class="text-center display-6">Technical Support</h1>
        <hr/>
        <div class="row mt-5 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">
            <div class="col card-wrap mb-1 mt-4">
                <img src="./images/Technical_Support.jpg" class="rounded mx-auto d-block technical-img" alt="...">
            </div>
            <div class="col-lg-6 mb-2">
                <div class="forum" style="text-align: center">
                    <form action="{{ route('submit-form') }}" method="POST">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="lead">
                            <h3>Message Us</h3>
                        </div>
                        <div class="mb-3">
                            <div>
                                
                                <input type="text" class="technical-form mt-2 mt-1 border-strong" name="program" placeholder="Program">
                                <span class="text-danger">@error('program'){{$message}} @enderror</span>
                            </div>

                            <div>
                                
                                <input type="text" class="technical-form mt-1 border-strong" name="name" placeholder="Name">
                                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                            </div>
                            
                            <div>
                                
                                <input type="text" class="technical-form mt-1 border-strong" name="id_no" placeholder="ID Number">
                                <span class="text-danger">@error('id_no'){{$message}} @enderror</span>
                            </div>

                            <div>
                                
                                <input type="text" class="technical-form mt-1 mt-1 border-strong" name="email" placeholder="Email">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>

                            <div>
                                
                                <input style="height: 100px;" class="technical-form mt-1 mt-1 border-strong" name="concern" placeholder="Concern">
                                <span class="text-danger">@error('concern'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mt-3 technical-btn btn btn-warning">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <hr>
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