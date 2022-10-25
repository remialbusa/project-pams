@extends('admin.main-layout')
@section('title', 'Assign Subjects')

@section('content')

<div>
    <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Subjects</h1>
        <a class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalForm">New Subject</a>
    </div>
    <p>The list of subjects shown in the table below are the available subjects for the S.Y. 2022-2023.</p>
      
         
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
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                            <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                            <label for="floatingInput">Subject</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                            <span class="text-danger">@error('description'){{$message}} @enderror</span>
                            <label for="floatingInput">Description</label>
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
                            <input type="text" class="form-control" name="schedule" placeholder="Schedule">
                            <span class="text-danger">@error('schedule'){{$message}} @enderror</span>
                            <label for="floatingInput">Schedule</label>
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