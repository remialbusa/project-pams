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
                        <a class="nav-link" href="/staff/admin/dashboard">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class=" px-4 mt-5 mb-5">
                    <h4>MANAGE STUDENT DATA</h4>
                    <hr />
                    <form action="{{ route('advising-and-assign-subject') }}" method="POST" enctype="multipart/form-data">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$student['id']}}">
                            <span class="text-danger">@error('id'){{$message}} @enderror</span>
                            <label for="floatingInput"></label>
                        </div>
                        <div class="profile mt-5">
                            <h5 class="lead">Student Information</h5>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">Student Type</label>
                                    <select class="form-select" aria-label="Default select example" name="student_type">
                                        @if($student['student_type'] == 'New Student')
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
                                        <input readonly type="text" id="form6Example1" class="form-control" name="student_id" value="{{$student['student_id']}}" />
                                        <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example2" class="form-control" name="last_name" value="{{$student['last_name']}}" />
                                        <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example1" class="form-control" name="first_name" value="{{$student['first_name']}}" />
                                        <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Middle name <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example2" class="form-control" name="middle_name" value="{{$student['middle_name']}}" />
                                        <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Vaccination Status <label class="text-danger">*</label></label>
                                        <select class="form-select" aria-label="Default select example" name="vaccination_status">
                                            @if($student['vaccination_status'] == 'Vaccinated')
                                            <option selected value="Vaccinated">Vaccinated</option>
                                            @elseif($student['student_type'] == 'Not Vaccinated')
                                            <option selected value="Not Vaccinated">Not Vaccinated</option>
                                            @else
                                            <option selected value="Partially Vaccinated">Partially Vaccinated</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Email <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example2" class="form-control" name="email" value="{{$student['email']}}" />
                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Gender</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            @if($student['gender'] == 'Male')
                                            <option value="Male">Male</option>
                                            @else
                                            <option value="Female">Female</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Birthdate</label>
                                        <input readonly type="date" id="form6Example1" class="form-control" name="birth_date" value="{{$student['birth_date']}}" />
                                        <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Mobile Number <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example1" class="form-control" name="mobile_no" value="{{$student['mobile_no']}}" />
                                        <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Facebook Account Name <label class="text-danger">*</label></label>
                                        <input reaonly type="text" id="form6Example2" class="form-control" name="fb_acc_name" value="{{$student['fb_acc_name']}}" />
                                        <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <hr />

                            <div class="row mt-2 mb-3">
                                <label class="lead mt-3">Address</label>
                                <p>
                                    <i>(Please follow the format Region/Province/City/Barangay.)</i>
                                </p>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Region <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example1" class="form-control" name="region" value="{{$student->region}}"/>
                                        <span class="text-danger">@error('region'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Province <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example1" class="form-control" name="province" value="{{$student['province']}}"/>
                                        <span class="text-danger">@error('province'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">City <label class="text-danger">*</label></label>
                                        <input readonly type="text" id="form6Example1" class="form-control" name="city" value="{{$student['city']}}"/>
                                        <span class="text-danger">@error('city'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Baranggay <label class="text-danger">*</label></label>
                                        <input readonyl type="text" id="form6Example1" class="form-control" name="baranggay" value="{{$student['baranggay']}}"/>
                                        <span class="text-danger">@error('baranggay'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h5 class="mt-3 lead">COURSE/S</h5>
                            <div class="col mt-4 mb-3">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Program</label>
                                        <select readonly class="form-select" aria-label="Default select example" name="program">
                                            @if($student['program'] == 'MIT')
                                                @foreach ($programs as $programs)
                                                    <option value="{{$programs->program}}">{{$programs->program}} - {{$programs->description}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($programs as $programs)
                                                    <option value="{{$programs->program}}">{{$programs->program}} - {{$programs->description}}</option>
                                                @endforeach
                                            @endif
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
                                        <select class="form-select" aria-label="Default select example" name="first_period_sub">
                                            @if($student['first_period_sub'] == 'MIT 501 Advanced Programming I')
                                                @foreach ($firstPeriod as $subjects)
                                                    <option value="{{$subjects->subject}}{{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($firstPeriod as $subjects)
                                                    <option value="{{$subjects->subject}}{{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('first_period_sub'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="first_period_sched" value="{{$student['first_period_sched']}}" />
                                        <span class="text-danger">@error('first_period_sched'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Adviser</label><label class="text-danger">*</label>
                                        <select class="form-select" aria-label="Default select example" id="slct_first_period" name="first_period_adviser">
                                            <option disabled selected>Select Adviser</option>
                                            @if($student['adviser'] == 'MIT')
                                                @foreach ($adviser as $advisers)
                                                    <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                        {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($adviser as $advisers)
                                                <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                    {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
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
                                            @if($student['second_period_sub'] == 'MIT 502 Methods of Research for IT')
                                                @foreach ($secondPeriod as $subjects)
                                                    <option value="{{$subjects->subject}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($secondPeriod as $subjects)
                                                    <option value="{{$subjects->subject}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="second_period_sched" value="{{$student['second_period_sched']}}" />
                                        <span class="text-danger">@error('second_period_sched'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Adviser</label><label class="text-danger">*</label>
                                        <select class="form-select" aria-label="Default select example" id="slct_second_period" name="second_period_adviser">
                                            <option disabled selected>Select Adviser</option>
                                            @if($student['adviser'] == 'MIT')
                                                @foreach ($adviser as $advisers)
                                                    <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                        {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($adviser as $advisers)
                                                <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                    {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
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
                                            @if($student['third_period_sub'] == 'MIT 503 Statistics for IT Research')
                                                @foreach ($thirdPeriod as $subjects)
                                                    <option value="{{$subjects->subject}}{{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($thirdPeriod as $subjects)
                                                    <option value="{{$subjects->subject}}{{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="third_period_sched" value="{{$student['third_period_sched']}}"/>
                                        <span class="text-danger">@error('third_period_sched'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col mt-4">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Adviser</label><label class="text-danger">*</label>
                                        <select class="form-select" aria-label="Default select example" id="slct_third_period" name="third_period_adviser">
                                            <option disabled selected>Select Adviser</option>
                                            @if($student['adviser'] == 'MIT')
                                                @foreach ($adviser as $advisers)
                                                    <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                        {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                                @endforeach
                                            @else
                                                @foreach ($adviser as $advisers)
                                                <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                    {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('third_period_adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Approve</button>
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