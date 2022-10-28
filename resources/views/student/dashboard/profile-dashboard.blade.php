@extends('student.student-main-layout')
@section('title', 'Student Profile')

@section('content')


<div>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Student Profile: {{$LoggedUserInfo->first_name}} {{$LoggedUserInfo->last_name}}</h1>
            
        </div>
        <p>The details of your profile is shown below for the S.Y. 2022-2023.</p>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <section class="details">
                <div class="container mt-5">
                    <div class="container h-100">
                        <div class="px-4 mt-5 mb-5">
                            <h4>Student Information</h4>
                            <hr />
                            <form action="{{ route('update-student') }}" method="POST">
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
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="profile mt-5">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="col mt-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Student Type</label>
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
                                    <div class="row mt-4 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                                <input readonly type="text" id="form6Example1" class="form-control" name="student_id" value="{{$LoggedUserInfo->student_id}}"/>
                                                <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example2" class="form-control" name="last_name" value="{{$LoggedUserInfo->last_name}}"/>
                                                <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control" name="first_name" value="{{$LoggedUserInfo->first_name}}"/>
                                                <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Middle name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example2" class="form-control" name="middle_name" value="{{$LoggedUserInfo->middle_name}}"/>
                                                <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example3">Vaccination Status <label class="text-danger">*</label></label>
                                                <select class="form-select" aria-label="Default select example" name="vaccination_status">
                                                    @if($LoggedUserInfo->vaccination_status == 'Vaccinated')
                                                        <option selected value="Vaccinated">Vaccinated</option>
                                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                                    @elseif($LoggedUserInfo->vaccination_status == 'Partially Vaccinated')
                                                        <option value="Vaccinated">Vaccinated</option>
                                                        <option selected value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                                    @else
                                                        <option value="Vaccinated">Vaccinated</option>
                                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option selected value="Not Vaccinated">Not Vaccinated</option>
                                                    @endif
                                                </select>
                                                <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example4">Email <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example4" class="form-control" name="email" value="{{$LoggedUserInfo->email}}"/>
                                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example5">Gender</label>
                                                <select class="form-select" aria-label="Default select example" name="gender">>
                                                    @if($LoggedUserInfo->gender == 'Male')
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
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example6">Birthdate</label>
                                                <input type="date" id="form6Example6" class="form-control" name="birth_date" value="{{$LoggedUserInfo->birth_date}}"/>
                                                <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example7">Mobile Number <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example7" class="form-control" name="mobile_no" value="{{$LoggedUserInfo->mobile_no}}"/>
                                                <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example8">Facebook Account Name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example8" class="form-control" name="fb_acc_name" value="{{$LoggedUserInfo->fb_acc_name}}"/>
                                                <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <!-- column grid layout with text inputs for course/s -->
                                    <h5 class="mt-5 lead">COURSE/S</h5>
                                    <div class="col mt-4 mb-3">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example9">Select Your Program</label>
                                                <select class="form-select" aria-label="Default select example" id="slct_program" name="program" onchange="populate(this.id, 'slct_first_period')">
                                                    @if($LoggedUserInfo->program == 'MIT')
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
                                                    @else
                                                        <option value="MIT">MIT - Master of Information Technology</option>
                                                        <option value="MSIT">MSIT - Master of Science in Information Technology</option>
                                                    @endif
                                                </select>
                                                <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-3">
                                        <div class="col-md-6 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example10">1ST SUBJECT</label>
                                                <select class="form-select" aria-label="Default select example" id="slct_first_period" name="first_period" onchange="populateTwo(this.id, 'slct_second_period')">
                                                    @if($LoggedUserInfo->first_period == 'MIT 501 Advanced Programming I')
                                                        <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                                        <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                                        <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                                        <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                                        <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                                        <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                                    @else
                                                        <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                                        <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                                        <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                                        <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                                        <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                                        <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                                    @endif
                                                </select>
                                                <span class="text-danger">@error('first_period'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example11">2ND SUBJECT</label>
                                                <select class="form-select" aria-label="Default select example" id="slct_second_period" name="second_period" onchange="populateThree(this.id, 'slct_third_period')">
                                                    @if($LoggedUserInfo->second_period == 'MIT 502 Methods of Research for IT')
                                                        <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                                        <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                                        <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                                        <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                                    @else
                                                        <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                                        <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                                        <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                                        <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                                    @endif
                                                </select>
                                                <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col mt-3 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example12" >3RD SUBJECT</label>
                                                <select class="form-select" aria-label="Default select example" id="slct_third_period" name="third_period">
                                                    @if($LoggedUserInfo->third_period == 'MIT 503 Statistics for IT Research')
                                                        <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                                        <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                                    @else
                                                        <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                                        <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                                    @endif
                                                </select>
                                                <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <button type="edit" class="btn btn-success btn-block mt-4 mb-5">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



@endsection
