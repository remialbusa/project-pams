@extends('student.student-main-layout')
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100">
                    <thead>
                        <tr>
                            <th>Thesis Title</th>
                            <th>Members</th>
                            <th>Panelists and Advisers</th>
                            <th>Date / Time and Venue/Google Meet Link</th>
                        </tr>
                    </thead>               
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>                                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection