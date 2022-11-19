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
    <title>Edit Subjects</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" style="height:40px; width: 40px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" style="height:50px; width: 50px" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/subjects">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid ps-md-0 mt-4">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-4 mx-auto">
                        <h3 class="login-heading mb-4">Edit Subject</h3>
                        <!-- login Form -->
                        <form action="{{route('update-subject')}}" method="POST">
                            @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$subject['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select form-select-lg" aria-label="Default select example" name="program">
                                    @foreach ($programs as $programs)
                                        <option value="{{$programs->program}}"
                                            {{$subject->program == $programs->program ? 'selected': ''}}>
                                            {{$programs->program}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                <label for="floatingInput">Program</label>
                             </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="code" placeholder="Code" value="{{$subject['code']}}">
                                <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                <label for="floatingInput">Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{$subject['subject']}}">
                                <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                                <label for="floatingInput">Subject</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select form-select-lg" aria-label="Default select example" name="units">
                                    @if($subject['unit'] == '1')
                                        <option value="1">1</option>
                                    @elseif(($subject['unit'] == '2'))
                                        <option value="2">2</option>
                                    @else
                                        <option value="3">3</option>
                                    @endif
                                    
                                </select>
                                <span class="text-danger">@error('units'){{$message}} @enderror</span>
                                <label for="floatingInput">Units</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select class="form-select form-select-lg" aria-label="Default select example" name="period">
                                    @if($subject['period'] == '1st Period')
                                    <option value="1st Period">1st Period</option>
                                    @elseif(($subject['period'] == '2nd Period'))
                                    <option value="2nd Period">2nd Period</option>
                                    @else
                                    <option value="3rd Period">3rd Period</option>
                                    @endif
                                </select>
                                <span class="text-danger">@error('units'){{$message}} @enderror</span>
                                <label for="floatingInput">Period</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-warning btn-login fw-bold mb-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>