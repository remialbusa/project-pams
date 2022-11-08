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
                                    <input type="hidden" class="form-control" name="id" placeholder="ID">
                                    <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                    <label for="floatingInput"></label>
                                </div>
                                <div class="profile mt-5">
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
                                                <input type="text" id="form6Example2" class="form-control" name="middle_name"/>
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
                                                
                                                        <option selected value="Vaccinated">Vaccinated</option>
                                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                                        <option value="Not Vaccinated">Not Vaccinated</option>

                                                </select>
                                                <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example4">Email <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example4" class="form-control" name="email" />
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

                                                        <option selected value="Male">Male</option>
                                                        <option value="Female">Female</option>

                                                </select>
                                                <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example6">Birthdate</label>
                                                <input type="date" id="form6Example6" class="form-control" name="birth_date" >
                                                <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mt-2 mb-3">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example7">Mobile Number <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example7" class="form-control" name="mobile_no" >
                                                <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example8">Facebook Account Name <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example8" class="form-control" name="fb_acc_name" >
                                                <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    <div class="row mt-2 mb-3">
                                        <label class="form-label">Address</label>
                                        <p>
                                            <i>(Please follow the format Region/Province/City/Barangay.)</i>
                                        </p>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Region <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control" name="region" r>
                                                <span class="text-danger">@error('region'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Province <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control" name="province" 
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">City <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control" name="city" />
                                                <span class="text-danger">@error('city'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Baranggay <label class="text-danger">*</label></label>
                                                <input type="text" id="form6Example1" class="form-control" name="baranggay" />
                                                <span class="text-danger">@error('baranggay'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                                <p>
                                                    <i>(Kindly upload the soft copy of your entrance payment receipt, credentials, registration, consent, and promissory note in one PDF file.)</i>
                                                    <br><i>(File format name (ex. Lastname-Firstname-MI-Requirements))</i>
                                                </p>
                                                <input type="file" placeholder="Choose file" class="form-control" name="file">
                                                <span class="text-danger">@error('file'){{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr/>
                                    <!-- column grid layout with text inputs for course/s -->
                                    <h5 class="mt-5 lead">COURSE/S</h5>
                                        <div class="col mt-4 mb-3">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Select Your Program</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_program" name="program" {{-- onchange="populate(this.id, 'slct_first_period')" --}}>
                                                        
                                                        <option>1</option>
                                                    </select>
                                                    <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4 mb-3">
                                            <div class="col-md-6 mt-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">1ST PERIOD</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_first_period" name="first_period" {{-- onchange="populateTwo(this.id, 'slct_second_period')" --}}>
                                                        
                                                        <option>1</option>
                                                    </select>
                                                    <span class="text-danger">@error('first_period'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">2ND PERIOD</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_second_period" name="second_period" {{-- onchange="populateThree(this.id, 'slct_third_period')" --}}>
                                                        
                                                        <option>1</option>
                                                    </select>
                                                    <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col mt-3 mt-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">3RD PERIOD</label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_third_period" name="third_period">
                                                        
                                                        <option>1</option>
                                                    </select>
                                                    <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                                </div>
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

<!-- /.container-fluid -->