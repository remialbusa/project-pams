@extends('student.student-main-layout')
@section('title', 'Comprehensive Exam')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Comprehensive Exam Form</h1>
    </div>
    <p>(Note: Please fill-up this form if you are ready to take the comprehensive exam).</p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <section class="details">
                    <div class="container mt-5">
                        <div class="container h-100">
                            <div class="px-4 mt-5 mb-5">
                                <h4>Comprehensive Exam Form</h4>
                                <hr class="border-divider">
                                {{-- <p></p>
                                <hr class="border-divider"> --}}
                                
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
                                                    <label class="form-label " for="form6Example3">Vaccination Status <label class="text-danger">*</label></label>
                                                    <select class="form-select no-border" aria-label="Default select example" name="vaccination_status">
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
                                        <!-- SEX AND BIRTHDATE -->
                                        <div class="row mt-2 mb-3">
                                            <div class="col-md-6">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example6">Sex </label> <label class="text-danger">*</label>
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
                                                    <label class="form-label" for="form6Example6">Birthdate </label> <label class="text-danger">*</label>
                                                    <input type="date" id="form6Example6" class="form-control no-border" name="birth_date" value="{{$LoggedUserInfo->birth_date}}"/>
                                                    <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CONTACTS -->
                                        <div class="row mt-2 mb-5">
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
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="form-group form-line">
                                                    <label class="form-label" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                                    <p>
                                                        <i>(Kindly upload the soft copy of your entrance payment receipt, credentials, registration, consent, and promissory note in one PDF file.)</i>
                                                    </p>
                                                    <input type="file" placeholder="Choose file" class="form-control" name="file">
                                                    <span class="text-danger">@error('file'){{$message}} @enderror</span>
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
    </div>
    
</div>
@endsection