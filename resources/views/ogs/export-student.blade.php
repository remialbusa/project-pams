@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Export Student Data</h1>

    </div>

    <div class="row">
        <div class="col">
            <select class=" btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Student</option>
                @foreach(App\Models\EnrolledStudent::all() as $student)
                <option value="{{$student->id}}">{{ $student->first_name . '  ' . ucfirst($student->last_name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col ml-4">
            <select class="btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Semester</option>
                @foreach(App\Models\SchoolYear::all() as $student)
                <option value="{{$student->id}}">{{ $student->semester}}</option>
                @endforeach
            </select>
        </div>
        <div class="col ml-4">
            <select class="btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Instructor</option>
                @foreach(App\Models\EnrolledStudent::all() as $student)
                <option value="{{$student->id}}">{{ $student->first_period_adviser }}</option>
                @endforeach
            </select>
        </div>
        <div class="col ml-4">
            <select class="btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Instructor</option>
                @foreach(App\Models\EnrolledStudent::all() as $student)
                <option value="{{$student->id}}">{{ $student->first_period_adviser }}</option>
                @endforeach
            </select>
        </div>
        <div class="col ml-4">
            <select class="btn btn-md btn-primary shadow-sm mr-3" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>Instructor</option>
                @foreach(App\Models\EnrolledStudent::all() as $student)
                <option value="{{$student->id}}">{{ $student->first_period_adviser }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="col ">
            <select class="btn btn-md btn-primary" id="exportSchoolyear" onchange="changeExport()">
                <option disabled selected>School Year</option>
                @foreach(App\Models\SchoolYear::all() as $schoolyear)
                <option value="{{$schoolyear->id}}">{{ $schoolyear->school_year}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-5">
        <div class="mt-5 d-flex align-items-center justify-content-center">
            <a id="exportEnrolledLink" href="{{ route('admin.export-student-data') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">Export Data</a>
        </div>
        </div>
    </div>

</div>


@endsection