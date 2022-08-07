<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- custom css -->
    <link href="./css/style.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="container h-100">
        <div class="basic-details m-5 ">
            <h5 class="px-5">You are currently enrolled with the following details:</h5>
            <br>
            <div class="d-flex px-5">
                <div class="p-2">Student Type: </div>
                <div class="p-2">Year Level: </div>
                <div class="p-2">Program: </div>
            </div>
            <p class="px-5">
                <i>(Note: To update your enrollment details, select the corresponding field from the drop-downs below and click 'Update'.)</i>
            </p>
            <form action="{{ route('auth.save') }}" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                @if(Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif

                @csrf
                <div class="row mt-4 px-5">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1"><b>Student Type</b></label>
                            <select class="form-select" aria-label="Default select example" name="student_type">
                                <option value="New Student">New Student</option>
                                <option selected value="Continuing">Continuing</option>
                            </select>
                            <span class="text-danger">@error('student_type'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2"><b>Program</b></label>
                            <select class="form-select" aria-label="Default select example" name="program">
                                <option selected>N/A</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BLIS">BLIS</option>
                                <option value="BSSW">BSSW</option>
                                <option value="BSBIO">BSBIO</option>
                            </select>
                            <span class="text-danger">@error('program'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="profile px-5">

                    <h4><b>Profile</b></h4>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Student ID Number</label>
                                <input type="text" id="form6Example1" class="form-control" name="student_id" />
                                <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">First name</label>
                                <input type="text" id="form6Example2" class="form-control" name="first_name" />
                                <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Middle name</label>
                                <input type="text" id="form6Example1" class="form-control" name="middle_name" />
                                <span class="text-danger">@error('middle_name'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Last name</label>
                                <input type="text" id="form6Example2" class="form-control" name="last_name" />
                                <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Birthday</label>
                                <input type="date" id="form6Example1" class="form-control" name="birth_date" />
                                <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Gender</label>
                                <select class="form-select" aria-label="Default select example" name="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Civil Status</label>
                                <select class="form-select" aria-label="Default select example" name="civil_status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Widow/Widower">Widow/Widower</option>
                                </select>
                                <span class="text-danger">@error('civil_status'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Nationality</label>
                                <input type="text" id="form6Example2" class="form-control" name="nationality" />
                                <span class="text-danger">@error('nationality'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Contact Number</label>
                                <input type="text" id="form6Example1" class="form-control" name="contact_no" />
                                <span class="text-danger">@error('contact_no'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Email Address</label>
                                <input type="text" id="form6Example2" class="form-control" name="email" />
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                        </div>

                    </div>

                    <div class="other-details mt-4">

                        <h4><b>Other details</b></h4>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Zip Code</label>
                                    <input type="text" id="form6Example1" class="form-control" name="zipcode" />
                                    <span class="text-danger">@error('zipcode'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">Home Address</label>
                                    <input type="text" id="form6Example2" class="form-control" name="home_address" />
                                    <span class="text-danger">@error('home_address'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Guardian</label>
                                    <input type="text" id="form6Example1" class="form-control" name="guardian" />
                                    <span class="text-danger">@error('guardian'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">Guardian Contact Number</label>
                                    <input type="text" id="form6Example2" class="form-control" name="guardian_contact_no" />
                                    <span class="text-danger">@error('guardian_contact_no'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Register</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>