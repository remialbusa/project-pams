@extends('student.student-main-layout')
@section('title', 'Dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 mb-4">Dashboard</h1>
    
</div>
<hr />
<div class="row mb-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mb-4">Navigation</h1>
        
    </div>

    <div class="col-xl-10 col-md-6 mb-4">
        <a href="/student/auth/student-profile">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-info text-uppercase mb-1">
                                Profile</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-lines-fill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-10 col-md-6 mb-4">
        <a href="/student/auth/payment">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-info text-uppercase mb-1">
                                Payment</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-wallet2 fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-10 col-md-6 mb-4">
        <a href="/student/auth/monitor-enrollment">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-info text-uppercase mb-1">
                                Monitor Enrollment</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-eye-fill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-xl-10 col-md-6 mb-4">
        <a href="/student/auth/student-thesis/directory">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-info text-uppercase mb-1">
                                Thesis Directory</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-folder-fill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-10 col-md-6 mb-4">
        <a href="/student/auth/student-thesis/schedule">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-info text-uppercase mb-1">
                                Thesis Schedule</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bookmark-fill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>


</div>
</div>
<!-- /.container-fluid -->

@endsection