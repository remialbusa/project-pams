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
    <!-- custom css -->
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="https://www.lnu.edu.ph/images/logo.png"/>
    <title>Pre-registration</title>
</head>

<body>
    @php
    use App\Models\SchoolYear;
    @endphp
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
                        <a class="nav-link" href="/welcome">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/faqs">FAQ's</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="/welcome" class="nav-link" href="#">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="details">
        <div class="admission-body container mt-5">
            <h1 class="text-center mt-5" style="color: #0b7dff">ADMISSION REQUIREMENTS</h1>
            <div class="col-sm-8 px-5 mt-5">

            </div>

            <h4 class="px-5 mt-5">ADMISSION REQUIREMENTS</h4>
            <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="col-sm-4">
                    New Students 
                </div>
                <div class="col-sm-8 lh-lg">
                    <p class="m-0">1. Must take the Graduate School Admission Test (GSAT)</p>
                    <p class="m-0">2. Original Transcript of Records</p>
                    <p class="m-0">3. Original Honorable Dismissal</p>
                    <p class="m-0">4. Certificate of Good Moral Character</p>
                    <p class="m-0">5. PSA Birth Certificate</p>
                    <p class="m-0">6. Marriage Certificate (if applicable)</p>
                    <p class="m-0">7. 2 pcs. RECENT 2x2 ID Pictures</p>
                    <p class="m-0">8. For enrollees in any Doctoral Program, 1 Letter of Recommendation
                        from any former professor or superiors
                    </p>

                </div>
            </div>
            <h4 class="px-5 mt-5">ENROLLMENT PROCESS</h4>
            <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="col-sm-4">
                    New Students / Transferees
                </div>
                <div class="col-sm-8 lh-lg">
                <p class="m-0">1. VISIT THE OFFICE OF THE GRADUATE SCHOOL FOR EVALUATION
                    (JULY 27-AUGUST 5, 2022)</p>
                <p>Bring a copy of your Transcript of Records. From there, you will be
                    given a slip for you to take the Graduate School Admission test
                    (CSAT)</p>
                <p class="m-0">2. PAY AND SECURE A SCHEDULE FOR THE GSAT (JULY 27-AUGUST 5, 2022)</p>Pay at the Cashier's Office and visit the LNU Guidance and Testing Office
                to schedule your GSAT.
                <p class="m-0">3. FILL OUT ONLINE PRE-REGISTRATION FORM: 
                    

                    @if (SchoolYear::exists())
                        @php
                            $school_year = App\Models\SchoolYear::where('status', 'Active')->first();
                        @endphp
                        <a class="small btn btn-warning bg-warning btn-block mt-1" href="student/auth/register-new-student?schoolyear_id={{ $school_year->id}}">PRE-REGISTER FOR {{ $school_year->school_year }} - {{ strtoupper($school_year->semester) }} SEMESTER!</a> 
                    @else
                    <a class="small btn btn-warning bg-warning btn-block mt-1" data-bs-toggle="modal" data-bs-target="#modalForm">PRE-REGISTER HERE!</a>
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Important!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body mx-4">
                                    <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                        <span style="font-weight: bold;">Enrollment is not yet Actived. If you think this is wrong please message us in Technical support</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endif

                <p class="m-0">4. FILL OUT THE NEEDED FORMS FOR ADMISSION AT THE OGS</p>For successful examinees, fill out the Application for Graduate Admission Form
                (AFCAF) and the Draft Registration Form (DRF) at the Office of the Graduate School.
                <p class="m-0">5. GO TO THE MIS FOR THE SIGNING OF YOUR DRF AND PRINTING OF YOUR
                    ENROLMENT AND ASSESSMENT FORM (EAF)</p>
                <p class="m-0">6. GO TO THE ACCOUNTING OFFICE AND PRESENT YOUR EAF AND DRF</p>
                <p class="m-0">7. GO TO THE CASHIER'S OFFICE AND PAY FOR YOUR ENTRANCE FEE</p>
                <p class="m-0">8. SUBMIT YOUR ORIGINAL ENTRANCE DOcUMENTS TO THE REGISTRAR'S OFFICE
                </p>
                <p class="m-0">9.GO TO THE INCOME GENERATING PROJECT (IGP) OFFICE FOR YOUR ID
                </p>
                <p class="m-0">10. SUBMIT TO THE OGS THE OTHER COPY OF YOUR DRF.
                </p>
                </div>
            </div>
            <h4 class="px-5 mt-5">ENROLLMENT PROCESS</h4>
            <div class="admission-requirements row px-5 mb-5 mt-3">
                <div class="col-sm-4">
                    Continuining Students / Returnees
                </div>
                <div class="col-sm-8 lh-lg">
                    <p class="m-0">1. SIGNING OF CLEARANCE </p>
                    <p>July 27- August 5, 2022
                        Visit the Office of the Graduate School to secure a
                        copy of your Clearance Form and have them signed by
                        the CS Library and University Registrar.</p>
                    <p class="m-0">2. FILL OUT ONLINE PRE-REGISTRATION:
                    
                    @if (SchoolYear::exists())
                        @php
                            $school_year = App\Models\SchoolYear::where('status', 'Active')->first();
                        @endphp
                        <a class="small btn btn-warning bg-warning btn-block mt-1" href="student/auth/register-student?schoolyear_id={{ $school_year->id}}">PRE-REGISTER FOR {{ $school_year->school_year }} - {{ strtoupper($school_year->semester) }} SEMESTER!</a> 
                        </p>

                    @else
                    <a class="small btn btn-warning bg-warning btn-block mt-1" data-bs-toggle="modal" data-bs-target="#modalForm">PRE-REGISTER HERE!</a>
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Important!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body mx-4">
                                    <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                        <span style="font-weight: bold;">Enrollment is not yet Actived. If you think this is wrong please message us in Technical support</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <p class="m-0">3. SUBMIT YOUR CLEARANCE TO THE OGS AND FILL OUT THE
                        DRAFT REGISTRATION FORM (DRF).</p>
                    <p class="m-0">4. GO TO THE MIS FOR THE SIGNING OF YOUR DRF AND PRINTING
                        OF YOUR ENROLMENT AND ASSESSMENT FORM (EAF).</p>
                    <p class="m-0">5. 60 TO THE ACCOUNTING OFFICE AND PRESENT YOUR EAF AND DRF.</p>
                    <p class="m-0">6. GO TO THE CASHIER'S OFFICE AND PAY FOR YOUR ASSESSMENT.</p>
                    <p class="m-0">7. SUBMIT TO THE O6S THE OTHER COPY OF YOUR DRF AND WAIT FOR
                        FURTHER INSTRUCTIONS.</p>
                </div>
            </div>
            
        </div>
        
    </section>
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