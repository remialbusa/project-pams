<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap Icon-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
        <!-- ph locations jquery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    
        <!-- custom css -->
        <link type="text/css" href="{{url('css/profile.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{URL::asset('js/script.js') }}"></script>
        <title>Edit Thesis</title>
    </head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
            <a class="navbar-brand" href="/welcome"><img class="img-logo" src="/images/GradSchoolLogo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto font-weight-semibold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/staff/admin/dashboard">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="container-fluid ps-md-0 mt-4">
            <div class=" px-4 mt-5 mb-5">
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
        </div>
    </section>
</body>

</html>