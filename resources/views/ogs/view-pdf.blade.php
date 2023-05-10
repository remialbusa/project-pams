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
    <title>View Requirements</title>
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
                        <a class="nav-link" href="{{url()->previous()}}">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="font-size: 90%;" class="manage-user-body px-2">
        <div class="container-lg mt-5">
            <div class="card shadow mb-4">
                <h3 class="text-center mt-4">Student Requirement Files</h3>
                <div class="responsive">
                    <table class="table table-bordered table-striped display" id="" width="100%" cellspacing="0">
                        <thead class="text-center pl-10">
                            <tr>
                                <th>Name</th>
                                <th>Student Type</th>
                                <th>Admission Files</th>
                                <th>Vaccination File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-sm-1 text-center pt-4">{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td class="col-sm-1 text-center pt-4">{{ $student->student_type }}</td>
                                <td class="col-sm-1 text-center pt-4">
                                    @php
                                    $files = json_decode($student->file, true);
                                    @endphp
                                    @if (is_array($files))
                                    @foreach($files as $file)
                                    @if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']))
                                    <a href="{{ asset('assets/') . '/' .  $file }}"><img src="{{ asset('assets/' . $file) }}" style="width: 100px;"></a><br>
                                    @else
                                    <a href="{{ asset('assets/') . $file }}" target="">{{ $file }}</a><br>
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="col-sm-1 text-center pt-4">
                                    <a href="{{ asset('assets/') . $file }}" target="">{{ $file }}</a><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 tab-pane" id="approved-students" role="tabpanel" aria-labelledby="approved-students-tab">
        <div class="table-responsive">
            <table class="table table-bordered table-striped display" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-sm-1">Student Type</th>
                        <th class="col-sm-3">Name</th>
                        <th class="col-sm-1">Student Number</th>
                        <th class="col-sm-1">Program</th>
                        <th class="col-sm-2">Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="px-1">
                            <a href="{{ route('admin.edit-approved', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm"><i class="bi bi-check-circle"></i></a>
                            <a onclick="return confirm('Are you sure?')" href="{{ route('delete-approved', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
                            <a target="" href="{{ route('admin.view-pdf', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-file-earmark-arrow-down"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</body>