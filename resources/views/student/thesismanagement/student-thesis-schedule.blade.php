@extends('student.layout.student-main-layout')
@section('title', 'Thesis Schedule')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thesis Management</h1>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thesis Schedule</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <h2>


                        @if ($LoggedUserInfo->defense_id !== null)
                        <h5>Thesis Title: {{$LoggedUserInfo->getDefenseID->title}}</h5>

                        <h5 class="mt-5">Members:<br/>{{$LoggedUserInfo->getDefenseID->member_1}}
                        <br/>{{$LoggedUserInfo->getDefenseID->member_2}}
                        <br/>{{$LoggedUserInfo->getDefenseID->member_3}}</h5>
                        
                        <h5 class="mt-5">Panelists:<br/> {{$LoggedUserInfo->getDefenseID->panelist_1}}
                        <br/>{{$LoggedUserInfo->getDefenseID->panelist_2}}
                        <br/>{{$LoggedUserInfo->getDefenseID->panelist_3}}</h5>

                        <h5 class="mt-5">Adviser: {{$LoggedUserInfo->getDefenseID->adviser}}</h5>

                        <h5 class="mt-5">Date: {{$LoggedUserInfo->getDefenseID->date}}</h5>
                        <h5 class="mt-5">Time: {{$LoggedUserInfo->getDefenseID->time}}</h5>
                        <h5 class="mt-5">Venue: {{$LoggedUserInfo->getDefenseID->venue}}</h5>
                        <h5 class="mt-5">Google Meet Link: <a href="{{$LoggedUserInfo->getDefenseID->link}}" target="_blank">{{$LoggedUserInfo->getDefenseID->link}}</a></h5>
                        @else
                        <div class="alert alert-warning text-center">There's no defense schedule at the moment!</div>
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection