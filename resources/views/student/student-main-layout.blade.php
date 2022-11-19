<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/')}}">
    
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

    <!-- ph locations jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    
    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
    <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

 

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
                <hr class="sidebar-divider my-0">

                <li class="nav-item mt-3">
                    <a class="nav-link" href="/student/auth/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                
                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link" href="/student/auth/student-profile">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Student Profile</span>
                    </a>              
                </li>
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
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne">
                        <i class="bi bi-pencil"></i>
                        <span>Pre-Enrollment</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Fill up:</h6>
                            <a class="collapse-item" href="/student/auth/pre-enroll">Pre-Enroll</a>
                            <a class="collapse-item" href="/student/auth/comprehensive-exam">Comprehensive Exam</a>
                        </div>
                    </div>    
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
                    <nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow-5-strong">
                        <div class="container">
                            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo" style="height:40px; width: 40px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
                            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo-grad" style="height:50px; width: 50px" src="/images/GradSchoolLogo.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                                <ul class="navbar-nav ms-auto font-weight-semibold">
                                    <li class="nav-item px-2">
                                        <a class="nav-link-1">Welcome, <b>{{$LoggedUserInfo->first_name}} {{$LoggedUserInfo->last_name}}</b></a>
                                    </li>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a class="nav-link-1" href="{{route('auth.logout-student')}}">Logout</a>
                                    </li>
                                </ul>
                            </div>
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
   
    
</body>
</html>
