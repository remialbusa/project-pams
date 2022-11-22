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
    <title>Student Defense Scheduling</title>
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
                        <a class="nav-link" href="/staff/admin/thesis-scheduling">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class=" px-4 mt-5 mb-5">
                    <h4>SET STUDENT DEFENSE SCHEDULE</h4>
                    <hr />
                    <form action="{{ route('set-schedule') }}" method="POST" enctype="multipart/form-data">
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


                            <div class="row mt-5 mb-5">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Title <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="title"/>
                                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-2 mb-5">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Member <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="member_1"/>
                                        <span class="text-danger">@error('member_1'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Member <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="member_2"/>
                                        <span class="text-danger">@error('member_2'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Member <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="member_3"/>
                                        <span class="text-danger">@error('member_3'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 mb-5">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Panelist <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="panelist_1"/>
                                        <span class="text-danger">@error('panelist_1'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Panelist <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="panelist_2"/>
                                        <span class="text-danger">@error('panelist_2'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Panelist <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="panelist_3"/>
                                        <span class="text-danger">@error('panelist_3'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 mb-5">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Adviser <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="adviser"/>
                                        <span class="text-danger">@error('adviser'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Date <label class="text-danger">*</label></label>
                                        <input type="date" id="form6Example1" class="form-control" name="date"/>
                                        <span class="text-danger">@error('date'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Time <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="time"/>
                                        <span class="text-danger">@error('time'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Venue <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="venue"/>
                                        <span class="text-danger">@error('venue'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <div class="form-outline form-line">
                                        <label class="form-label" for="form6Example1">Google Meet Link <label class="text-danger">*</label></label>
                                        <input type="text" id="form6Example1" class="form-control" name="link" />
                                        <span class="text-danger">@error('link'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Set Schedule</button>
                            </div>
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