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
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png"/>
    
    <title>Student Information</title>
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
                        <a class="nav-link" href="/staff/admin/manage-enrollees">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="details">
        <div class="manage-users-body container mt-5">
            <div class="container h-100">
                <div class=" px-4 mt-5 mb-5">
                    <h4>Encode Student Data</h4>
                    <hr />
                    <form action="{{ route('encode-student-data') }}" method="POST" enctype="multipart/form-data">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$students['id']}}">
                            <span class="text-danger">@error('id'){{$message}} @enderror</span>
                            <label for="floatingInput"></label>
                        </div>
                        <h5 class="mt-4 mb-2 lead">Programs & Subjects</h5>
                        <div class="col mt-4 mb-3">
                            <div class="col">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Program</label>
                                    <select readonly class="form-select" aria-label="Default select example" name="program" id="slct_program">
                                        <option value="{{$students->program}}">{{$students->getProgramID->program}} - {{$students->getProgramID->description}}</option>
                                    </select>
                                    <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3"></div>
                        <div class="row mt-2 mb-3">
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">1st PERIOD</label>
                                    <select class="form-select" aria-label="Default select example" name="first_period_sub" id="slct_first_period">
                                        <option value="{{$students->first_period_sub}}">{{$students->getFirstPeriodID->code}} - {{$students->getFirstPeriodID->subject}}</option>
                                    </select>
                                    <span class="text-danger">@error('first_period_sub'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                    <input type="text" id="form6Example2" class="form-control" name="first_period_sched" value="{{$students['first_period_sched']}}" />
                                    <span class="text-danger">@error('first_period_sched'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">Instructor</label><label class="text-danger">*</label>
                                    <select class="form-select" aria-label="Default select example" name="first_period_adviser">
                                        <option disabled selected>Select Instructor</option>
                                        @if($students['adviser'] == 'MIT')
                                            @foreach ($adviser as $advisers)
                                                <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                    {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                            @endforeach
                                        @else
                                            @foreach ($adviser as $advisers)
                                            <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('first_period_adviser'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div class="row mt-2 mb-3">
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">2nd PERIOD</label>
                                    <select class="form-select" aria-label="Default select example" name="second_period_sub">
                                        <option value="{{$students->second_period_sub}}">{{$students->getSecondPeriodID->code}} - {{$students->getSecondPeriodID->subject}}</option>
                                    </select>
                                    <span class="text-danger">@error('second_period'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                    <input type="text" id="form6Example2" class="form-control" name="second_period_sched" value="{{$students['second_period_sched']}}" />
                                    <span class="text-danger">@error('second_period_sched'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">Instructor</label><label class="text-danger">*</label>
                                    <select class="form-select" aria-label="Default select example" name="second_period_adviser">
                                        <option disabled selected>Select Instructor</option>
                                        @if($students['adviser'] == 'MIT')
                                            @foreach ($adviser as $advisers)
                                                <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                    {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                            @endforeach
                                        @else
                                            @foreach ($adviser as $advisers)
                                            <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('second_period_adviser'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <div class="row mt-2 mb-3">
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">3rd Period</label>
                                    <select class="form-select" aria-label="Default select example" name="third_period_sub">
                                        <option value="{{$students->third_period_sub}}">{{$students->getThirdPeriodID->code}} - {{$students->getThirdPeriodID->subject}}</option>
                                    </select>
                                    <span class="text-danger">@error('third_period'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example2">Schedule<label class="text-danger">*</label></label>
                                    <input type="text" id="form6Example2" class="form-control" name="third_period_sched" value="{{$students['third_period_sched']}}"/>
                                    <span class="text-danger">@error('third_period_sched'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-outline form-line">
                                    <label class="form-label" for="form6Example1">Instructor</label><label class="text-danger">*</label>
                                    <select class="form-select" aria-label="Default select example" id="slct_third_period" name="third_period_adviser">
                                        <option disabled selected>Select Instructor</option>
                                        @if($students['adviser'] == 'MIT')
                                            @foreach ($adviser as $advisers)
                                                <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                    {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                            @endforeach
                                        @else
                                            @foreach ($adviser as $advisers)
                                            <option value=" {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}">
                                                {{$advisers->title}} {{$advisers->first_name}} {{$advisers->middle_name}} {{$advisers->last_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger">@error('third_period_adviser'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mt-5 mb-3 btn-long">Approve</button>
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