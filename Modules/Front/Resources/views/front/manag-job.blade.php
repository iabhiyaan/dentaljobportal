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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                            <a class="nav-link" href="employer.html">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="company-profile.html">Compnay Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit-company-profile.html">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manag-job.html">Manage Job</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  default-btn login-signup-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu drop-form" aria-labelledby="dropdownMenuButton">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 ">
                                        <div class="d-profile-image">
                                            <img src="./images/logo2.png" alt="Alex image">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-8 no-gutters">
                                        <h6 class="poppin-REGULAR">Webhouse Nepal</h6>
                                        <p><i class="fa fa-envelope-o"></i><a href="mailto:alex81@gmail.com">career@webhousenepal.com</a> </p>
                                        <p><i class="fa fa-phone"></i><a href="tel:+234234234">+234234234</a></p>
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>London</p>
                                    </div>
                                </div>
                                <ul class="mt-2 pt-3 border-top">
                                    <li><a href="#"><i class="fa fa-file-o" aria-hidden="true"></i>Posted Jobs</a> </li>
                                    <li><a href="password-reset.html"><i class="fa fa-lock" aria-hidden="true"></i>Change Password</a> </li>
                                    <li><a href="index.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <button class="btn bg-blue">
                            <a  href="post-job.html" class="bg-blue">Post Job</a>
                        </button>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- header ends -->
    <!-- edit-profile -->
    <section class="mt-4">
        <div class="container">
            <div class="edit-profile-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h5 class="poppin-bold"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Manage Job</h5>
                                </div>
                                <div class="col-3 text-right">
                                    <select class="form-control">
                                        <option value="Open Job">Open Job </option>
                                        <option value="Paused Job">Paused Job</option>
                                        <option value="Close Job">Close Job</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-job-list-box ">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box  text-blue">
                                        <div class="row py-2">
                                            <div class="col-9">
                                                <h6><i class="fa fa-briefcase" aria-hidden="true"></i>Closed Jobs</h6>
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
                                                    <th>Option</th>

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
                                                    <td>
                                                        <a href="view-job.html"><i class="fa fa-eye"></i></a>
                                                        <a href="edit-job.html"><i class="fa fa-edit"></i></a>
                                                        <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
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
                                                    <td>
                                                        <a href="view-job.html"><i class="fa fa-eye"></i></a>
                                                        <a href="edit-job.html"><i class="fa fa-edit"></i></a>
                                                        <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
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
                                                    <td>
                                                        <a href="view-job.html"><i class="fa fa-eye"></i></a>
                                                        <a href="edit-job.html"><i class="fa fa-edit"></i></a>
                                                        <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--  edit-profile ends -->
    <footer class="mt-5 py-5 ">
        <div class="container ">
            <div class="row ">
                <div class="col-sm-12 col-md-3 ">
                    <h5>categories</h5>
                    <ul class="link-list ">
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                        <li> <a href="# ">Dental Nurse</a></li>
                        <li> <a href="# ">Dental Receptionist</a></li>
                        <li> <a href="# ">Dentist</a></li>
                        <li> <a href="# ">Practice Manager</a></li>
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3 ">
                    <h5>location</h5>
                    <ul class="link-list ">
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                        <li> <a href="# ">Dental Nurse</a></li>
                        <li> <a href="# ">Dental Receptionist</a></li>
                        <li> <a href="# ">Dentist</a></li>
                        <li> <a href="# ">Practice Manager</a></li>
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3 ">
                    <h5>information</h5>
                    <ul class="link-list ">
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                        <li> <a href="# ">Dental Nurse</a></li>
                        <li> <a href="# ">Dental Receptionist</a></li>
                        <li> <a href="# ">Dentist</a></li>
                        <li> <a href="# ">Practice Manager</a></li>
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                        <li> <a href="# ">Dental Nurse Trainee</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3 ">
                    <h5>Follow Us</h5>
                    <ul class="social-list mt-3 ">
                        <li> <a href="# "><span class="icon-facebook "></span></a></li>
                        <li> <a href="# "><span class="icon-twitter "></span></a></li>
                        <li> <a href="# "><span class="icon-instagram "></span></a></li>
                        <li> <a href="# "><span class="fa fa-linkedin "></span></a></li>
                        <li> <a href="# "><span class="fa fa-youtube-play "></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- <div href="# " id="back-to-top "> <span class="icon-caret-up "></span> </div> -->
    <!-- script  url -->
    <script src="././js/jquery.min.js "></script>
    <script src="././js/bootstrap.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="././js/custom.js "></script>
    <script>
        $('.js-example-basic-single').select2();
    </script>
</body>

</html>