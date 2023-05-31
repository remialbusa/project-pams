@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Enrolled Students')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Export Student Data</h1>
        <div>
            <select class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Select semester</option>
                @foreach(App\Models\SchoolYear::all() as $schoolyear)
                <option value="{{$schoolyear->id}}">{{ $schoolyear->semester }}</option>
                @endforeach
            </select>
            <select class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Select School Year</option>
                @php
                $uniqueYears = [];
                @endphp

                @foreach(App\Models\SchoolYear::all() as $schoolyear)
                @if(!in_array($schoolyear->school_year, $uniqueYears))
                <option value="{{$schoolyear->school_year}}">{{ $schoolyear->school_year }}</option>
                @php
                $uniqueYears[] = $schoolyear->school_year;
                @endphp
                @endif
                @endforeach

            </select>
            <a id="exportEnrolledLink" href="{{ route('admin.export-enrolled-students') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">Export Data</a>
        </div>
    </div>
    <p class="mb-4">Export student data.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Enrolled Students</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-sm-4">Name</th>
                            <th class="col-sm-2">Student Type</th>
                            <th class="col-sm-1">Student ID</th>
                            <th class="col-sm-1">Program</th>
                            <th class="col-sm-1">First Period Instructor</th>
                            <th class="col-sm-1">Second Period Instructor</th>
                            <th class="col-sm-1">Third Period Instructor</th>
                            <!-- <th class="col-sm-1">First Period Subject</th>
                            <th class="col-sm-1">Second Period Subject</th>
                            <th class="col-sm-1">Third Period Subject</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrolledStudents as $students)
                        <tr>
                            <td>{{$students->first_name}} {{$students->middle_name}} {{$students->last_name}}</td>
                            <td>{{$students->student_type}}</td>
                            <td>{{$students->student_id}}</td>
                            <td>{{$students->getProgramID->program}}</td>
                            <td>{{$students->first_period_adviser}}</td>
                            <td>{{$students->second_period_adviser}}</td>
                            <td>{{$students->third_period_adviser}}</td>
                         <!--    <td>{{$students->first_period_sub}}</td>
                            <td>{{$students->second_period_sub}}</td>
                            <td>{{$students->third_period_sub}}</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection