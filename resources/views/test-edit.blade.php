<div class="container-fluid ps-md-0 mt-4">
    <div class="login d-flex align-items-center py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-4 mx-auto">
                    <h3 class="login-heading mb-4">Test</h3>
                    <!-- login Form -->
                    <form action="" method="POST">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="id" placeholder="ID" value="{{$studentStatus['id']}}">
                            <span class="text-danger">@error('id'){{$message}} @enderror</span>
                            <label for="floatingInput">ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="student_id" placeholder="Student ID" value="{{$studentStatus['student_id']}}">
                            <span class="text-danger">@error('student_id'){{$message}} @enderror</span>
                            <label for="floatingInput">Student ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$studentStatus['first_name']}}">
                            <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                            <label for="floatingInput">First Name</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>