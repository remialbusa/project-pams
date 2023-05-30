@extends('student.layout.student-main-layout')
@section('title', 'Monitor Enrollment')

@section('content')

<div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    
    <div class="container-fluid">

    @if ($school_year == null)
    <div class="card">
        <section class="details">
            <div class="container mt-5 mb-5">
                <div class="container h-100">
                    <div class="text-center alert alert-danger" role="alert">
                        Enrollment is not yet actived please send a techincal form if this is a problem.
                    </div>
                </div>
            </div>
        </section>
    </div>
    @else
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Monitor Enrollment</h1>
        
    </div>
    <p>The Monitoring of your enrollment status and list of enrolled subjects is shown below for the S.Y. {{$school_year->school_year}}  {{$school_year->semester}}.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">S.Y. {{$school_year->school_year}}</h6>

        </div>
        <section class="details">
            <div class="container mt-5 mb-5">
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
                                            <p class="profile-text">Program: {{$LoggedUserInfo->getProgramID->program}} - {{$LoggedUserInfo->getProgramID->description}}<span style="font-weight: 600;"></span> </p>
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

                                            <div>
                                                <label>Select Semester</label>
                                                @php
                                                    $schoolyears_enrolled = App\Models\SchoolYear::where('status', 'active')->whereHas('schoolEnrollees', function($q) use($LoggedUserInfo){
                                                        $q->where('student_id', $LoggedUserInfo->id);
                                                    })->get(); 
                                                @endphp
                                                @if($schoolyears_enrolled)
                                                <input type="hidden" id="studentTableId" value="{{$LoggedUserInfo->id}}">
                                                <select class="form-control" onchange="changeSem()" id="semesterSelect">
                                                    <option selected disabled> Select Semester</option>
                                                    @foreach($schoolyears_enrolled as $school_year)
                                                        <option value="{{$school_year->id}}">{{ ucfirst($school_year->school_year) . ' - '. ucfirst($school_year->semester) }} Semester</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                            </div>
                                            <table class="table default-table" >
                                                <thead>
                                                    <tr >
                                                        <th scope="col" style="width: 40%; text-align: left;">Subject Name</th>
                                                        <th scope="col" style="width: 30%; text-align: center;">Adviser</th>
                                                        <th scope="col" style="width: 30%; text-align: right;">Period</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr >
                                                        <td>
                                                            <p class="sub-text" style="text-align: left; display:none" id="subjectName1"></p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: center; display:none" id="adviserName1"></p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: right; display:none" id="sched1"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="sub-text" style="text-align: left; display:none" id="subjectName2"></p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: center; display:none" id="adviserName2"></p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: right; display:none" id="sched2"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="sub-text" style="text-align: left; display:none" id="subjectName3"></p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: center; display:none" id="adviserName3"></p>
                                                        </td>
                                                        <td>
                                                            <p class="status-text" style="text-align: right; display:none" id="sched3"></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr class="default-divider ml-auto mt-1 mb-2">
                                            {{-- <a class="small" href="#">Download Copy Of Rating</a> --}}
                                        </div>
                                    </div>
                                </div>

                                {{-- Enrollment Process/Status Tab --}}
                                <div class="tab-pane fade" id="enrollment-process" role="tabpanel" aria-labelledby="enrollment-process-tab">
                                    @if ($LoggedUserInfo['enrollment_status'] == 'Enrolled')
                                        
                                        @if ($LoggedUserInfo->file !== null)
                                        <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            <div>
                                              You are now officially Enrolled!
                                              <a href="{{ route('student.view-entrance-slip-pdf', $LoggedUserInfo->id)}}" target="_blank"><button class="ml-5 btn btn-md btn-success">Download Enrollment Slip</button></a>
                                            </div>
                                        </div>
                                        @else
                                        
                                        @endif
                                    
                                    @else
                                        
                                    @endif
                                    
                                    <div class="table-wrapper row">
                                        <table class="table default-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" sstyle="width: 50%; text-align: left;">Enrollment Procedure</th>
                                                    <th scope="col" style="width: 20%; text-align: center;">Current Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>               
                                                <tr>
                                                    <td>
                                                        <p class="sub-text mt-3" style="text-align: left;">1. Subject advisement by the Enrolling Teacher:</i></p>
                                                    </td>
                                                    <td>
                                                        @if($LoggedUserInfo['first_procedure'] == 'Done')
                                                        <p class="status-text" style="text-align: center;"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                            <i class="bi bi-check-circle"></i> 
                                                            <option value="Done">Done</option>
                                                        </span></p>
                                                        </p>
                                                        @else
                                                        <p class="status-text" style="text-align: center;"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bi bi-x-circle"></i> 
                                                            <option value="Pending">Pending</option>
                                                        </span></p>
                                                        </p>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text mt-3" style="text-align: left;">2. Subject Enlistment at the Management Information System Office:</i></p>
                                                    </td>
                                                    <td>
                                                        @if($LoggedUserInfo['second_procedure'] == 'Done')
                                                        <p class="status-text" style="text-align: center;"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                            <i class="bi bi-check-circle"></i> 
                                                            <option value="Done">Done</option>
                                                        </span></p>
                                                        </p>
                                                        @else
                                                        <p class="status-text" style="text-align: center;"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bi bi-x-circle"></i> 
                                                            <option value="Pending">Pending</option>
                                                        </span></p>
                                                        </p>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="sub-text mt-3" style="text-align: left;">3. Validation and issuance of the Entrance Slip:</i></p>
                                                    </td>
                                                    <td>
                                                        @if($LoggedUserInfo['third_procedure'] == 'Done')
                                                        <p class="status-text" style="text-align: center;"><span style="font-weight: 600; font-size: 12px; color: #13a166">
                                                            <i class="bi bi-check-circle"></i> 
                                                            <option value="Done">Done</option>
                                                        </span></p>
                                                        </p>
                                                        @else
                                                        <p class="status-text" style="text-align: center;"><span style="font-weight: 600; font-size: 12px; color: #c70e42">
                                                            <i class="bi bi-x-circle"></i> 
                                                            <option value="Pending">Pending</option>
                                                        </span></p>
                                                        </p>
                                                        @endif
                                                    </td>
                                                </tr>                                                                                                                                                                                  
                                            </tbody>
                                        </table>
                                    </div>

                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
        
    </div>
</div>

@endsection