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
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png"/>
    <title>Student Information</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" style="height:40px; width: 40px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" style="height:50px; width: 50px" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/manage-enrollees">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class="px-4 mt-5 mb-5">
                    <h4>Edit Approved Student Data</h4>
                    <hr />
                    <form action="{{route('admin.enroll-student')}}" method="POST" enctype="multipart/form-data">
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
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$students['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            
                            <div class="profile mt-5">
                                <h5 class="lead">Student Information</h5>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Student Type</label>
                                        <select class="no-border form-select" aria-label="Default select example" name="student_type">
                                            @if($students['student_type'] == 'New Student')
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
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="student_id" value="{{$students['student_id']}}" />
                                            <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="no-border form-control" name="last_name" value="{{$students['last_name']}}" />
                                            <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="first_name" value="{{$students['first_name']}}" />
                                            <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example2">Middle name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="no-border form-control" name="middle_name" value="{{$students['middle_name']}}" />
                                            <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example2">Vaccination Status <label class="text-danger">*</label></label>
                                            <select class="no-border form-select" aria-label="Default select example" name="vaccination_status">
                                            @if($students['vaccination_status'] == 'Fully Vaccinated')
                                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                                <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                <option value="Not Vaccinated">Not Vaccinated</option>
                                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                            @elseif($students['vaccination_status'] == 'Partially Vaccinated')
                                                <option valuendife="Partially Vaccinated">Partially Vaccinated</option>
                                                <option value="Vaccinated">Vaccinated</option>
                                                <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                <option value="Not Vaccinated">Not Vaccinated</option>
                                            @elseif($students['vaccination_status'] == 'Vaccinated w/ 1 Booster')
                                                <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                <option value="Vaccinated">Vaccinated</option>
                                                <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                <option value="Not Vaccinated">Not Vaccinated</option>
                                            @elseif($students['vaccination_status'] == 'Vaccinated w/ 2 Boosters')
                                                <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                <option value="Vaccinated">Vaccinated</option>
                                                <option value="Not Vaccinated">Not Vaccinated</option>
                                            @else
                                                <option selected value="Not Vaccinated">Not Vaccinated</option>
                                                <option value="Vaccinated">Vaccinated</option>
                                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                            @endif
                                            </select>
                                            <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example2">Email <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="no-border form-control" name="email" value="{{$students['email']}}" />
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example2">Sex</label>
                                            <select class="no-border form-select" aria-label="Default select example" name="gender">
                                                @if($students['gender'] == 'Male')
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                @else
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                                @endif
                                            </select>
                                            <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Birthdate</label>
                                            <input type="date" id="form6Example1" class="no-border form-control" name="birth_date" value="{{$students['birth_date']}}" />
                                            <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Mobile Number <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="mobile_no" value="{{$students['mobile_no']}}" />
                                            <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example2">Facebook Account Name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="no-border form-control" name="fb_acc_name" value="{{$students['fb_acc_name']}}" />
                                            <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2 mb-3">
                                    <label class="form-label">Address</label>
                                    <p>
                                        <i>(Please follow the format Region/Province/City/Barangay.)</i>
                                    </p>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Region <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="region" value="{{$students->region}}"/>
                                            <span class="text-danger">@error('region'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Province <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="province" value="{{$students['province']}}"/>
                                            <span class="text-danger">@error('province'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">City <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="city" value="{{$students['city']}}"/>
                                            <span class="text-danger">@error('city'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Baranggay <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="no-border form-control" name="baranggay" value="{{$students['baranggay']}}"/>
                                            <span class="text-danger">@error('baranggay'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="mt-5 lead">Student Status</h5>
                        <div class="row mb-5">
                            <div class="col mt-4">
                                <div class="form-outline ">
                                    <label class="form-label" for="form6Example2">First Process</label>
                                    <select class="form-select form-line" aria-label="Default select example" name="first_procedure">
                                        @if ($students['first_procedure'] == 'Done')
                                        <option selected value="Done">Done</option>
                                        @else
                                        <option selected value="Pending">Pending</option>
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('first_procedure'){{$message}} @enderror</span>
                                </div>
                            </div>

                            <div class="col mt-4">
                                <div class="form-outline ">
                                    <label class="form-label " for="form6Example2">Second Process</label>
                                    <select class="form-select form-line" aria-label="Default select example" name="second_procedure">
                                        @if ($students['second_procedure'] == 'Done')
                                        <option selected value="Done">Done</option>
                                        @else
                                        <option selected value="Pending">Pending</option>
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('second_procedure'){{$message}} @enderror</span>
                                </div>
                            </div>
                            
                            <div class="col mt-4">
                                <div class="form-outline ">
                                    <label class="form-label" for="form6Example2">Third Process</label>
                                    <select class="form-select form-line" aria-label="Default select example" name="third_procedure">
                                        @if ($students['third_procedure'] == 'Done')
                                        <option selected value="Done">Done</option>
                                        @else
                                        <option selected value="Pending">Pending</option>
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('third_procedure'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mt-3 lead">Programs & Subjects</h5>
                            <div class="col mt-4 mb-3">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Program</label>
                                        <select readonly class="form-select" aria-label="Default select example" name="program" id="slct_program">
                                            <option value="{{$students->program}}">{{$students->getProgramID->program}} - {{$students->getProgramID->description}}</option>
                                        </select>
                                        <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3"></div>
                            <div class="row mt-2 mb-3">
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">1st PERIOD</label>
                                        <select class="form-select" aria-label="Default select example" name="first_period_sub" id="slct_first_period">
                                            <option value="{{$students->first_period_sub}}">{{$students->getFirstPeriodID->code}} - {{$students->getFirstPeriodID->subject}}</option>
                                        </select>
                                        <span class="text-danger">@error('first_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example2" class="form-control" name="first_period_sched" value="{{$students['first_period_sched']}}" />
                                        <span class="text-danger">@error('first_period_sched'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Instructor</label><label class="text-danger">*</label>
                                        <input readonly type="text" class="form-control" aria-label="Default select example" name="first_period_adviser" value="{{$students['first_period_adviser']}}">
                                        <span class="text-danger">@error('first_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                            <div class="row mt-2 mb-3">
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">2nd PERIOD</label>
                                        <select class="form-select" aria-label="Default select example" name="second_period_sub">
                                            <option value="{{$students->second_period_sub}}">{{$students->getSecondPeriodID->code}} - {{$students->getSecondPeriodID->subject}}</option>
                                        </select>
                                        <span class="text-danger">@error('second_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example2" class="form-control" name="second_period_sched" value="{{$students['second_period_sched']}}" />
                                        <span class="text-danger">@error('second_period_sched'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Instructor</label><label class="text-danger">*</label>
                                        <input readonly type="text" class="form-control" aria-label="Default select example" name="second_period_adviser" value="{{$students['second_period_adviser']}}">
                                        <span class="text-danger">@error('second_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            <div class="row mt-2 mb-3">
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">3rd Period</label>
                                        <select class="form-select" aria-label="Default select example" name="third_period_sub">
                                            <option value="{{$students->third_period_sub}}">{{$students->getThirdPeriodID->code}} - {{$students->getThirdPeriodID->subject}}</option>
                                        </select>
                                        <span class="text-danger">@error('third_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example2" class="form-control" name="third_period_sched" value="{{$students['third_period_sched']}}"/>
                                        <span class="text-danger">@error('third_period_sched'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Instructor</label><label class="text-danger">*</label>
                                        <input readonly type="text" class="form-control" aria-label="Default select example" name="third_period_adviser" value="{{$students['third_period_adviser']}}">
                                        <span class="text-danger">@error('third_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="px-4 mt-5 mb-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>