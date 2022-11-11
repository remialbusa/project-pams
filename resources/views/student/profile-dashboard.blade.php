@extends('student.student-main-layout')
@section('title', 'Student Profile')

@section('content')


<div>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Student Profile</h1>
            
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
                            <hr class="border-divider">
                            
                            <form action="{{ route('update-student') }}" method="POST" enctype="multipart/form-data">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                @if(Session::get('success'))
                                <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                                @endif
        
                                @if(Session::get('fail'))
                                <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                                @endif
        
                                @csrf
                                <div class="profile mt-5">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="form-floating mb-3">
                                        <input type="hidden" class="form-controlno-border" name="id" placeholder="ID" value="{{$LoggedUserInfo['id']}}">
                                        <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="form-outline form-line">
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
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                                <input readonly type="text" id="form6Example1" class="form-control no-border" name="student_id" value="{{$LoggedUserInfo->student_id}}"/>
                                                <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example2" class="form-control no-border" name="last_name" value="{{$LoggedUserInfo->last_name}}"/>
                                                <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control no-border" name="first_name" value="{{$LoggedUserInfo->first_name}}"/>
                                                <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example2">Middle name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example2" class="form-control no-border" name="middle_name" value="{{$LoggedUserInfo->middle_name}}"/>
                                                <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline form-line">
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
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example4">Email <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example4" class="form-control no-border" name="email" value="{{$LoggedUserInfo->email}}"/>
                                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline form-line">
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
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example6">Birthdate</label>
                                                <input type="date" id="form6Example6" class="form-control no-border" name="birth_date" value="{{$LoggedUserInfo->birth_date}}"/>
                                                <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example7">Mobile Number <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example7" class="form-control no-border" name="mobile_no" value="{{$LoggedUserInfo->mobile_no}}"/>
                                                <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example8">Facebook Account Name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example8" class="form-control no-border" name="fb_acc_name" value="{{$LoggedUserInfo->fb_acc_name}}"/>
                                                <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr class="border-divider">

                                    <div class="row mt-2 mb-3">
                                        <label class="lead mt-3">Address</label>
                                        <p>
                                            <i>(Please follow the format Region/Province/City/Barangay.)</i>
                                        </p>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">Region <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control no-border" name="region" value="{{$LoggedUserInfo->region}}"/>
                                                <span class="text-danger">@error('region'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">Province <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control no-border" name="province" value="{{$LoggedUserInfo['province']}}"/>
                                                <span class="text-danger">@error('province'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">City <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control no-border" name="city" value="{{$LoggedUserInfo['city']}}"/>
                                                <span class="text-danger">@error('city'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">Baranggay <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control no-border" name="baranggay" value="{{$LoggedUserInfo['baranggay']}}"/>
                                                <span class="text-danger">@error('baranggay'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr class="border-divider">
                                    
                                    <!-- column grid layout with text inputs for course/s -->
                                    <div hidden>
                                    <h5 class="mt-5 lead">COURSE/S</h5>
                                        <div class="col mt-4 mb-3">
                                            <div class="col">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example2">Select Your Program</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_program" name="program" {{-- onchange="populate(this.id, 'slct_first_period')" --}}>
                                                        
                                                        @if($LoggedUserInfo['program'] == 'MIT')
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

                                        <div class="row mt-4 mb-3">
                                            <div class="col-md-6 mt-2">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example1">1ST PERIOD</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_first_period" name="first_period" {{-- onchange="populateTwo(this.id, 'slct_second_period')" --}}>
                                                        
                                                        @if($LoggedUserInfo['first_period_sub'] == '')
                                                            @foreach ($firstPeriod as $subjects)
                                                                <option value="{{$subjects->subject}} - {{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($firstPeriod as $subjects)
                                                                <option value="{{$subjects->subject}} - {{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="text-danger">@error('first_period'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example2">2ND PERIOD</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_second_period" name="second_period" {{-- onchange="populateThree(this.id, 'slct_third_period')" --}}>
                                                        
                                                        @if($LoggedUserInfo['second_period_sub'] == '')
                                                            @foreach ($secondPeriod as $subjects)
                                                                <option value="{{$subjects->subject}} - {{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($secondPeriod as $subjects)
                                                                <option value="{{$subjects->subject}} - {{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col mt-3 mt-2">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example2">3RD PERIOD</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_third_period" name="third_period">
                                                        
                                                        @if($LoggedUserInfo['third_period_sub'] == '')
                                                            @foreach ($thirdPeriod as $subjects)
                                                                <option value="{{$subjects->subject}} - {{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($thirdPeriod as $subjects)
                                                                <option value="{{$subjects->subject}} - {{$subjects->description}}">{{$subjects->subject}} - {{$subjects->description}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr class="border-divider">
                                <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<!-- /.container-fluid -->
@endsection
