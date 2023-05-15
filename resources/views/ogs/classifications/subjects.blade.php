@extends('ogs.main-layout.ogs-main-layout')
@section('title', 'Subjects')

@section('content')

<div>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Subjects</h1>
            <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalForm">New Subject</a>
            <a href="{{ route('admin.export-subjects') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">Export Data</a>
        </div>
        <p>The list of subjects shown in the table below are the available subjects for the S.Y. 2022-2023.</p>
        @if(Session::get('success'))

        <div class="alert alert-success text-center">{{Session::get('success')}}</div>

        @endif

        @if(Session::get('fail'))
        <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of subjects</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Program</th>
                                <th>Subject</th>
                                <th>Units</th>
                                <th>Period</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>No. of Students Enrolled</th>
                                <th>Available Slots</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                            <tr>
                                <td>{{$subject->code}}</td>
                                <td>{{$subject->getProgramID->program}}</td>
                                <td>{{$subject->subject}}</td>
                                <td>{{$subject->unit}}</td>
                                <td>{{$subject->period}}</td>
                                <td>{{$subject->semester}}</td>
                                <td>{{$subject->status}}</td>
                                <td class="text-center">{{$subject->no_of_students}}</td>
                                <td class="text-center">{{$subject->available_slots}}</td>
                                <td class="text-center">

                                    <a href="{{ route('edit-subject', $subject->id) }}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ route('delete-subject', $subject->id) }}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4 my-4">
                    <!-- login Form -->
                    <form action="{{ route('auth.save-subject') }}" method="POST">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="code" placeholder="Code">
                            <span class="text-danger">@error('code'){{$message}} @enderror</span>
                            <label for="floatingInput">Code</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="program">
                                <option disabled selected>Select Program</option>
                                @foreach ($programs as $programs)
                                <option value="{{$programs->id}}">{{$programs->program}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                            <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                            <label for="floatingInput">Subject</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-lg" aria-label="Default select example" name="semester">
                                <option selected disabled>Semester</option>
                                @foreach ($semesters as $semesters)
                                <option value="{{$semesters->id}}">{{$semesters->semester}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('semester'){{$message}} @enderror</span>
                            <label for="floatingInput">Semester</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-lg" aria-label="Default select example" name="period">
                                <option selected disabled>Select Period</option>
                                <option value="1st Period">1st Period</option>
                                <option value="2nd Period">2nd Period</option>
                                <option value="3rd Period">3rd Period</option>
                            </select>
                            <span class="text-danger">@error('units'){{$message}} @enderror</span>
                            <label for="floatingInput">Period</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-lg" aria-label="Default select example" name="units">
                                <option selected disabled>Select number of units</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <span class="text-danger">@error('units'){{$message}} @enderror</span>
                            <label for="floatingInput">Units</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-lg" aria-label="Default select example" name="status">
                                <option selected disabled>Select status</option>
                                <option value="Active">Active</option>
                                <option value="Dissolved">Dissolved</option>
                            </select>
                            <span class="text-danger">@error('status'){{$message}} @enderror</span>
                            <label for="floatingInput">Status</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary shadow-sm btn-login fw-bold mb-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection