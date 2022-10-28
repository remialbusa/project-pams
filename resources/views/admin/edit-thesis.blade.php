<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- custom css -->
    <link href="./css/style.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="container-fluid ps-md-0 mt-4">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-4 mx-auto">
                        <h3 class="login-heading mb-4">Update Thesis</h3>
                        <form action="{{ route('thesis-update', $thesis->id) }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{$thesis->id}}">
                                <span class="text-danger">@error('id'){{$message}} @enderror</span>
                                <label for="floatingInput"></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="thesis_title" placeholder="Thesis Title" value="{{$thesis->thesis_title}}">
                                <span class="text-danger">@error('thesis_title'){{$message}} @enderror</span>
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="thesis_author" placeholder="Thesis Author" value="{{$thesis->thesis_author}}">
                                <span class="text-danger">@error('thesis_author'){{$message}} @enderror</span>
                                <label for="floatingInput">Author</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input readonly type="text" class="form-control" name="created_at" placeholder="Created At" value="{{$thesis->created_at}}">
                                <span class="text-danger">@error('created_at'){{$message}} @enderror</span>
                                <label for="floatingInput">Saved Date</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-warning btn-login fw-bold mb-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>