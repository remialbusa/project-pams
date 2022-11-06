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
    <title>Student Information</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/pending">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class="px-4 mt-5 mb-5">
                    <h4>Approve Pending Student Data</h4>
                    <hr />
                    <form action="{{route('approve-pending')}}" method="POST" enctype="multipart/form-data">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="profile mt-5">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$status['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            <h5 class="lead">Edit Pending Students</h5>
                            <h5 class="mt-5 lead">Student Status</h5>
                                <div class="row">
                                    <div class="col mt-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Submitted Form</label>
                                            <select class="form-select" aria-label="Default select example" name="submitted_form">
                                                @if($status['submitted_form'] == 'Pending')
                                                <option value="Pending">Pending</option>
                                                
                                                @else
                                                <option value="Submitted">Submitted</option>
                                                
                                                @endif
                                            </select>
                                            <div class="mt-3"><a href="{{ route('admin.view-pdf', $status->id)}}" class="edit mx-2 bi bi-eye">View Requirements</a></div>
                                            <span class="text-danger">@error('submitted_form'){{$message}} @enderror</span>
                                        </div>
                                    </div>

                                    <div class="col mt-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Payment</label>
                                            <select class="form-select" aria-label="Default select example" name="payment">
                                                @if($status['payment'] == 'Pending')
                                                <option value="Pending">Pending</option>
                                                
                                                @else
                                                <option value="Paid">Paid</option>
                                                
                                                @endif
                                            </select>
                                            <span class="text-danger">@error('payment'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col mt-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Status Form</label>
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                @if($status['status'] == 'Pending')
                                                <option value="Pending">Pending</option>
                                                
                                                @else
                                                <option value="Done">Done</option>
                                                
                                                @endif
                                            </select>
                                            <span class="text-danger">@error('status'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div> 
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$status['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            <div class="profile mt-5">
                                <h5 class="lead">Student Information</h5>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Student Type</label>
                                        <select class="form-select" aria-label="Default select example" name="student_type">
                                            @if($status['student_type'] == 'New Student')
                                            <option selected value="New Student">New Student</option>
                                            @else
                                            <option value="Continuing">Continuing</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('student_type'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="form-control" name="student_id" value="{{$status['student_id']}}" />
                                            <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="form-control" name="last_name" value="{{$status['last_name']}}" />
                                            <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="form-control" name="first_name" value="{{$status['first_name']}}" />
                                            <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Middle name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="form-control" name="middle_name" value="{{$status['middle_name']}}" />
                                            <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Vaccination Status <label class="text-danger">*</label></label>
                                            <select class="form-select" aria-label="Default select example" name="vaccination_status">
                                                @if($status['vaccination_status'] == 'Vaccinated')
                                                <option selected value="Vaccinated">Vaccinated</option>
                                                @elseif($status['student_type'] == 'Not Vaccinated')
                                                <option selected value="Not Vaccinated">Not Vaccinated</option>
                                                @else
                                                <option selected value="Partially Vaccinated">Partially Vaccinated</option>
                                                @endif
                                            </select>
                                            <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Email <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="form-control" name="email" value="{{$status['email']}}" />
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Gender</label>
                                            <select class="form-select" aria-label="Default select example" name="gender">
                                                @if($status['gender'] == 'Male')
                                                <option value="Male">Male</option>
                                                @else
                                                <option value="Female">Female</option>
                                                @endif
                                            </select>
                                            <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Birthdate</label>
                                            <input type="date" id="form6Example1" class="form-control" name="birth_date" value="{{$status['birth_date']}}" />
                                            <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Mobile Number <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="form-control" name="mobile_no" value="{{$status['mobile_no']}}" />
                                            <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Facebook Account Name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="form-control" name="fb_acc_name" value="{{$status['fb_acc_name']}}" />
                                            <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-5 lead">COURSE/S</h5>
                                <div class="col mt-4 mb-3">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Select Your Program</label>
                                            <select class="form-select" aria-label="Default select example" name="program">
                                                @if($status['program'] == 'MIT')
                                                <option selected value="MIT">MIT - Master of Information Technology</option>
                                                @elseif($status['program'] == 'MSIT')
                                                <option selected value="MSIT">MSIT - Master of Science in Information Technology</option>
                                                @elseif($status['program'] == 'ME')
                                                <option selected value="ME">ME - Master in English</option>
                                                @else
                                                <option selected value="MB">MB - Master in Biology</option>
                                                @endif
                                            </select>
                                            <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                            <div class="row mt-2 mb-3">
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">1st PERIOD</label>
                                        <select class="form-select" aria-label="Default select example" name="first_period_sub">
                                            @if($status['first_period_sub'] == 'MIT 501 Advanced Programming I')
                                            <option disabled>Select</option>
                                            <option selected value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @elseif($status['first_period_sub'] == 'MIT 505 Advanced Data Structure and Algorithm')
                                            <option disabled>Select</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option selected value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @elseif($status['first_period_sub'] == 'MIT 506 Advanced Multimedia Communication')
                                            <option disabled>Select</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option selected value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @elseif($status['first_period_sub'] == 'MSIT 501 Advanced Programming I')
                                            <option disabled>Select</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option selected value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @elseif($status['first_period_sub'] == 'MSIT 505 Advanced Data Structure & Algorithm')
                                            <option disabled>Select</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option selected value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @elseif($status['first_period_sub'] == 'MSIT 506 Advanced Multimedia Communication')
                                            <option disabled>Select</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option selected value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @else
                                            <option selected disabled>Select</option>
                                            <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                            <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                            <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                            <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                            <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                            <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('first_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Schedule</label>
                                        <input type="text" id="form6Example2" class="form-control" name="first_period_sched" value="{{$status['first_period_sched']}}" readonly/>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Adviser</label>
                                        <input type="text" id="form6Example2" class="form-control" name="first_period_adviser" value="{{$status['first_period_adviser']}}" readonly/>
                                        <span class="text-danger">@error('first_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                            <div class="row mt-2 mb-3">
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">2nd PERIOD</label>
                                        <select class="form-select" aria-label="Default select example" name="second_period_sub">
                                            @if($status['second_period_sub'] == 'MIT 502 Methods of Research for IT')
                                            <option disabled>Select</option>
                                            <option selected value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                            <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                            <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                            <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                            @elseif($status['second_period_sub'] == 'MIT 507 System Analysis and Design')
                                            <option disabled>Select</option>
                                            <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                            <option selected value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                            <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                            <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                            @elseif($status['second_period_sub'] == 'MSIT 502 Methods of Research for IT')
                                            <option disabled>Select</option>
                                            <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                            <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                            <option selected value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                            <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                            @elseif($status['second_period_sub'] == 'MSIT 507 System Analysis and Design')
                                            <option disabled>Select</option>
                                            <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                            <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                            <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                            <option selected value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                            @else
                                            <option selected disabled>Select</option>
                                            <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                            <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                            <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                            <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('second_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Schedule</label>
                                        <input type="text" id="form6Example2" class="form-control" name="second_period_sched" value="{{$status['second_period_sched']}}" readonly/>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Adviser</label>
                                        <input type="text" id="form6Example2" class="form-control" name="second_period_adviser" value="{{$status['second_period_adviser']}}" readonly/>
                                        <span class="text-danger">@error('second_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            <div class="row mt-2 mb-3">
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">3rd Period</label>
                                        <select class="form-select" aria-label="Default select example" name="third_period_sub">
                                            @if($status['third_period_sub'] == 'MIT 503 Statistics for IT Research')
                                            <option disabled>Select</option>
                                            <option selected value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                            <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                            <option value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                            <option value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                            @elseif($status['third_period_sub'] == 'MSIT 503 Statistics for IT Research')
                                            <option disabled>Select</option>
                                            <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                            <option selected value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                            <option value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                            <option value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                            @elseif($status['third_period_sub'] == 'TW 001 Statistics for IT Research')
                                            <option disabled>Select</option>
                                            <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                            <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                            <option selected value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                            <option value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                            @elseif($status['third_period_sub'] == 'TW 002 Statistics for IT Research')
                                            <option disabled>Select</option>
                                            <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                            <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                            <option value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                            <option selected value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                            @else
                                            <option selected disabled>Select</option>
                                            <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                            <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                            <option value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                            <option value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('third_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Schedule</label>
                                        <input type="text" id="form6Example2" class="form-control" name="third_period_sched" value="{{$status['third_period_sched']}}" readonly/>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Adviser</label>
                                        <input type="text" id="form6Example2" class="form-control" name="third_period_adviser" value="{{$status['third_period_adviser']}}" readonly/>
                                        <span class="text-danger">@error('third_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            </div> 
                        <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Enroll</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="px-4 mt-5 mb-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>