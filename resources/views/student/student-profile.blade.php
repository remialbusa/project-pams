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
    

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- custom css -->
    <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
    
    <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">
 

</head>


<body>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
    
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
                <!-- Sidebar -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center">
                
                    <div class="sidebar-brand-text mx-3">MENU</div>
                </a>
    
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
    
                <!-- Nav Item - Student Profile -->
                <li class="nav-item mt-3">
                    <a class="nav-link" href="/student/student-profile">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Student Profile</span></a>
                </li>
    
                <!-- Divider -->
                <hr class="sidebar-divider">
    
                <!-- Nav Item - Monitor Enrollment -->
                <li class="nav-item">
                    <a class="nav-link" href="/student/monitor-enrollment">
                        <i class="bi bi-eye-fill"></i>
                        <span>Monitor Enrollment</span>
                    </a>              
                </li>
                <hr class="sidebar-divider">
                <!-- Nav Item - Thesis -->
                <li class="nav-item">
                    <a class="nav-link" href="/student/student-thesis">
                        <i class="bi bi-book-fill"></i>
                        <span>Thesis</span>
                    </a>  
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
                    <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
                        <div class="container">
                            <a class="navbar-brand" href="{{route('auth.logout-student')}}"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                                <ul class="navbar-nav ms-auto font-weight-semibold">
                                    <li class="nav-item px-2">
                                        <a class="nav-link-1">Welcome, <b>{{$LoggedUserInfo->first_name}}</b></a>
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
                    @yield('profile')

                </div>
                <!-- End of Main Content -->
    
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

    <script src="{{asset('js/script-2.js')}}"></script>
    
</body>
</html>
