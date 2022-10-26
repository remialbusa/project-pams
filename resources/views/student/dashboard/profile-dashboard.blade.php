@extends('student.student-profile')
@section('title', 'Student Profile')

@section('profile')

<div>
    <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Student Profile: {{$LoggedUserInfo->first_name}} {{$LoggedUserInfo->last_name}}</h1>
        
    </div>
    <p>The Monitoring of your enrollment status and list of enrolled subjects is shown below for the S.Y. 2022-2023.</p>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">     
                    <div class="px-4 mt-5 mb-5">
                        <h4>PRE-REGISTRATION</h4>
                        <hr />
                        <form action="{{ route('auth.save') }}" method="POST" enctype="multipart/form-data">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            @if(Session::get('success'))
                            <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                            @endif
    
                            @if(Session::get('fail'))
                            <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                            @endif
    
                            @csrf
                            <div class="profile mt-5">
                                <h5 class="lead">Student Information</h5>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="col mt-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Student Type</label>
                                        <select class="form-select" aria-label="Default select example" name="student_type">
                                            <option selected value="New Student">New Student</option>
                                        </select>
                                        <span class="text-danger">@error('student_type'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-3">
                                    <input type="hidden" type="text" id="form6Example1" class="form-control" name="student_id" value="N/A"/>
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
                                            <label class="form-label" for="form6Example2">Vaccination Status <label class="text-danger">*</label></label>
                                            <select class="form-select" aria-label="Default select example" name="vaccination_status">
                                                <option disabled selected>N/A</option>
                                                <option value="Vaccinated">Vaccinated</option>
                                                <option value="Not Vaccinated">Not Vaccinated</option>
                                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                            </select>
                                            <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Email <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="form-control" name="email" />
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
                                                <option disabled selected>N/A</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Birthdate</label>
                                            <input type="date" id="form6Example1" class="form-control" name="birth_date" />
                                            <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Mobile Number <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example1" class="form-control" name="mobile_no" />
                                            <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example2">Facebook Account Name <label class="text-danger">*</label></label>
                                            <input type="text" id="form6Example2" class="form-control" name="fb_acc_name" />
                                            <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
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
                                            <select class="form-select" aria-label="Default select example" id="region" name="region">
    
                                            </select>
                                            <span class="text-danger">@error('region'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <select class="form-select" aria-label="Default select example" id="province" name="province">
    
                                            </select>
                                            <span class="text-danger">@error('province'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <select class="form-select" aria-label="Default select example" id="city" name="city">
    
                                            </select>
                                            <span class="text-danger">@error('city'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <select class="form-select" aria-label="Default select example" id="barangay" name="barangay">
    
                                            </select>
                                            <span class="text-danger">@error('barangay'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                            <p>
                                                <i>(Kindly upload the soft copy of your entrance credentials, registration, consent, and promissory note in one PDF file.)</i>
                                            </p>
                                            <input type="file" placeholder="Choose file" class="form-control" name="file">
                                            <span class="text-danger">@error('file'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
    
                                <h5 class="mt-5 lead">COURSE/S</h5>
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
    
                                <div class="row mt-4 mb-3">
    
                                    <select hidden class="form-select" aria-label="Default select example" name="first_period">
                                        <option selected value="null">Select First Period Subject</option>
                                        <option value="MIT 501 Advanced Programming I">MIT 501 - Advanced Programming I</option>
                                        <option value="MIT 505 Advanced Data Structure and Algorithm">MIT 505 - Advanced Data Structure & Algorithm</option>
                                        <option value="MIT 506 Advanced Multimedia Communication">MIT 506 - Advanced Multimedia Communication</option>
                                        <option value="MSIT 501 Advanced Programming I">MSIT 501 Advanced Programming I</option>
                                        <option value="MSIT 505 Advanced Data Structure & Algorithm">MSIT 505 Advanced Data Structure & Algorithm</option>
                                        <option value="MSIT 506 Advanced Multimedia Communication">MSIT 506 Advanced Multimedia Communication</option>
                                        <option value="FD 501 BASIC RESEARCH">FD 501 BASIC RESEARCH</option>
                                        <option value="LIT 501 Literary Theory and Cristism">LIT 501 Literary Theory and Cristism</option>
                                        <option value="LIT 507 Sociolinguistics">LIT 507 Sociolinguistics</option>
                                        <option value="LT 511 Evaluation Procedures in Language and Literature Teaching">LT 511 Evaluation Procedures in Language and Literature Teaching</option>
                                        <option value="SW 509 Theory and Practice of Community Organization">SW 509 Theory and Practice of Community Organization</option>
                                    </select>
    
                                    <select hidden class="form-select" aria-label="Default select example" name="second_period">
                                        <option selected value="null">Select Second Period Subject</option>
                                        <option value="MIT 502 Methods of Research for IT">MIT 502 - Methods of Research for IT</option>
                                        <option value="MIT 507 System Analysis and Design">MIT 507 - System Analysis and Design</option>
                                        <option value="MSIT 502 Methods of Research for IT">MSIT 502 Methods of Research for IT</option>
                                        <option value="MSIT 507 System Analysis and Design">MSIT 507 System Analysis and Design</option>
                                        <option value="FD 502 Basic Statistics">FD 502 Basic Statistics</option>
                                        <option value="LT 509 Language Teaching Methodology">LT 509 Language Teaching Methodology</option>
                                        <option value="FD 501 Basic Research">FD 501 Basic Research</option>
                                        <option value="SW 515 Field Instruction">SW 515 Field Instruction</option>
    
                                    </select>
    
                                    <select hidden class="form-select" aria-label="Default select example" name="third_period">
                                        <option selected value="null">Select Third Period Subject</option>
                                        <option value="MIT 503 Statistics for IT Research">MIT 503 - Statistics for IT Research</option>
                                        <option value="MSIT 503 Statistics for IT Research">MSIT 503 - Statistics for IT Research</option>
                                        <option value="TW 001 Statistics for IT Research">TW 001 - Thesis Writing I</option>
                                        <option value="TW 002 Statistics for IT Research">TW 002 - Thesis Writing II Research</option>
                                        <option value="LT 513 Foundations of Language Education (Issues and Trends in ESL)">LT 513 Foundations of Language Education (Issues and Trends in ESL)</option>
                                        <option value="LIT 504 Strategies and Methods in Teaching Literature (Petitioned Subject)">LIT 504 Strategies and Methods in Teaching Literature (Petitioned Subject)</option>
                                        <option value="FD 502 Basic Statistics">FD 502 Basic Statistics</option>
                                        <option value="SW 516 Thesis Writing">SW 516 Thesis Writing</option>
                                    </select>
    
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Update</button>
                        </form>
                    </div>       
                </table>
            </div>
        </div>
    </div>       
</div>



@endsection
