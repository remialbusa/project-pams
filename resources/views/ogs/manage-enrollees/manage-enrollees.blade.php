@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Manage Enrollees')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Manage Enrollees</h1>
        
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manage Enrollees</h6>
        </div>
        <section class="details">
            <div class=" mt-5 px-3">
                <ul class="nav nav-tabs nav-fill mt-4 mb-2" id="myTab" role="tablist">                      
                    <li class="nav-item" role="presentation">
                        <a class="nav-link link-dark active" id="pending-students-tab" data-bs-toggle="tab" href="#pending-students" role="tab" aria-controls="pending-students" aria-selected="true">Pending Students</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link link-dark" id="encoding-students-tab" data-bs-toggle="tab" href="#encoding-students" role="tab" aria-controls="encoding-students" aria-selected="false">Encoding Students</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link link-dark" id="approved-students-tab" data-bs-toggle="tab" href="#approved-students" role="tab" aria-controls="approved-students" aria-selected="false">Approved Students</a>
                    </li>
                </ul>

                <div style="font-size: 90%;" class="manage-user-body px-2">
                    <div class="tab-content mb-5" id="myTabContent">

                        {{-- Pending Students Tab --}}
                        <div class="tab-pane active" id="pending-students" role="tabpanel" aria-labelledby="pending-students-tab">
                            <div class="mt-5 tab-pane fade active show" id="pending-students" role="tabpanel" aria-labelledby="pending-students-tab" style="max-width: 100%;">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped display" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">Student Type</th>
                                                <th class="col-sm-3">Name</th>
                                                <th class="col-sm-1">Student Number</th>
                                                <th class="col-sm-1">Program</th>
                                                <th class="col-sm-2">Contact Number</th>
                                                <th class="col-sm-2">Date</th>
                                                <th class="col-sm-2">Action</th>
                                            </tr>
                                        </thead>               
                                        <tbody>
                                        @foreach ($pendingStudents as $student)
                                            <tr>
                                                <td>{{$student->student_type}}</td>
                                                <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                                                <td>{{$student->student_id}}</td>                     
                                                <td>{{$student->getProgramID->program}}</td>
                                                <td>{{$student->mobile_no}}</td>
                                                <td>{{$student->created_at}}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.approving-pending-students', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm"><i class="bi bi-check-circle"></i></a>
                                                    <a onclick="return confirm('Are you sure?')" href="{{ route('student-delete', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Approved Students Tab --}}
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
                                    @foreach ($approvedStudents as $student)
                                        <tr>
                                            <td>{{$student->student_type}}</td>
                                            <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                                            <td>{{$student->student_id}}</td>                     
                                            <td>{{$student->getProgramID->program}}</td>
                                            <td>{{$student->mobile_no}}</td>
                                            <td class="px-1">
                                                <a href="{{ route('admin.edit-approved', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-success shadow-sm"><i class="bi bi-check-circle"></i></a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('delete-approved', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-danger shadow-sm"><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Encoding Students Tab --}}
                        <div class="mt-5 tab-pane fade" id="encoding-students" role="tabpanel" aria-labelledby="encoding-students-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped display"width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1">Student Type</th>
                                            <th class="col-sm-3">Name</th>
                                            <th class="col-sm-2">Student Number</th>
                                            <th class="col-sm-1">Vaccination File</th>
                                            <th class="col-sm-2">Requirement Files</th>
                                            <th class="col-sm-3">Action</th>
                                        </tr>
                                    </thead>               
                                    <tbody>
                                    @foreach ($approvedStudents as $student)
                                        <tr>
                                            <td>{{$student->student_type}}</td>
                                            <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                                            <td>{{$student->student_id}}</td>                     
                                            @php
                                            $vaccination_file = $student->vaccination_file; // Assign the vaccination file path or name to the variable
                                            @endphp
                                            <td class="col-sm-1 text-center"> <a href="{{ asset('assets/' . $vaccination_file) }}" target="_blank" rel="noopener noreferrer">{{ $vaccination_file }}</a></td>
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
                                            <td class="px-1">
                                                <a href="{{route('admin.encoding-students', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{route('view-encode-student-data', $student->id)}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-eye"></i></a>                        
                                            </td>
                                        </tr>
                                    @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection