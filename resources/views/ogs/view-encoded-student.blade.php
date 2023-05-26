<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png"/>
    <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png"/>
    <title>Student Information</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/manage-enrollees">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class="px-4 mt-5 mb-5">
                    <h4>Enrolled Student Information</h4>
                    <hr />
                    <div class="profile mt-5">
                        
                        <div class="form-floating mb-3 mt-5">
                            <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$students['id']}}">
                            <span class="text-danger">@error('id'){{$message}} @enderror</span>
                            <label for="floatingInput"></label>
                        </div>
                        <table class="table default-table" >
                            <tr>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">Student Type: </span>{{$students->student_type}}</td>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">Student ID: </span>{{$students->student_id}}</td>
                            </tr>

                            <tr>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">Name :</span> {{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">Vaccination Status: </span>{{$students->vaccination_status}}</td>
                            </tr>

                            <tr>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">Email: </span> {{$students->email}}</td>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">Sex: </span> {{$students->gender}}</td>
                            </tr>

                            <tr>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">Birthdate: </span>{{$students->birth_date}}</td>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">Contact No: </span>{{$students->mobile_no}}</td>
                            </tr>

                            <tr>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">FB Name: </span>{{$students->fb_acc_name}}</td>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">Program: </span>{{$students->getProgramID->program}} - {{$students->getProgramID->description}}</td>
                            </tr>

                            <tr>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">Region: </span>{{$students->region}}</td>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">Province: </span>{{$students->province}}</td>
                            </tr>

                            <tr>
                                <td scope="col" style="width: 40%; text-align: left;"><span style="font-weight: 600;">City: </span>{{$students->city}}</td>
                                <td scope="col" style="width: 60%"><span style="font-weight: 600;">Baranggay: </span>{{$students->baranggay}}</td>
                            </tr>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subjects</th>
                                        <th>Schedule</th>
                                        <th>Instructor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$students->getFirstPeriodID->code}} - {{$students->getFirstPeriodID->subject}}</td>
                                        <td>{{$students->first_period_sched}}</td>
                                        <td>{{$students->first_period_adviser}}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{$students->getSecondPeriodID->code}} - {{$students->getSecondPeriodID->subject}}</td>
                                        <td>{{$students->second_period_sched}}</td>
                                        <td>{{$students->second_period_adviser}}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{$students->getThirdPeriodID->code}} - {{$students->getThirdPeriodID->subject}}</td>
                                        <td>{{$students->third_period_sched}}</td>
                                        <td>{{$students->third_period_adviser}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <div class="px-4 mt-5 mb-5"></div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
   
</body>

</html>