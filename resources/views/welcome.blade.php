<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LNU Graduate School Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">

    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png" />
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

    <section id="hero-main">
        <div class="container h-50">
            <div class="row ">
                <div class="col col-xs-6 my-auto">
                    <div class="card bg-none text-white">
                        <div class="card-title">
                            <h1 class="pt-5 text-center">
                                Welcome to <span class="auto-type" strong style="color: #f6b024; font-weight: bold;"></span> </strong> </h1>
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text text-center">
                                <b>Graduate School Managment System</b>
                            </p>
                            <p class="card-text text-center">
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

                            {{-- <div style="margin-top: 30px; text-align: center;" >
                                <a style="font-weight: bold;" href="student/auth/login" class="btn btn-warning technical-btn btn-get-started animate__animated animate__fadeInUp scrollto">I'm a Student</a>
                                <a style="font-weight: bold;" href="staff/auth/login" class="btn btn-warning technical-btn btn-get-started animate__animated animate__fadeInUp scrollto">I'm an Employee</a>
                            </div> --}}
                            <div style=" text-align: center;">
                                <a style="font-weight: bold;" href="{{ route('enrollment') }}" class="btn btn-warning technical-btn btn-get-started animate__animated animate__fadeInUp scrollto">Enroll Now</a>
                                <a style="font-weight: bold;" href="{{ route('process') }}" class="btn btn-warning technical-btn btn-get-started animate__animated animate__fadeInUp scrollto">Enrollment Process</a>
                            </div>
                            {{-- <div class="text-center">
                                <a href="student/auth/login" class="button1 text-decoration-none">I'm a Student</a>
                                <a href="staff/auth/login" class="button btn-md text-decoration-none">I'm an Employee</a>
                            </div> --}}
                            {{-- <div>
                                <button type="submit" class="mt-3 technical-btn btn btn-warning">Submit</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="icon-boxes" class="icon-boxes" {{-- style="margin-top: 50px;" --}}>
        <div class="container">

            <!-- Remove Unavailable Class if page is ready -->

            <div class="row text-center">
                {{-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                <div class="icon-box shadow">
                <div class="icon unavailable"><i class="bx bx-transfer"></i></div>
                <h4 class="title unavailable"><a href="">Shifting of Program</a></h4>
                <p class="description unavailable">Transfer to a degree program of your choice</p>
                <hr class="default-divider mt-3">
                <div class="alert alert-dark pt-1 pb-1" style="border-radius: 50px; font-weight: 600; font-size: 10px; width: 70%;"><i class="bx bx-hard-hat pt-1"></i>&nbsp;Page Under Construction</div>
                </div>
            </div> --}}
                <div class="col-sm"></div>
                <div class="col-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title">Programs Offered</h4>
                        <p class="description">List of programs offering!</p>
                        <hr class="default-divider mt-3">
                        <div class="btn btn-warning" style="border-radius: 50px; width: 70%; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#programModalForm">Show</div>
                    </div>
                </div>

                {{-- <div class="col-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4 class="title">Subjects Offered</h4>
                <p class="description">List of subjects offering!</p>
                <hr class="default-divider mt-3">
                <div class="btn btn-warning" style="border-radius: 50px; width: 70%; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#subjectModalForm">Show</div>
                </div>
            </div> --}}
                <div class="col-sm"></div>
            </div>

        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="programModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Programs Offering</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4 my-4">
                    @foreach($programList as $programList)

                    <li style="font-weight: bold;">{!! $programList->program !!} -
                        @if($programList->status == "Active")
                        <a style="text-decoration: none; border-radius:30px;" class="alert alert-primary"> {!! $programList->status !!} </a>
                        @elseif($programList->status == "Dissolved")
                        <a style="text-decoration: none; border-radius:30px;" class="alert alert-danger text-center"> {!! $programList->status !!} </a>
                        @else
                        <a style="text-decoration: none; border-radius:30px;" class="alert alert-warning text-center"> Inactive </a>
                        @endif
                    </li><br class="mt-5" />

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Modal -->
    <div class="modal fade" id="subjectModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subjects Offering</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4 my-4">
                    
                </div>
            </div>
        </div>
    </div> --}}


    <section class="container feature pt-5 mt-5 mb-5">

        <!-- what we do -->
        <h1 class="text-center display-6">Announcements</h1>
        <hr />
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

    <section class="dashboard-main mt-5">
        <br />
        <h1 class="text-center display-6 mt-3" style="color: white;"><strong>Graduate School</strong></h1>
        <p class="mt-1 text-center dashboard-detail">Dashboard Numbers</p>
        <br />
        <div class="row text-center mt-5">
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="yellow" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                </svg>
                <div class="col mt-3 dashboard-count">{{$enrolledStudents}}</div>
                <hr class="mb-3" style="width: 150px; margin: auto; color: white;">
                <p class="dashboard-detail">Enrolled Students</p>
            </div>
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="yellow" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                </svg>
                <div class="col mt-3 dashboard-count">{{$approvedStudents}}</div>
                <hr class="mb-3" style="width: 150px; margin: auto; color: white;">
                <p class="dashboard-detail">Pre-Registered Students</p>
            </div>
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="yellow" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                    <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                </svg>
                <div class="col mt-3 dashboard-count">{{$programs}}</div>
                <hr class="mb-3" style="width: 150px; margin: auto; color: white;">
                <p class="dashboard-detail">Programs Offered</p>
            </div>
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="yellow" class="bi bi-book-fill" viewBox="0 0 16 16">
                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg>
                <div class="col mt-3 dashboard-count">{{$subjects}}</div>
                <hr class="mb-3" style="width: 150px; margin: auto; color: white;">
                <p class="dashboard-detail">Subjects Offered</p>
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
        <hr />
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
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed(".auto-type", {
            strings: ["LEYTE NORMAL UNIVERSITY","Graduate School Managment System"],
            typeSpeed: 100,
            backSpeed: 50,
            loop: true
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>