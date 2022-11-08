@extends('student.student-main-layout')
@section('title', 'Monitor Enrollment')

@section('content')

<div>
    <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Monitor Enrollment</h1>
        
    </div>
    <p>The Monitoring of your enrollment status and list of enrolled subjects is shown below for the S.Y. 2022-2023.</p>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <section class="details">
            <div class=" container mt-5 mb-5">
                <div class="container h-100">
                    <div class=" mt-5 px-4">
                        <div class="row-sm-6">
                            <div class="col-sm-9">
                                <h3>Enrollment Profile</h3>
                                <div class="alert alert-light">
                                    <div class="row">                               
                                        <div class="col-md-5">
                                            <p class="profile-text">Student type: {{$LoggedUserInfo->student_type}}<span style="font-weight: 600;"> </span> </p>
                                            <p class="profile-text">Name: {{$LoggedUserInfo->first_name}} {{$LoggedUserInfo->middle_name}}. {{$LoggedUserInfo->last_name}}<span style="font-weight: 600;"> </span> </p>
                                        </div>
                                        <div class="col-md-5" style="">
                                            <p class="profile-text">Student number: {{$LoggedUserInfo->student_id}}<span style="font-weight: 600; text-transform: uppercase;"> </span> </p>
                                            <p class="profile-text">Program: {{$LoggedUserInfo->program}}<span style="font-weight: 600;"></span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <ul class="nav nav-tabs nav-fill mt-4 mb-2" id="myTab" role="tablist">                      
                            <li class="nav-item" role="presentation">
                                <a class="nav-link link-dark active" id="enrolled-subjects-tab" data-bs-toggle="tab" href="#enrolled-subjects" role="tab" aria-controls="enrolled-subjects" aria-selected="true">Enrolled Subjects</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link link-dark" id="enrollment-process-tab" data-bs-toggle="tab" href="#enrollment-process" role="tab" aria-controls="enrollment-process" aria-selected="false">Enrollment Status</a>
                            </li>
                        </ul>

                        
                        <div class="manage-user-body container px-4">
                            <div class="tab-content mb-5" id="myTabContent">
                                {{-- Enrolled Subjects Tab --}}
                            <div class="tab-pane active" id="enrolled-subjects" role="tabpanel" aria-labelledby="enrolled-subjects-tab">
                                    <div class="tab-pane fade active show" id="enrolled-subjects" role="tabpanel" aria-labelledby="enrolled-subjects-tab" style="max-width: 100%;">
                                        <div class="table-wrapper row">
                                            <hr/>
                                            <h4 class="title mb-2" style="width: 100%;">Enrolled Subjects</h4>
                                            <hr class="default-divider ml-auto mt-1 mb-2">
                                            <hr class="default-divider ml-auto mt-1 mb-2">
                                            <p class="form-header">List of enrolled subjects: </p>
                                            <hr/>
                                            <table class="table default-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 50%; text-align: left;">Subject Name</th>
                                                        <th scope="col" style="width: 20%; text-align: center;">Period</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p class="sub-text" style="text-align: left;">{{$LoggedUserInfo->first_period_sub}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: center;">{{$LoggedUserInfo->first_period_sched}}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="sub-text" style="text-align: left;">{{$LoggedUserInfo->second_period_sub}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: center;">{{$LoggedUserInfo->second_period_sched}}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="sub-text" style="text-align: left;">{{$LoggedUserInfo->third_period_sub}}</p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: center;">{{$LoggedUserInfo->third_period_sched}}</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr class="default-divider ml-auto mt-1 mb-2">
                                            <a class="small" href="#">Download Copy Of Rating</a>
                                        </div>
                                    </div>
                                </div>

                                {{-- Enrollment Process/Status Tab --}}
                                <div class="tab-pane fade" id="enrollment-process" role="tabpanel" aria-labelledby="enrollment-process-tab">
                                    @if($LoggedUserInfo->student_type == 'Continuing')
                                    <div class="table-wrapper row">
                                        <table class="table default-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 60%">Enrollment Procedure</th>
                                                    <th scope="col" style="width: 40%; text-align: center;">Current Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>               
                                                <tr>
                                                    <td>
                                                        <p class="sub-text">1. SUBMISSION OF CLEARANCE TO OGS:</i></p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                                <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text">2. SIGNING OF DRF AND PRINTING ENROLLMENT AND ASSESSMENT FORM:</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                                <i class="bx bx-check-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text">3. SUBMISSION COPY OF DRF TO OGS:</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                                <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                    </td>
                                                </tr>                                                                                                                                                                                  
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="table-wrapper row">
                                        <table class="table default-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 60%">Enrollment Procedure</th>
                                                    <th scope="col" style="width: 40%; text-align: center;">Current Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>               
                                                <tr>
                                                    <td>
                                                        <p class="sub-text">1. FILLED OUT FORM FOR ADMISSION:</i></p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                                <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text">2. SIGNING OF DRF AND PRINTING ENROLLMENT AND ASSESSMENT FORM::</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                                <i class="bx bx-check-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text ml-4">3. SUBMISSION OF ORIGINAL ENTRANCE DOCUMENTS TO REGISTRAR"S OFFICE:</p>
                                                    </td>
                                                    <td>
                                                        <p class="status-text"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                                <i class="bx bx-x-circle" style="margin-left: 150px;"></i> N/A</span></p>
                                                    </td>
                                                </tr>                                                                                                                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection