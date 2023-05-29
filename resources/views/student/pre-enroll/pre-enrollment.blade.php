@extends('student.layout.student-main-layout')
@section('title', 'Fill up Pre-enrollment')

@section('content')
<div>
    <div class="container-fluid">
        @if ($school_year == null)
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <section class="details">
                <div class="container mt-5">
                    <div class="container h-100">
                        <div class="px-4 mt-5 mb-5">
                            <div class="alert alert-danger">
                                <div class="mt-3 mb-3 text-center">
                                    <h5 class="mr-3"><i class="bi bi-x-circle">
                                        Pre-enrollment is not activated by the admin.
                                    </i></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
        @else
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pre Enrollment</h1>
            
        </div>
        <p>(Note: Fill-up/Update your pre-enrollment form for new semester).</p>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            @php
                $schoolyears_enrolled = App\Models\SchoolYear::where('status', 'active')->with('schoolEnrollees')->whereDoesntHave('schoolEnrollees', function($query) use($LoggedUserInfo){
                    $query->where('student_id', $LoggedUserInfo->id);
                })->get(); 
            @endphp
            @if($schoolyears_enrolled)
            <select class="form-control"  id="preEnrollmentSemesterSelect" onchange="changeSemForEnroll()">
                @foreach($schoolyears_enrolled as $school_year_option)
                    <option {{ $school_year->id ==  $school_year_option->id ? 'selected' : ''  }} value="{{$school_year_option->id}}" >S.Y. {{ ucfirst($school_year_option->school_year) . ' - '. ucfirst($school_year_option->semester) }}</option>
                @endforeach
            </select>
            @endif
            </div>
            <section class="details">
                <div class="container mt-5">
                    <div class="container h-100">
                        <div class="px-4 mt-5 mb-5">
                            <h4>Pre Enrollment Form</h4>
                            <hr class="border-divider">
                            {{-- <p></p>
                            <hr class="border-divider"> --}}
                            
                            <form action="{{ route('student.save.pre-enroll') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-floating mb-3">
                                        <input type="hidden" class="form-controlno-border" name="id" placeholder="ID" value="{{$LoggedUserInfo['id']}}">
                                        <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                        <label for="floatingInput"></label>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="form-outline form-line">
                                            <label class="form-label" for="form6Example1">Student Type</label>
                                            <select class="form-select no-border" aria-label="Default select example" name="student_type">   
                                                <option selected value="Continuing">Continuing</option>
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
                                                <label class="form-label " for="form6Example3">Vaccination Status <label class="text-danger">*</label></label>
                                                <select class="form-select no-border" aria-label="Default select example" name="vaccination_status">
                                                    @if($LoggedUserInfo->vaccination_status == 'Fully Vaccinated')
                                                        <option selected value="Fully Vaccinated">Fully Vaccinated</option>
                                                        <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                        <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                    @elseif($LoggedUserInfo->vaccination_status == 'Partially Vaccinated')
                                                        <option selected value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                                                        <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                        <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                                    @elseif($LoggedUserInfo->vaccination_status == 'Vaccinated w/ 1 Booster')
                                                        <option selected value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                                                        <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                                    @elseif($LoggedUserInfo->vaccination_status == 'Vaccinated w/ 2 Boosters')
                                                        <option selected value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                                        <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                                    @else
                                                        <option selected value="Not Vaccinated">Not Vaccinated</option>
                                                        <option value="Fully Vaccinated">Fully Vaccinated</option>
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
                                                <label class="form-label" for="form6Example5">Sex</label>
                                                <select class="form-select no-border" aria-label="Default select example" name="gender">>
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
                                        <label class="mt-3 lead">Address</label>
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
                                    <div class="row mt-4">
                                        <div class="col-md-12"> 
                                            <div class="form-group form-line">
                                                <label class="mt-3 lead" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                                <p>
                                                    <i>(Kindly upload the soft copy of your entrance payment receipt, credentials, registration, consent, and promissory note in one PDF file.)</i>
                                                    <br><i>(File format name (ex. Lastname-Firstname-MI-Requirements))</i>
                                                </p>
                                                <input type="file" placeholder="Choose file" class="form-control" name="file">
                                                <span class="text-danger">@error('file'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-divider">
                                    <!-- column grid layout with text inputs for course/s -->
                                    <h5 class="mt-5 lead">Programs & Subjects</h5>
                                    <div class="col mt-4 mb-3">
                                        <div class="col">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example2">Select Your Program</label>
                                                <select class="form-select" aria-label="Default select example" id="sel_program" name="program">
                                                    <option disabled selected>-- Select Program --</option>
                                                    @foreach ($programData['data'] as $program)
                                                        <option value="{{$program->id}}">{{$program->program}} - {{$program->description}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4 mb-3">
                                        <div class="col-md-6 mt-2">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">1ST PERIOD</label>
                                                <select id='first_period' name='first_period' class="form-select">
                                                    <option disabled selected>-- Select Subject --</option>
                                                </select>
                                                <span class="text-danger">@error('first_period'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example2">2ND PERIOD</label>
                                                <select class="form-select" aria-label="Default select example" id="second_period" name="second_period">
                                                    <option disabled selected>-- Select Subject --</option>
                                                </select>
                                                <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col mt-3 mt-2">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example2">3RD PERIOD</label>
                                                <select class="form-select" aria-label="Default select example" id="third_period" name="third_period">
                                                    <option disabled selected>-- Select Subject --</option>
                                                </select>
                                                <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-divider">
                                <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endif    
@endsection