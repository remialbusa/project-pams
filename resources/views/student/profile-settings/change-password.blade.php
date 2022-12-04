@extends('student.student-main-layout')
@section('title', 'Change Password')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Change Password</h1>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Change Password</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <section class="details">
                    <div class="container mt-5">
                        <div class="container h-100">
                            <div class="px-4 mt-5 mb-5">
                                {{-- <hr class="border-divider"> --}}
                                <form action="{{ route('student.save-change-password')}}" method="POST" enctype="multipart/form-data">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    @if(Session::get('success'))
                                    <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                                    @endif
            
                                    @if(Session::get('fail'))
                                    <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                                    @endif
                                    
                                    @csrf
                                    <div class="profile mt-5">
                                        <div class="form-floating mb-3">
                                            <input type="hidden" class="form-controlno-border" name="id" placeholder="ID" value="{{$LoggedUserInfo['id']}}">
                                            <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                            <label for="floatingInput"></label>
                                        </div>

                                        <div class="col mt-4">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">Student ID</label>
                                                <input readonly type="text" id="form6Example1" class="form-control no-border" name="student_id" value="{{$LoggedUserInfo->student_id}}"/>
                                                <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="col mt-4">
                                            <div class="form-outline form-line">
                                                <label class="form-label" for="form6Example1">Password</label><label class="text-danger">*</label>
                                                <input type="password" id="form6Example1" class="form-control no-border" name="password" />
                                                <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <hr class="border-divider">
                                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
</div>

@endsection