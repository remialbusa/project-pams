@extends('admin.admin-main-layout')
@section('title', 'System Configuration')

@section('content')
<!-- Begin Page Content -->
<script type="text/javascript">
    const message = document.getElementById('message');

message.value = 'line one' + '\r\n' + 'line two' + '\r\n' + 'line three';

/**
 * line one
 * line two
 * line three
 */
console.log(message.value);
</script>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">FAQ's</h1>
    </div>

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Frequently Ask Questions</h1>
                    
                    </div>

                    <!-- DataTales Example -->

                   
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="{{ route('save-faqs') }}" method="POST" enctype="multipart/form-data"> 
                        <!-- 2 column grid layout with text inputs for the first and last names --> 
                            @if(Session::get('success'))
                            <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::get('fail'))
                            <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                            @endif
                        </form>
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Email</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faqs)
                            <tr>
                                <td>{{$faqs['program']}}</td>
                                <td>{{$faqs['name']}}</td>
                                <td>{{$faqs['id_no']}}</td>
                                <td>{{$faqs['email']}}</td>
                                <td>{{$faqs['question']}}</td>

                                <td>
                                    <a href="{{ route('delete-faqs', $faqs->id)}}" class="mx-1 d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Insert Thesis Modal -->
                    <div class="modal fade" id="categoryModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add FAQ's</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Insert Form -->
                                    <form action="{{ route('save-faqs') }}" method="POST">
                                        @if(Session::get('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                        @endif

                                        @if(Session::get('fail'))
                                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                        @endif

                                        @csrf

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="categories" placeholder="categories">
                                            <span class="text-danger">@error('categories'){{$message}} @enderror</span>
                                            <label for="floatingInput">Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="questions" placeholder="questions">
                                            <span class="text-danger">@error('questions'){{$message}} @enderror</span>
                                            <label for="floatingInput">Questions</label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <textarea placeholder="Answer" name="answer" id="message" cols="5" rows="5" class="border-exist form-control"></textarea>
                                            <span class="text-danger">@error('answer'){{$message}} @enderror</span>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-lg btn-warning btn-login fw-bold mb-2">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
