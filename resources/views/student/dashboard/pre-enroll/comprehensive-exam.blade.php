@extends('student.student-main-layout')
@section('title', 'Comprehensive Exam')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Comprehensive Exam Form</h1>
    </div>
    <p>(Note: Please fill-up this form if you are ready to take the comprehensive exam).</p>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <section class="details">
                    <div class="container mt-5">
                        <div class="container h-100">
                            <div class="px-4 mt-5 mb-5">
                                <h4>Comprehensive Exam Form</h4>
                                <hr class="border-divider">
                                {{-- <p></p>
                                <hr class="border-divider"> --}}
                                
                                <form action="{{ route('insert-comprehensive-exam') }}" method="POST" enctype="multipart/form-data">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    @if(Session::get('success'))
                                    <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                                    @endif
            
                                    @if(Session::get('fail'))
                                    <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                                    @endif
            
                                    @csrf
                                    <div class="profile mt-5">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row mt-4 mb-3">
                                            <div class="col-md-6">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example1">Student ID Number <label class="text-danger">*</label></label>
                                                    <input type="text" id="form6Example1" class="form-control no-border" name="student_id"/>
                                                    <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example2">Program <label class="text-danger">*</label></label>
                                                    <select class="form-select" aria-label="Default select example" id="slct_program" name="program" {{-- onchange="populate(this.id, 'slct_first_period')" --}}>
                                                        @foreach ($programs as $programs)
                                                            <option value="{{$programs->program}}">{{$programs->program}} - {{$programs->description}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">@error('program'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4 mb-3">
                                            <div class="col-md-6">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example2">Full Name <label class="text-danger">*</label></label>
                                                    <input type="text" id="form6Example2" class="form-control no-border" name="name"/>
                                                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline form-line">
                                                    <label class="form-label" for="form6Example2">Exam Status <label class="text-danger">*</label></label>
                                                    <select class="form-select" aria-label="Default select example" name="exam_status">
                                                        <option disabled selected>N/A</option>
                                                        <option value="Ready">Ready</option>
                                                        <option value="Not Ready">Not Ready</option>
                                                    </select>
                                                    <span class="text-danger">@error('exam_status'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="form-group form-line">
                                                    <label class="form-label" for="form6Example1">List of Requirements: <label class="text-danger">*</label></label>
                                                    <p>
                                                        <i>(Kindly upload the soft copy of your entrance payment receipt, credentials, registration, consent, and promissory note in one PDF file.)</i>
                                                    </p>
                                                    <input type="file" placeholder="Choose file" class="form-control" name="file">
                                                    <span class="text-danger">@error('file'){{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-divider">
                                    <button type="submit" class="btn btn-primary btn-block mt-4 mb-5">Register</button>
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