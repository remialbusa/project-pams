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
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>

    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png" />
    <title>Pre-registration</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" style="height:40px; width: 40px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" style="height:50px; width: 50px" src="/images/GradschoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/welcome">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/faqs">FAQ's</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/enrollment">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class=" px-4 mt-5 mb-5">
                    <h4>PRE-REGISTRATION</h4>
                    <hr />
                    @foreach ($school_year as $school_year)
                    @if ($school_year->status == 'Active')
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
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">Student Type</label><label class="text-danger">*</label></label>
                                    <select class="form-select" aria-label="Default select example" name="student_type">

                                        <option selected value="Continuing">Continuing</option>
                                    </select>
                                    <span class="text-danger">@error('student_type'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="student_id" value="{{old('student_id')}}" />
                                        <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Last name <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="last_name" value="{{old('last_name')}}" />
                                        <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">First name <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="first_name" value="{{old('first_name')}}" />
                                        <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Middle name </label><label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="middle_name" value="{{old('middle_name')}}" />
                                        <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Mobile Number <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="mobile_no" value="{{old('mobile_no')}}" />
                                        <span class="text-danger">@error('mobile_no'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Email <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example2" class="form-control" name="email" value="{{old('email')}}" />
                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-2 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Sex</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option disabled selected>N/A</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Birthdate</label>
                                        <input type="date" id="form6Example1" class="form-control" name="birth_date" value="{{old('birth_date')}}" />
                                        <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mt-4 mb-3">
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Vaccination Status <label class="text-danger">*</label></label>
                                        <select class="form-select" aria-label="Default select example" name="vaccination_status">
                                            <option disabled selected>N/A</option>
                                            <option value="Fully Vaccinated">Fully Vaccinated</option>
                                            <option value="Vaccinated w/ 1 Booster">Vaccinated w/ 1 Booster</option>
                                            <option value="Vaccinated w/ 2 Boosters">Vaccinated w/ 2 Boosters</option>
                                            <option value="Not Vaccinated">Not Vaccinated</option>
                                            <option value="Partially Vaccinated">Partially Vaccinated</option>
                                        </select>
                                        <span class="text-danger">@error('vaccination_status'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Upload Vaccination Card: <label class="text-danger">*</label></label>
                                        <input type="file" placeholder="Input Image" class="form-control" name="vaccination_file">
                                        <span class="text-danger">@error('vaccination_file'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col ">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Facebook Account Name <label class="text-danger">*</label></label>
                                        <p>
                                            <i>(Important: Input your REAL facebook account.)</i>
                                        </p>
                                        <input type="text" id="form6Example2" class="form-control" name="fb_acc_name" value="{{old('fb_acc_name')}}" />
                                        <span class="text-danger">@error('fb_acc_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 mb-3">
                                <label class="form-label">Address</label>
                                <p>
                                    <i>(Please follow the format Region/Province/City/Barangay.)</i>
                                </p>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Region <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="region" value="{{old('region')}}" />
                                        <span class="text-danger">@error('region'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Province <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="province" value="{{old('province')}}" />
                                        <span class="text-danger">@error('province'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">City <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="city" value="{{old('city')}}" />
                                        <span class="text-danger">@error('city'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Baranggay <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="baranggay" value="{{old('baranggay')}}" />
                                        <span class="text-danger">@error('baranggay'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group form-line">
                                        <label class="form-label" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                        <p>
                                            <i>(Kindly upload the soft copy of your entrance payment receipt, credentials, registration, consent, and promissory note in one PDF file.)</i>
                                            <br><i>(File format name (ex. Lastname-Firstname-MI-Requirements))</i>
                                        </p>
                                        <input multiple type="file" placeholder="Choose file" class="form-control" name="file[]" multiple>
                                        <span class="text-danger">@error('file'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-5 lead">Programs & Subjects</h5>
                            <div class="col mt-4 mb-3">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">Select Your Program</label><label class="text-danger">*</label></label>
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

                            <div class="row mt-2 mb-3">
                                <div class="col mt-2">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">1ST PERIOD</label>
                                        <select id='first_period' name='first_period' class="form-select">
                                            <option disabled selected>-- Select Subject --</option>
                                        </select>
                                        <span class="text-danger">@error('first_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div></div>
                                <div class="col mt-2">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example2">2ND PERIOD</label>
                                        <select class="form-select" aria-label="Default select example" id="second_period" name="second_period">
                                            <option disabled selected>-- Select Subject --</option>
                                        </select>
                                        <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div></div>
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
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Register</button>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <span style="font-weight: bold;">Enrollment is not yet Actived. If you think this is wrong please message us in Technical support</span>
                    </div>
                    @endif
                    @endforeach
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
                <p class="text-light text-center">© Copyright <b>Leyte Normal university</b> . All Rights Reserved 2022</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('#sel_program').change(function() {
                // Department id
                var id = $(this).val();


                // Empty the dropdown
                $('#first_period').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '/student/auth/register-new-student/getFirstPeriod/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var code = response['data'][i].code;
                                var subject = response['data'][i].subject;
                                var status = response['data'][i].status;

                                var option = "<option value='" + id + "'";

                                if (status === 'Dissolved' || status === 'Inactive') {
                                    option += " disabled";
                                }

                                option += ">" + code + "\n" + "-" + "\n" + subject + "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + status + "</option>";

                                $("#first_period").append(option);
                            }
                        }
                    }
                });
                $('#second_period').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '/student/auth/register-new-student/getSecondPeriod/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var code = response['data'][i].code;
                                var subject = response['data'][i].subject;
                                var status = response['data'][i].status;

                                var option = "<option value='" + id + "'";

                                if (status === 'Dissolved' || status === 'Inactive') {
                                    option += " disabled";
                                }

                                option += ">" + code + "\n" + "-" + "\n" + subject + "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + status + "</option>";

                                $("#second_period").append(option);
                            }
                        }
                    }
                });

                $('#third_period').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '/student/auth/register-new-student/getThirdPeriod/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var code = response['data'][i].code;
                                var subject = response['data'][i].subject;
                                var status = response['data'][i].status;

                                var option = "<option value='" + id + "'";

                                if (status === 'Dissolved' || status === 'Inactive') {
                                    option += " disabled";
                                }

                                option += ">" + code + "\n" + "-" + "\n" + subject + "-" + "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + status + "</option>";

                                $("#third_period").append(option);
                            }
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>