<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Welcome, <b>{{$LoggedUserInfo->name}}</b></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Student Profile</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.enrollment-status')}}">Monitor Enrollment</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>

    <section class="enrollment-details ">
        <div class="main-div mt-4">
            <div class="basic-details">

                <h5>You are currently enrolled</h5>
                <div class="d-flex flex-row justify-content-around">
                    <p>Student Type:</p>
                    <p>Year Level: </p>
                    <p>program: </p>
                </div>
                <p>
                    <i>(Note: To update your enrollment details, select the corresponding field from the drop-downs below and click 'Update'.)</i>
                </p>
                <form>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-4 ">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1"><b>Student Type</b></label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1">New Student</option>
                                    <option value="2">Continuing</option>
                                </select>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2"><b>Program</b></label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>N/A</option>
                                    <option value="1">BSIT</option>
                                    <option value="2">BLIS</option>
                                    <option value="2">BSSW</option>
                                    <option value="2">BSBIO</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </form>
            </div> 
                   
            <div class="profile">
            <form>
                <h4><b>Profile</b></h4>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Student ID Number</label>
                                <input type="text" id="form6Example1" class="form-control" />

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">First name</label>
                                <input type="text" id="form6Example2" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Middle name</label>
                                <input type="text" id="form6Example1" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Last name</label>
                                <input type="text" id="form6Example2" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Birthday</label>
                                <input type="date" id="form6Example1" class="form-control" />

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Gender</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>N/A</option>
                                    <option value="1">BSIT</option>
                                    <option value="2">BLIS</option>
                                    <option value="2">BSSW</option>
                                    <option value="2">BSBIO</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Civil Status</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>N/A</option>
                                    <option value="1">BSIT</option>
                                    <option value="2">BLIS</option>
                                    <option value="2">BSSW</option>
                                    <option value="2">BSBIO</option>
                                </select>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Nationality</label>
                                <input type="text" id="form6Example2" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Contact Number</label>
                                <input type="text" id="form6Example1" class="form-control" />

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Email Address</label>
                                <input type="email" id="form6Example2" class="form-control" />

                            </div>
                        </div>      
                </form>
            </div>       
            
            <div class="other-details mt-4">
                <form>
                <h4><b>Other details</b></h4>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Zip Code</label>
                                <input type="text" id="form6Example1" class="form-control" />

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Home Address</label>
                                <input type="text" id="form6Example2" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Guardian</label>
                                <input type="text" id="form6Example1" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Guardian Contact Number</label>
                                <input type="text" id="form6Example2" class="form-control" />

                            </div>
                        </div>
                    </div>
                     <!-- Submit button -->
                     <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Update</button>
                </form>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>