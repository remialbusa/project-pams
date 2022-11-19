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
    <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
                        <a class="nav-link" href="/staff/admin/comprehensive-exam">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="details">
        <div class="manage-users-body container mt-5" style="width: 70%">
            <div class="container">
                <div class=" px-4 mt-5 mb-5">
                    <!-- login Form -->
                    <div class="profile mt-5">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mt-4 mb-3">
                            <div class="col-md-6">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                    <input type="text" id="form6Example1" class="form-control no-border" name="student_id" value="{{$cexam->student_id}}"/>
                                    <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Program <label class="text-danger">*</label></label>
                                    <select class="form-select" aria-label="Default select example" id="slct_program" name="program" {{-- onchange="populate(this.id, 'slct_first_period')" --}}>
                                        @foreach ($programs as $programs)
                                        <option value="{{$programs->program}}"
                                            {{$cexam->program  == $programs->program ? 'selected': ''}}>
                                            {{$programs->program}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-3">
                            <div class="col-md-6">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Full Name <label class="text-danger">*</label></label>
                                    <input type="text" id="form6Example2" class="form-control no-border" name="name" value="{{$cexam->name}}"/>
                                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Exam Status <label class="text-danger">*</label></label>
                                    <select class="form-select" aria-label="Default select example" name="exam_status">
                                        @if($cexam->exam_status == 'Read')
                                            <option selected value="Ready">Ready</option>
                                        @else
                                            <option value="Not Ready">Not Ready</option>
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('exam_status'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="mt-5">
                            <h4><label class="form-label ml-3" for="form6Example2">File <label class="text-danger">*</label></label></h4>
                            <div class="text-center img-thumbnail">
                                <iframe height="800" width="800" src="/assets/{{$cexam->file}}"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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