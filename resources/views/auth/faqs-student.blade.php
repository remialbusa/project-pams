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
            <a class="navbar-brand" href="/welcome"><img class="img-logo-grad" src="/images/GradSchoolLogo.png" alt=""></a>
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
        <h1 class="text-center mt-5" style="color: #f7d05c">FREQUENTLY ASK QUESTIONS</h1>

            <div class="col-sm-8 px-5 mt-5">
            </div>

            <div class="admission-requirements row px-5 mb-5 mt-3">
                @foreach ($faqs as $faqsData)
                    <div class="admission-body container mt-5">
                        <div class="col-sm-8 px-5 mt-4">
                        </div>

                        <h5 class="px-5 mt-5 text-center"><strong>{{ $faqsData['categories'] }}</strong></h5>

                        <div class="admission-requirements row px-5 mb-5 mt-3">

                                <p class="mt-3 m-0"><strong class="">{{ $faqsData['questions'] }}</strong></p>


                                <p class="m-5 mt-4">{{ $faqsData['answer'] }}</p>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="admission-requirements row px-5 mb-5 mt-3">
                <p class="bi bi-envelope-fill" style="font-size: 1rem; margin-right: 10px;">  gradschool@lnu.edu.ph</p>
                <p class="bi bi-facebook" style="font-size: 1rem; margin-right: 10px;">  LNU Graduate School 2022</p>
            </div>

    </section>

    {{-- <section class="faqs-details">
        <h1 class="text-center mt-5" style="color: #f7d05c">FREQUENTLY ASK QUESTIONS</h1>
        <div class="admission-body container mt-5">
            <div class="col-sm-8 px-5 mt-5">
            </div>

            <h4 class="text-center px-5 mt-5" style="color: #0b7dff">FREQUENTLY ASK QUESTIONS ABOUT THE WRITTEN COMPREHENSIVE EXAMS</h4>
            <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="col-sm-8 px-5 mt-5">
                </div>
                <h5 class="col-sm-10"><strong>WHO CAN TAKE THE WRITTEN COMPREHENSIVE EXAM</strong></h5>
                
                <div class="col-sm-8 lh-lg">
                    <p class="m-0">- Students who have completed ALL of their Academic Subjects and must not have any lacking grades in any of their subjects</p>
                    <p class="m-0">- They must also be enrolled in Residency on the same semester they plan to take the exams</p>
                </div>
            </div>

            
            <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="col-sm-8 px-5 mt-5">
                </div>
                <h5 class="col-sm-10"><strong>WHAT ARE THE PROCESS TO BE ABLE TO APPLY FOR THE WRITTEN COMPREHENSIVE EXAMS?</strong></h5>
                
                <div class="col-sm-8 lh-lg">
                    <p class="m-0">1.During the enrolment period, student must Pre-Register online and choose RESIDENCY as his/her enrolled subject.</p>
                    <p class="m-0">2.Student must visit the office of the Graduate School for the next steps of the enrolment.</p>
                    <p class="m-0">3.Student must visit the MIS for the printing of the Enrollment & Assesment Form (EAF).</p>
                    <p class="m-0">4.Student must visit the Accounting and Cashier's Office for the payment of their total assesment.</p>
                    <p class="m-0">5.After enrolling and paying for the Residency, student may now proceed applying for the Written Comprehensive Exam by visiting Office Graduate School and filling out the Application Form.</p>
                    <p class="m-0">6.If approved by the Dean of the Graduate School, student may now pay for the Written Comprehensive Exams (WCE).</p>
                    <p class="m-0">7.After paying, student must return the copy of their application to the Secretary of the Graduate School.</p>
                </div>
            </div>
            
            <div class="admission-requirements row px-5 mb-5 mt-3">
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
            </div>

            <div class="admission-requirements row px-5 mb-5 mt-3">
                <p class="bi bi-envelope-fill" style="font-size: 1rem; margin-right: 10px;">  gradschool@lnu.edu.ph</p>
                <p class="bi bi-facebook" style="font-size: 1rem; margin-right: 10px;">  LNU Graduate School 2022</p>
            </div>
        </div>
    </section>
 --}}

 <footer class="footer mb-0">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-8">
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
                    <div class="col col-12 col-sm-3">
                        <h5>Useful Links</h5>
                        <ul>
                            <li><a href="#">LNU Official Website</a></li>
                            <li><a href="#">LNU Student Portal</a></li>
                            <li><a href="#">Enrollment Updates</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 my-auto">
                <img class="footer-logo" src="https://www.enrollment.lnu.edu.ph/assets/images/lnu_logo.png" alt="logo" />
                <p>Follow our official social media platforms:</p>
                <div class="row">
                    <div class="col col-xs-6 ml-2">
                        <i class="bi bi-facebook" style="font-size: 2rem; margin-right: 20px;"></i>
                        <i class="bi bi-youtube" style="font-size: 2rem;"></i>
                    </div>

                </div>
            </div>
            <hr>
            <p class="text-light text-center">© Copyright <b>Leyte Normal university</b> . All Rights Reserved 2022</p>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>