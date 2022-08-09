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
    <title>Register</title>
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">FAQ's</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class="basic-details px-4 mt-5 mb-5">
                    <h4>PRE-REGISTRATION</h4>
                    <hr />
                    <form action="{{ route('auth.save') }}" method="POST">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="profile mt-5">
                            <h5>PROFILE</h5>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="col mt-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Student Type</label>
                                    <select class="form-select" aria-label="Default select example" name="student_type">
                                        <option selected value="New Student">New Student</option>
                                        <option value="Continuing">Continuing</option>
                                    </select>
                                    <span class="text-danger">@error('student_type'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="student_id" />
                                        <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="last_name" />
                                        <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="first_name" />
                                        <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Middle name <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="middle_name" />
                                        <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Gender</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Birthday</label>
                                        <input type="date" id="form6Example1" class="form-control" name="birth_date" />
                                        <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Mobile Number<label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="contact_no" />
                                        <span class="text-danger">@error('contact_no'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Facebook Account Name <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="fb_account_name" />
                                        <span class="text-danger">@error('fb_account_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <label class="form-label" for="form6Example2">Address</label>
                                <p>
                                    <i>(Please follow the format Region/Province/City/Barangay.)</i>
                                </p>
                                <div class="col">
                                    <div class="form-outline">
                                        <select class="form-select" aria-label="Default select example" id="region" name="gender">

                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <select class="form-select" aria-label="Default select example" id="province" name="gender">

                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <select class="form-select" aria-label="Default select example" id="city" name="gender">

                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <select class="form-select" aria-label="Default select example" id="barangay" name="gender">

                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-5">COURSE/S</h5>
                            <div class="col mt-4 mb-3">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Select Your Program</label>
                                        <select class="form-select" aria-label="Default select example" name="program">
                                            <option disabled selected>N/A</option>
                                            <option value="MIT">MIT - Master of Information Technology</option>
                                            <option value="MSIT">MSIT - Master of Science in Information Technology</option>
                                            <option value="ME">ME - Master of English</option>
                                            <option value="MSW">MSW - Master of Social Work</option>
                                            <option value="MB">MB - Master in Biology</option>
                                            <option value="MB">MPE - Master in Physical Education</option>
                                            <option value="MB">MA-SPED - Master of Arts (Special Education)</option>
                                            <option value="MB">MM - Master in Management</option>
                                            <option value="MB">MED-MATHEMATICS - Master in Education (Mathematics)</option>
                                            <option value="MB">MA-PRE-ELEM - Master of Arts in Education(Pre-Elementary Education</option>
                                            <option value="MB">MAED-EDM - Master of Arts in Education(Educational Management)</option>
                                            <option value="MB">MAED-MATH - Master of Arts in Education(Mathematics)</option>
                                            <option value="MB">MAT-FILIPINO - Master of Arts in Education(Filipino)</option>
                                            <option value="MB">MAT-SOC SCI - Master of Arts in Teaching(Social Science)</option>
                                            <option value="MB">MAT-NAT SCI - Master of Arts in Teaching(Natural Science)</option>
                                            <option value="MB">MAT-READING - Master of Arts in Teaching(Reading)</option>
                                            <option value="MB">MAT-LT - Master of Arts in Teaching(Language Teaching)</option>
                                            <option value="MB">DM-HRM - Doctor of Management(Human Resource Management</option>
                                            <option value="MB">Ph.D.-SSR - Doctor of Philosophy(Social Science Research)</option>
                                            <option value="MB">DA-LT - Doctor of Arts(Language Teaching)</option>
                                            <option value="MB">EdD-EdAd - Doctor of Education(Educational Administration)</option>
                                        </select>
                                        <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 mb-5">
                                <div class="col-md-6 mt-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">1ST PERIOD - 7:30 a.m. - 10:30 a.m.</label>
                                        <select class="form-select" aria-label="Default select example" name="first_period">
                                            <option disabled selected>Select First Period Subject</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                        </select>
                                        <span class="text-danger">@error('first_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">2ND PERIOD - 11:00 a.m. - 2:00 p.m.</label>
                                        <select class="form-select" aria-label="Default select example" name="second_period">
                                            <option disabled selected>Select Second Period Subject</option>
                                            <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                            <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                            <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                            <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                        </select>
                                        <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-3 mt-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">3RD PERIOD - 2:00 p.m. - 5:00 p.m.</label>
                                        <select class="form-select" aria-label="Default select example" name="third_period">
                                            <option disabled selected>Select Third Period Subject</option>
                                            <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                            <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                            <option value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                            <option value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                        </select>
                                        <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
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
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>