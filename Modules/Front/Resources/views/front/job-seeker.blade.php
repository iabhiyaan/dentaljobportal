<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- meta tags for seo -->
    <meta name="description" content="dental job site">
    <meta name="keywords" content="dental, dental jobs">
    <meta name="author" content="name name">
    <!-- <meta http-equiv="refresh" content="50"> -->
    <link rel="canonical" href="https://dentaljobs.com">
    <!-- meta tags for seo ends -->

    <!-- compatiblity -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="icon" href="./images/logo1.png" type="image/jpg" sizes="16x16">
    <!-- title -->
    <title>Dental Jobs</title>
    <!-- font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- style sheet -->
    <link rel="stylesheet" href="././css/bootstrap.css">
    <link rel="stylesheet" href="././css/style.css">


</head>

<body>
    <header class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <img src="/images/logo.png" alt="dental-logo">
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="ads-box">
                        <img src="././images/banner- ads.png" alt="dental-logo">

                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <img src="/images/logo1.png" alt="dental-logo">
                </div>
            </div>
        </div>
        <nav class="navbar   navbar-expand-lg  nav-bar navbar-light bg-green">
            <div class="container">
                <a class="navbar-brand" href="index.html"><span class="fa fa-home"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="job-seeker.html">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="job-seeker-profile.html">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit-profile.html">Edit Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  default-btn login-signup-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu drop-form" aria-labelledby="dropdownMenuButton">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 ">
                                        <div class="d-profile-image">
                                            <img src="./images/man1.png" alt="Alex image">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-8 no-gutters">
                                        <h6 class="poppin-REGULAR">Alex Kumar Pandey </h6>
                                        <p><i class="fa fa-envelope-o"></i><a href="mailto:alex81@gmail.com">alex81@gmail.com</a> </p>
                                        <p><i class="fa fa-phone"></i> <a href="tel:+234234234">+234234234</a></p>
                                        <p><i class="fa fa-graduation-cap" aria-hidden="true"></i>Dental Doctor, MD</p>
                                    </div>
                                </div>
                                <ul class="mt-2 pt-3 border-top">
                                    <li><a href="#"><i class="fa fa-file-o" aria-hidden="true"></i>Applied Jobs</a> </li>
                                    <li><a href="change-password.html"><i class="fa fa-lock" aria-hidden="true"></i>Change Password</a> </li>
                                    <li><a href="index.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- header ends -->
    <!-- searchbox -->
    <section class="inner-search-form">
        <div class="container">
            <div class="form justify-content-center">
                <form action="POST" class="row ">
                    <div class="from-group col-sm-5 ">
                        <input type="text" class="form-control" placeholder="What: Job Title Keywords, Company" />
                    </div>
                    <div class="from-group col-sm-5 ">
                        <input type="text" class="form-control" placeholder="Where: City, Country">
                    </div>
                    <div class="from-group col-sm-2 ">
                        <button class="d-btn bg-green"><i class="fa fa-search"></i> <a href="search.html">search</a> </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- search ends -->
    <!-- update profile section-->
    <section class="d-complete-profile mt-3">
        <div class="container">
            <div class="complete-profile-box">
                <div class="row">
                    <div class="col-sm-12 col-md-3 text-center">
                        <div class="d-progress-bar">
                            <h6><strong> 30%</strong></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="complete-text-box">
                            <h6 class="poppin-regular"><i class="fa fa-user"></i>Profile Completeness</h6>
                            <p>Please complete your profile to 100% to increase the chance of getting right job matching with your Profile. </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3  d-flex justify-content-center align-items-center ">
                        <button class="btn bg-green"><a href="edit-profile.html">Update Your Profile</a></button>
                        <div class="close-btn">
                            x
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- update profile section ends -->

    <!-- latest jobs list  -->
    <section class="job-section mt-4">
        <div class="container ">
            <div class="d-job-list-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-briefcase" aria-hidden="true"></i>Latest Jobs</h6>
                                </div>
                                <div class="col-3 text-right">
                                    <a href="all-job.html" class="bg-blue">Veiw All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="d-job-list">
                            <table class="table table-borderless">
                                <thead>
                                    <tr class="text-green">
                                        <th>Position</th>
                                        <th colspan="2">Hospital</th>
                                        <th>Published On</th>
                                        <th>Apply Before</th>
                                        <th>Details</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest job list ends -->
    <!--  applied jobs list  -->
    <section class="job-section mt-4">
        <div class="container ">
            <div class="d-job-list-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-briefcase" aria-hidden="true"></i>Applied Jobs</h6>
                                </div>
                                <div class="col-3 text-right">
                                    <a href="all-applied-jobs.html" class="bg-blue">Veiw All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="d-job-list">
                            <table class="table table-borderless">
                                <thead>
                                    <tr class="text-green">
                                        <th>Position</th>
                                        <th colspan="2">Hospital</th>
                                        <th>Published On</th>
                                        <th>Apply Before</th>
                                        <th>Details</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee Dental Nurse-EC3R 7NE</h6>
                                        </td>
                                        <td colspan="2">
                                            <div class="media">
                                                <div class="d-hospital-logo">
                                                    <img src="./images/logo3.png" alt="">
                                                </div>
                                                <div class="media-body mt-1">
                                                    Easy Dental Care
                                                </div>
                                            </div>
                                        </td>
                                        <td>9th March 2021</td>
                                        <td>25th March 2021 </td>
                                        <td><a href="job-detail.html">Details</a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  applied job list ends -->
    <footer class="mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <h5>categories</h5>
                    <ul class="link-list">
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                        <li> <a href="#">Dental Nurse</a></li>
                        <li> <a href="#">Dental Receptionist</a></li>
                        <li> <a href="#">Dentist</a></li>
                        <li> <a href="#">Practice Manager</a></li>
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3">
                    <h5>location</h5>
                    <ul class="link-list">
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                        <li> <a href="#">Dental Nurse</a></li>
                        <li> <a href="#">Dental Receptionist</a></li>
                        <li> <a href="#">Dentist</a></li>
                        <li> <a href="#">Practice Manager</a></li>
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3">
                    <h5>information</h5>
                    <ul class="link-list">
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                        <li> <a href="#">Dental Nurse</a></li>
                        <li> <a href="#">Dental Receptionist</a></li>
                        <li> <a href="#">Dentist</a></li>
                        <li> <a href="#">Practice Manager</a></li>
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                        <li> <a href="#">Dental Nurse Trainee</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3">
                    <h5>Follow Us</h5>
                    <ul class="social-list mt-3">
                        <li> <a href="#"><span class="icon-facebook"></span></a></li>
                        <li> <a href="#"><span class="icon-twitter"></span></a></li>
                        <li> <a href="#"><span class="icon-instagram"></span></a></li>
                        <li> <a href="#"><span class="fa fa-linkedin"></span></a></li>
                        <li> <a href="#"><span class="fa fa-youtube-play"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- <div href="#" id="back-to-top"> <span class="icon-caret-up"></span> </div> -->
    <!-- script  url -->
    <script src="././js/jquery.min.js"></script>
    <script src="././js/bootstrap.js"></script>
    <script src="././js/custom.js"></script>
</body>

</html>