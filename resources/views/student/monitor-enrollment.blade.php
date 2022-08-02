<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enrollment Status</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- custom css -->
  <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark sticky-top navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/welcome"><img class="img-logo" style="height:48px; width: 48px" src="https://www.lnu.edu.ph/images/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto font-weight-semibold">
          <li class="nav-item px-2">
            <a class="nav-link" href="#">Welcome, </a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="/student/profile">Student Profile</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="{{route('auth.enrollment-status')}}">Monitor Enrollment</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
          </li>
        </ul>
      </div>
  </nav>
</body>
</html>