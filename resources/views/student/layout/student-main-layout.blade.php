<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/')}}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- ph locations jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>

    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
    <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png" />

</head>


<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Sidebar -->
            <ul class="sticky-top navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" aria-expanded="false">

                <!-- Sidebar -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center">

                    <div class="sidebar-brand-text mx-3">Welcome Student!</div>

                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Student Profile -->
                <li class="nav-item">
                    <a class="nav-link" href="/student/auth/monitor-enrollment">
                        <i class="bi bi-eye-fill"></i>
                        <span>Monitor Enrollment</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Monitor Enrollment -->

                <li class="nav-item">
                    <a class="nav-link" href="/student/auth/pre-enroll">
                        <i class="bi bi-eye-fill"></i>
                        <span>Pre-enrollment</span>
                    </a>
                </li>

                <hr class="sidebar-divider">
                <!-- Nav Item - Thesis -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                        <i class="bi bi-book"></i>
                        <span>Thesis Management</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Thesis Management:</h6>
                            <a class="collapse-item" href="/student/auth/student-thesis/directory">Directory</a>
                            <a class="collapse-item" href="/student/auth/student-thesis/schedule">Schedule</a>
                        </div>
                    </div>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider">


                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>




            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">

                    <!-- Top Bar -->

                    <nav class="navbar navbar-expand sticky-top navbar-dark shadow-5-strong">

                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <div class="container">
                            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo" style="height:40px; width: 40px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
                            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo-grad" style="height:50px; width: 50px" src="/images/GradSchoolLogo.png" alt=""></a>

                            <ul class="topbar navbar-nav ml-auto">
                                <div class="topbar-divider d-none d-sm-block"></div>
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-3 d-none d-lg-inline small" style="color: white;">{{$LoggedUserInfo->first_name}} {{$LoggedUserInfo->middle_name}} {{$LoggedUserInfo->last_name}}</span>
                                        <i class="bi bi-caret-down-fill"></i>
                                    </a>

                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                        <a class="dropdown-item mb-2 mt-2" href="{{ route('student.profile')}}">
                                            <i class="bi bi-person-circle mr-2"></i>
                                            Profile
                                        </a>

                                        <a class="dropdown-item mb-2" href="{{ route('student.change-password', $LoggedUserInfo->id)}}">
                                            <i class="bi bi-gear mr-2"></i>
                                            Change Password
                                        </a>

                                        <hr>

                                        <a class="dropdown-item" href="{{route('auth.logout-student')}}">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>

                                    </div>
                                </li>
                            </ul>
                        </div>




                    </nav>

                    <div class="p-4 d-grid gap-3"></div>
                    <!-- End of Top Bar -->

                    <!-- Start of Main Content -->
                    @yield('content')

                </div>
                <!-- End of Main Content -->

                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Fourth Year Students 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
    </body>

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


    <script>
        // Get the file input elements
        const fileInput = document.getElementById('file');
        const vaccinationFileInput = document.getElementById('vaccination_file');

        // Get the label elements
        const fileLabel = document.getElementById('label-form');
        const vaccinationLabel = document.getElementById('vaccination_label');

        // Listen for file input change event
        fileInput.addEventListener('change', function() {
            // Check if a file is selected
            if (this.files && this.files[0]) {
                // Update the label text
                fileLabel.textContent = 'Required File Uploaded';
                // Add the icon after the label text
                fileLabel.innerHTML += '<span class="material-symbols-outlined">file_download_done</span>';
                // Change the background color of the input
                fileLabel.style.backgroundColor = '#d4d11c';
            }
        });

        // Listen for vaccination file input change event
        vaccinationFileInput.addEventListener('change', function() {
            // Check if a file is selected
            if (this.files && this.files[0]) {
                // Update the label text
                vaccinationLabel.textContent = 'Vaccination File Uploaded';
                // Add the icon after the label text
                vaccinationLabel.innerHTML += '<span class="material-symbols-outlined">file_download_done</span>';
                // Change the background color of the input
                vaccinationLabel.style.backgroundColor = '#d4d11c';
            }
        });
    </script>

    <script type='text/javascript'>
        $(document).ready(function() {

            $('#sel_program').change(function() {
                // Department id
                var id = $(this).val();

                // Empty the dropdown
                $('#first_period').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '/student/auth/register-new-student/getFirstPeriod/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var code = response['data'][i].code;
                                var subject = response['data'][i].subject;
                                var status = response['data'][i].status;
                                var semester = response['data'][i].semester;
                                var option = "<option value='" + id + "'";

                                if (status === 'Dissolved' || status === 'Inactive') {
                                    option += " disabled";
                                }

                                if (semester == 'First') {
                                    option += "hidden";
                                }


                                option += ">" + code + "\n" + "-" + "\n" + subject + "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + status + "</option>";

                                $("#first_period").append(option);
                            }
                        }

                    }
                });

                $('#second_period').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '/student/auth/register-new-student/getSecondPeriod/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var code = response['data'][i].code;
                                var subject = response['data'][i].subject;
                                var status = response['data'][i].status;
                                var semester = response['data'][i].semester;

                                var option = "<option value='" + id + "'";

                                if (status === 'Dissolved' || status === 'Inactive') {
                                    option += " disabled";
                                }
                                if (semester == 'First') {
                                    option += "hidden";
                                }

                                option += ">" + code + "\n" + "-" + "\n" + subject + "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + status + "</option>";

                                $("#second_period").append(option);
                            }
                        }
                    }
                });

                $('#third_period').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '/student/auth/register-new-student/getThirdPeriod/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var code = response['data'][i].code;
                                var subject = response['data'][i].subject;
                                var status = response['data'][i].status;
                                var semester = response['data'][i].semester;

                                var option = "<option value='" + id + "'";

                                if (status === 'Dissolved' || status === 'Inactive') {
                                    option += " disabled";
                                }
                                if (semester == 'First') {
                                    option += "hidden";
                                }

                                option += ">" + code + "\n" + "-" + "\n" + subject + "-" + "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + status + "</option>";

                                $("#third_period").append(option);
                            }
                        }
                    }
                });s
            });


        });

        function changeSem() {
            $.post("/student/get-student-load", {
                    schoolyear_id: $("#semesterSelect").val(),
                    student_id: $("#studentId").val(),
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                function(data, status) {
                    console.log(data);
                    for (period of data) {
                        if (period.period == '1st Period') {
                            $("#subjectName1").show();
                            $("#subjectName1").html(period.subject.code + ' - ' + period.subject.subject);
                            $("#adviserName1").show();
                            $("#adviserName1").html(period.adviser);
                            $("#sched1").show();
                            $("#sched1").html(period.period);
                        }
                        if (period.period == '2nd Period') {
                            $("#subjectName2").show();
                            $("#subjectName2").html(period.subject.code + ' - ' + period.subject.subject);
                            $("#adviserName2").show();
                            $("#adviserName2").html(period.adviser);
                            $("#sched2").show();
                            $("#sched2").html(period.period);
                        }
                        if (period.period == '3rd Period') {
                            $("#subjectName3").show();
                            $("#subjectName3").html(period.subject.code + ' - ' + period.subject.subject);
                            $("#adviserName3").show();
                            $("#adviserName3").html(period.adviser);
                            $("#sched3").show();
                            $("#sched3").html(period.period);
                        }
                    };
                });
        }

        function changeSemForEnroll() {
            location.href = 'student/auth/pre-enroll?schoolyear_id=' + $("#preEnrollmentSemesterSelect").val();
        }
    </script>

</body>

</html>