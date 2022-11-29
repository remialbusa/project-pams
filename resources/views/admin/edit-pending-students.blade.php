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
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>

    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
    <title>Student Status</title>
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
                        <a class="nav-link" href="/staff/admin/pending">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class="px-4 mt-5 mb-5">
                    <h4>Student Status</h4>
                    <hr />
                    <form action="{{route('admin.edit-pending')}}" method="POST" enctype="multipart/form-data">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="profile mt-5">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$student['id']}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            <h5 class="lead">Edit Pending Student Status</h5>
                            <div class="row">
                                <div class="col mt-4">
                                    <div class="form-outline ">
                                        <label class="form-label" for="form6Example2">Submitted Form</label>
                                        <select class="form-select form-line" aria-label="Default select example" name="submitted_form">
                                            @if($status['submitted_form'] == 'Pending')
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            @else
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                        <div class="mt-3"><a href="{{ route('admin.view-pdf', $student->id)}}" class="edit mx-2 bi bi-eye" target="_blank">View Requirements</a></div>
                                        <span class="text-danger">@error('submitted_form'){{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col mt-4">
                                    <div class="form-outline ">
                                        <label class="form-label " for="form6Example2">Payment</label>
                                        <select class="form-select form-line" aria-label="Default select example" name="payment">
                                            @if($status['payment'] == 'Pending')
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            @else
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                        
                                        <span class="text-danger">@error('payment'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                
                                <div class="col mt-4">
                                    <div class="form-outline ">
                                        <label class="form-label" for="form6Example2">Status Form</label>
                                        <select class="form-select form-line" aria-label="Default select example" name="status">
                                            @if($status['status'] == 'Pending')
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            @else
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('status'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div> 
                            <div class="row mt-2 mb-3">
                                <div class="col-md-5">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Student Type</label>
                                        <select class="no-border form-select" aria-label="Default select example" name="student_type">
                                            @if($status['student_type'] == 'New Student')
                                            <option value="New Student">New Student</option>
                                            <option value="Continuing">Continuing</option>
                                            @else
                                            <option value="Continuing">Continuing</option>
                                            <option value="New Student">New Student</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="student_id" value="{{$status['student_id']}}" />
                                        <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="px-4 mt-5 mb-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>