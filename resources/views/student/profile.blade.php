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
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link">Welcome, <b>{{$LoggedUserInfo->first_name}}</b></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="">Student Profile</a>
                    </li>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('auth.logout-student')}}">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>

    <section class="details">
        <div class="manage-users-body container mt-5 mb-5">
            <div class="container h-100">
                <div class="basic-details mt-5 px-4">
                    <div class="row-sm-6">
                        <div class="col-sm-9">
                            <h3>Enrollment Profile</h3>
                            <div class="alert alert-light">
                                <div class="row">                               
                                    <div class="col-md-5">
                                        <p class="profile-text">Student type: {{$LoggedUserInfo->student_type}}<span style="font-weight: 600;"> </span> </p>
                                        <p class="profile-text">Name: {{$LoggedUserInfo->first_name}} {{$LoggedUserInfo->middle_name}}. {{$LoggedUserInfo->last_name}}<span style="font-weight: 600;"> </span> </p>
                                    </div>
                                    <div class="col-md-5" style="">
                                        <p class="profile-text">Student number: {{$LoggedUserInfo->student_id}}<span style="font-weight: 600; text-transform: uppercase;"> </span> </p>
                                        <p class="profile-text">Program: {{$LoggedUserInfo->program}}<span style="font-weight: 600;"></span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <ul class="nav nav-tabs nav-fill mt-4 mb-2" id="myTab" role="tablist">                      
                        <li class="nav-item" role="presentation">
                            <a class="nav-link link-dark active" id="enrolled-subjects-tab" data-bs-toggle="tab" href="#enrolled-subjects" role="tab" aria-controls="enrolled-subjects" aria-selected="true">Enrolled Subjects</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link link-dark" id="enrollment-process-tab" data-bs-toggle="tab" href="#enrollment-process" role="tab" aria-controls="enrollment-process" aria-selected="false">Enrollment Status</a>
                        </li>
                    </ul>
                    <div class="manage-user-body container px-4">
                        <div class="tab-content mb-5" id="myTabContent">
                        <div class="tab-pane active" id="enrolled-subjects" role="tabpanel" aria-labelledby="enrolled-subjects-tab">
                                <div class="tab-pane fade active show" id="enrolled-subjects" role="tabpanel" aria-labelledby="enrolled-subjects-tab" style="max-width: 100%;">
                                    <div class="table-wrapper row">
                                        <h4 class="title mb-2" style="width: 100%;">Enrolled Subjects</h4>
                                        <hr class="default-divider ml-auto mt-1 mb-2">
                                        <hr class="default-divider ml-auto mt-1 mb-2">
                                        <p class="form-header">List of enrolled subjects: </p>
                                        <table class="table default-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50%; text-align: left;">Subject Name</th>
                                                    <th scope="col" style="width: 20%; text-align: center;">Period</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text" style="text-align: left;">{{$LoggedUserInfo->first_period_sub}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text" style="text-align: center;">7:30 AM - 10:30 AM</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text" style="text-align: left;">{{$LoggedUserInfo->second_period_sub}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text" style="text-align: center;">11:00 AM - 2:00 PM</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text" style="text-align: left;">{{$LoggedUserInfo->third_period_sub}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text" style="text-align: center;">2:00 PM - 5:00 PM</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr class="default-divider ml-auto mt-1 mb-2">
                                        <a class="small" href="#">Download Copy Of Rating</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="enrollment-process" role="tabpanel" aria-labelledby="enrollment-process-tab">
                                @if($LoggedUserInfo->student_type == 'Continuing')
                                <div class="table-wrapper row">
                                    <table class="table default-table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 60%">Enrollment Procedure</th>
                                                <th scope="col" style="width: 40%; text-align: center;">Current Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>               
                                            <tr>
                                                <td>
                                                    <p class="sub-text">1. SUBMISSION OF CLEARANCE TO OGS:</i></p>
                                                </td>
                                                <td>
                                                    <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="sub-text">2. SIGNING OF DRF AND PRINTING ENROLLMENT AND ASSESSMENT FORM:</p>
                                                </td>
                                                <td>
                                                    <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                            <i class="bx bx-check-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="sub-text ml-4">3. SUBMISSION COPY OF DRF TO OGS:</p>
                                                </td>
                                                <td>
                                                    <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                </td>
                                            </tr>                                                                                                                                                                                  
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="table-wrapper row">
                                    <table class="table default-table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 60%">Enrollment Procedure</th>
                                                <th scope="col" style="width: 40%; text-align: center;">Current Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>               
                                            <tr>
                                                <td>
                                                    <p class="sub-text">1. FILLED OUT FORM FOR ADMISSION:</i></p>
                                                </td>
                                                <td>
                                                    <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="sub-text">2. SIGNING OF DRF AND PRINTING ENROLLMENT AND ASSESSMENT FORM::</p>
                                                </td>
                                                <td>
                                                    <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                            <i class="bx bx-check-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="sub-text ml-4">3. SUBMISSION OF ORIGINAL ENTRANCE DOCUMENTS TO REGISTRAR"S OFFICE:</p>
                                                </td>
                                                <td>
                                                    <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                </td>
                                            </tr>                                                                                                                                            
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>                          
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>