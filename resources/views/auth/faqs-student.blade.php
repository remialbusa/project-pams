<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LNU Graduate School PAMS</title>

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
                        <a href="/welcome" class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="" class="nav-link" href="#">FAQ's</a>
                    </li>
                </ul>
            </div>
    </nav>

    <section class="faqs-details">
<<<<<<< HEAD
        <!-- <h1 class="text-center mt-5" style="color: #f7d05c">FREQUENTLY ASK QUESTIONS</h1>
=======
        <h1 class="text-center mt-5" style="color: #f7d05c"><b>FREQUENTLY ASK QUESTIONS</b></h1>
>>>>>>> 6937ac4b487dbda67483dc5b210bc8794f329245
        <div class="admission-body container mt-5">
            <div class="col-sm-8 px-5 mt-5">
            </div>

<<<<<<< HEAD
            <h4 class="text-center px-5 mt-5" style="color: #0b7dff">FREQUENTLY ASK QUESTIONS ABOUT THE WRITTEN COMPREHENSIVE EXAMS</h4> -->
        <!-- <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="admission-body container mt-5">
                    <div class="col-sm-8 px-5 mt-5">
                    </div>
                    <h5 class="col-sm-10"><strong>WHO CAN TAKE THE WRITTEN COMPREHENSIVE EXAM</strong></h5>
=======
            <h4 class="text-center px-5 mt-5" style="color: #0b7dff"><b>FREQUENTLY ASK QUESTIONS ABOUT THE WRITTEN COMPREHENSIVE EXAMS</b></h4>
            <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="col-sm-8 px-5 mt-5">
                </div>
                <h5 class="col-sm-10"><strong>WHO CAN TAKE THE WRITTEN COMPREHENSIVE EXAM</strong></h5>
                
                <div class="col-sm-8 lh-lg">
                    <p class="m-0">- Students who have completed ALL of their Academic Subjects and must not have any lacking grades in any of their subjects</p>
                    <p class="m-0">- They must also be enrolled in Residency on the same semester they plan to take the exams</p>
                </div>
            </div>
>>>>>>> 6937ac4b487dbda67483dc5b210bc8794f329245

                    <div class="col-sm-8 lh-lg">
                        <p class="m-0">- Students who have completed ALL of their Academic Subjects and must not have any lacking grades in any of their subjects</p>
                        <p class="m-0">- They must also be enrolled in Residency on the same semester they plan to take the exams</p>
                    </div>
                </div> -->
        <!-- </div>
        <div class="admission-requirements row px-5 mb-5 mt-1">
            <div class="admission-body container mt-5">
                <div class="col-sm-8 px-5 mt-5">
                </div>
                @foreach ($faqs as $faqsData)
                <h5 class="text-center col-sm-15"><strong>{{$faqsData['categories']}}</strong></h5>

                <div class="text-center col-sm-5 lh-lg">
                    <p class="m-0">{{$faqsData['questions']}}</p>
                </div>
                <div class="text-center col-sm-6 lh-lg">
                    <p class="m-0">{{$faqsData['answer']}}</p>
                </div>
                @endforeach
            </div> -->

        <!--  <div class="admission-requirements row px-5 mb-5 mt-3">
                    <div class="col-sm-8 px-5 mt-5">
                    </div>
                    <h5 class="col-sm-10"><strong>WHEN IS THE SCHEDULE FOR THE NEXT WRITTEN COMPREHENSIVE EXAMS (WCE)?</strong></h5>

                    <div class="col-sm-8 lh-lg">
                        <p class="m-0">(date)</p>
                    </div>
                </div>

                <div class="admission-requirements row px-5 mb-5 mt-3">
                    <div class="col-sm-8 px-5 mt-5">
                    </div>
                    <h5 class="col-sm-10"><strong>WHAT WILL BE THE SETTING OF THE EXAM?</strong></h5>

                    <div class="col-sm-8 lh-lg">
                        <p class="m-0">Face-to-Face Examinations</p>
                    </div>
                </div>

                <div class="admission-requirements row px-5 mb-5 mt-3">
                    <div class="col-sm-8 px-5 mt-5">
                    </div>
                    <h5 class="col-sm-10"><strong>WHEN WILL BE THE DEADLINE FOR THE APPLICATION?</strong></h5>

                    <div class="col-sm-8 lh-lg">
                        <p class="m-0">For Residency Enrolment - (date)</p>
                        <p class="m-0">For the Application Form Submission - (date)</p>
                    </div>
                </div>

                <div class="admission-requirements row px-5 mb-5 mt-3">
                    <div class="col-sm-8 px-5 mt-5">
                    </div>
                    <h5 class="col-sm-10"><strong>WHAT IF I CANNOT PHYSICALLY ATTEND THE EXAMS?</strong></h5>

                    <div class="col-sm-8 lh-lg">
                        <p class="m-0">For student who are from the region or country and unable to attend physically, please inform us during your application.</p>
                    </div>
                </div> -->


        </div>
        <div class="wrapper bg-white rounded shadow">
            <div class="h2 text-center fw-bold">FREQUENTLY ASK QUESTIONS</div>
            <div class="h3 text-primary text-center">How can we help you?</div>
            <!-- <div class="d-flex justify-content-center">
        <div class="search w-75 d-flex align-items-center"> <span class="fas fa-search text-dark"></span> <input type="text" class="form-control" placeholder="Describe your issue"> </div>
    </div> -->
            @foreach ($faqs as $faqsData)
            <div class="card shadow" style="width: auto">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="#" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#categoryModalForm">category 1</a>
                        <br>
                        @endforeach
                    </div>
                    <div class="admission-requirements row px-5 mb-5 mt-5">
                        <p class="bi bi-envelope-fill" style="font-size: 1rem; margin-right: 10px;"> gradschool@lnu.edu.ph</p>
                        <p class="bi bi-facebook" style="font-size: 1rem; margin-right: 10px;"> LNU Graduate School 2022</p>
                    </div>
                </div>



                <!-- Insert Thesis Modal -->
                <div class="modal fade" id="categoryModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                @foreach ($faqs as $faqsData)
                                <h5 class="modal-title" id="exampleModalLabel">Category 1</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Insert Form -->


                                <div class="form-floating mb-3">
                                    <p class="m-0">{{$faqsData['questions']}}</p>
                                </div>
                                <div class="form-floating mb-3">
                                    <p class="m-0">{{$faqsData['answer']}}</p>
                                </div>
                                @endforeach
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
    </section>

    <footer class="footer mb-0">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-5">
                    <div class="row text-white">
                        <div class="col col-12 col-sm-6">
                            <h5>Contact Us</h5>
                            <ul>
                                <li><a>Leyte Normal University</a></li>
                                <li><a>B. Paterno Street</a></li>
                                <li><a>Tacloban City, Leyte 6500</a></li>
                                <li><a><b>Phone:</b>+63 (53) 321 2176</a></li>
                                <li><a><b>Email:</b>info@lnu.edu.ph</a></li>
                            </ul>
                        </div>
                        <div class="col col-12 col-sm-6">
                            <h5>Useful Links</h5>
                            <ul>
                                <li><a href="#">LNU Official Website</a></li>
                                <li><a href="#">LNU Student Portal</a></li>
                                <li><a href="#">Enrollment Updates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-auto">
                    <img class="footer-logo" src="https://www.enrollment.lnu.edu.ph/assets/images/lnu_logo.png" alt="logo" />
                    <p>Follow our official social media platforms:</p>
                    <div class="row">
                        <div class="col col-xs-6 ml-5">
                            <i class="bi bi-facebook" style="font-size: 2rem; margin-right: 20px;"></i>
                            <i class="bi bi-youtube" style="font-size: 2rem;"></i>
                        </div>

                    </div>
                </div>
                <hr>
                <p class="text-light text-center">© Copyright <b>Leyte Normal university</b> . All Rights Reserved 2022</p>
            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>