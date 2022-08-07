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
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.enrollment-status')}}">Monitor Enrollment</a>
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
                <div class="basic-details mt-5">
                    <h4 class="px-5">Enrollment Details</h4>
                    <hr>
                    <h6 class="mt-5 px-5"><b>You are currently enrolled with the following details:</b></h6>
                    <p class="px-5">
                        <i>(Note: To update your enrollment details, select the corresponding field from the drop-downs below and click 'Update'.)</i>
                    </p>
                    <form action="{{ route('update-student') }}" method="POST">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$LoggedUserInfo->id}}">
                            <span class="text-danger">@error('id'){{$message}} @enderror</span>
                        </div>
                        <div class="student-type px-5">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1"><b>Student Type</b></label>
                                        <select class="form-select" aria-label="Default select example" name="student_type">
                                            @if($LoggedUserInfo->student_type == 'New Student')
                                            <option selected value="New Student">New Student</option>
                                            <option value="Continuing">Continuing</option>
                                            @else
                                            <option value="New Student">New Student</option>
                                            <option selected value="Continuing">Continuing</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('student_type'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2"><b>Program</b></label>
                                        <select class="form-select" aria-label="Default select example" name="program">
                                            @if($LoggedUserInfo->program == 'MIT')
                                            <option selected value="MIT">MIT - Master of Information Technology</option>
                                            <option value="MSIT">MSIT - Master of Science in Information Technology</option>
                                            <option value="ME">ME - Master of English</option>
                                            <option value="MSW">MSW - Master of Social Work</option>
                                            <option value="MB">MB - Master in Biology</option>
                                            @elseif($LoggedUserInfo->program == 'MSIT')
                                            <option value="MIT">MIT - Master of Information Technology</option>
                                            <option selected value="MSIT">MSIT - Master of Science in Information Technology</option>
                                            <option value="ME">ME - Master of English</option>
                                            <option value="MSW">MSW - Master of Social Work</option>
                                            <option value="MB">MB - Master in Biology</option>
                                            @elseif($LoggedUserInfo->program == 'ME')
                                            <option value="MIT">MIT - Master of Information Technology</option>
                                            <option value="MSIT">MSIT - Master of Science in Information Technology</option>
                                            <option selected value="ME">ME - Master of English</option>
                                            <option value="MSW">MSW - Master of Social Work</option>
                                            <option value="MB">MB - Master in Biology</option>
                                            @elseif($LoggedUserInfo->program == 'MSW')
                                            <option value="MIT">MIT - Master of Information Technology</option>
                                            <option value="MSIT">MSIT - Master of Science in Information Technology</option>
                                            <option value="ME">ME - Master of English</option>
                                            <option selected value="MSW">MSW - Master of Social Work</option>
                                            <option value="MB">MB - Master in Biology</option>
                                            @else
                                            <option value="MIT">MIT - Master of Information Technology</option>
                                            <option value="MSIT">MSIT - Master of Science in Information Technology</option>
                                            <option value="ME">ME - Master of English</option>
                                            <option value="MSW">MSW - Master of Social Work</option>
                                            <option selected value="MB">MB - Master in Biology</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile mt-5 px-5">

                            <h5><b>Profile</b></h5>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Student ID Number</label>
                                        <input type="text" id="form6Example1" class="form-control" name="student_id" value="{{$LoggedUserInfo->student_id}}" />
                                        <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">First name</label>
                                        <input type="text" id="form6Example2" class="form-control" name="first_name" value="{{$LoggedUserInfo->first_name}}" />
                                        <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Middle name</label>
                                        <input type="text" id="form6Example1" class="form-control" name="middle_name" value="{{$LoggedUserInfo->middle_name}}" />
                                        <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Last name</label>
                                        <input type="text" id="form6Example2" class="form-control" name="last_name" value="{{$LoggedUserInfo->last_name}}" />
                                        <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Birthday</label>
                                        <input type="date" id="form6Example1" class="form-control" name="birth_date" value="{{$LoggedUserInfo->birth_date}}" />
                                        <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Gender</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            @if($LoggedUserInfo->student_id == 'Male')
                                            <option selected value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            @else
                                            <option value="Male">Male</option>
                                            <option selected value="Female">Female</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Civil Status</label>
                                        <select class="form-select" aria-label="Default select example" name="civil_status">
                                            @if($LoggedUserInfo->civil_status == 'Single')
                                            <option selected value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Widow/Widower">Widow/Widower</option>
                                            @elseif($LoggedUserInfo->civil_status == 'Married')
                                            <option value="Single">Single</option>
                                            <option selected value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Widow/Widower">Widow/Widower</option>
                                            @elseif($LoggedUserInfo->civil_status == 'Separated')
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option selected value="Separated">Separated</option>
                                            <option value="Widow/Widower">Widow/Widower</option>
                                            @else
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option selected value="Widow/Widower">Widow/Widower</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('civil_status'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Nationality</label>
                                        <input type="text" id="form6Example2" class="form-control" name="nationality" value="{{$LoggedUserInfo->nationality}}" />
                                        <span class="text-danger">@error('nationality'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Contact Number</label>
                                        <input type="text" id="form6Example1" class="form-control" name="contact_no" value="{{$LoggedUserInfo->contact_no}}" />
                                        <span class="text-danger">@error('contact_no'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Email Address</label>
                                        <input type="text" id="form6Example2" class="form-control" name="email" value="{{$LoggedUserInfo->email}}" />
                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="other-details px-5 mt-4">

                            <h5><b>Other details</b></h5>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Zip Code</label>
                                        <input type="text" id="form6Example1" class="form-control" name="zipcode" value="{{$LoggedUserInfo->zipcode}}" />
                                        <span class="text-danger">@error('zipcode'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Home Address</label>
                                        <input type="text" id="form6Example2" class="form-control" name="home_address" value="{{$LoggedUserInfo->home_address}}" />
                                        <span class="text-danger">@error('home_address'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Guardian</label>
                                        <input type="text" id="form6Example1" class="form-control" name="guardian" value="{{$LoggedUserInfo->guardian}}" />
                                        <span class="text-danger">@error('guardian'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Guardian Contact Number</label>
                                        <input type="text" id="form6Example2" class="form-control" name="guardian_contact_no" value="{{$LoggedUserInfo->guardian_contact_no}}" />
                                        <span class="text-danger">@error('guardian_contact_no'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Update</button>
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
                <p class="text-light text-center">© Copyright <b>Leyte Normal University</b> . All Rights Reserved 2022</p>
            </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>