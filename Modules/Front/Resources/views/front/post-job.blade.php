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
                    </ul>
                    <button class="btn bg-blue">
                        <a  href="post-job.html" class="bg-blue">Post Job</a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- header ends -->

    <!-- post job form  -->
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="poppin-bold text-blue">Post Your New Job Here</h5>
                    <p>Find the Best employee by Posting your vacancy on Detal Job.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8">
                    <div class="post-job-form">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Job Information</h6>
                                </div>
                                <!-- <div class="col-3 text-right">
                                    <a href="job-seeker-profile.html" class="bg-blue">Edit</a>
                                </div> -->
                            </div>
                        </div>
                        <form action="" class="row mt-3">
                            <div class="form-group col-sm-12">
                                <label for="job-title" class="poppin-bold">Job Title</label>
                                <input type="text" class="form-control " placeholder="Job title">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="job-title" class="poppin-bold">Job Refrence Id</label>
                                <input type="text" class="form-control " placeholder="Job Refrence Id">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="No-of-hires" class="poppin-bold">No Of Hires</label>
                                <input type="number" class="form-control " placeholder="No Of Hires">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="employment-type " class="poppin-bold">Type of Employment</label>
                                <select class="js-example-basic-single form-control ">
                                    <option value="full-time" selected>Full Time</option>
                                    <option value="full-time">Part Time</option>
                                    <option value="full-time">Contract</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="row preferred">
                                    <div class="col-sm-12">
                                        <p class="poppin-bold">Any Preferred Location To Report</p>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <input type="checkbox" class="form-control checked tick " placeholder="Job title">
                                        <label for="yes">yes</label>
                                        <input type="checkbox" class="form-control unchecked tick" placeholder="Job title">
                                        <label for="no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="preferred-address">
                                    <h6>Address</h6>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="city_county">Country</label>
                                            <select class="js-example-basic-single form-control" id="country">
                                            <option value="Uk" selected>UK</option>
                                            <option value="Uk" >USA</option>
                                            <option value="Uk" >Canada</option>
                                            <option value="Uk" >Nepal</option>
                                            <option value="Uk" >India</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="city_county">City /County </label>
                                            <input type="text" class="form-control" Place="City / County" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="Street">Street </label>
                                            <input type="text" class="form-control" Place="Street" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="postal-code">Postal Code</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="row preferred">
                                    <div class="col-sm-12">
                                        <p class="poppin-bold">Is there Planed start date</p>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <input type="checkbox" class="form-control checked-date tick-one">
                                        <label for="preferred-location">yes</label>
                                        <input type="checkbox" class="form-control no-date tick-one">
                                        <label for="preferred-location">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="preferred-date">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="city_county">Start Date </label>
                                            <input type="datetime-local" class="form-control" Place="City / County" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="row preferred">
                                    <div class="col-sm-12">
                                        <p class="poppin-bold">Offered Salary</p>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <input type="checkbox" class="form-control range-salary tick-two">
                                        <label for="range"> Range </label>
                                        <input type="checkbox" class="form-control fixed-salary tick-two">
                                        <label for="fixed"> Fixed </label>
                                        <input type="checkbox" class="form-control negotiable-salary tick-two">
                                        <label for="negotiable"> Negotiable </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="salary-input-range">
                                    <h6>Offered Salary</h6>
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-3">
                                            <select class="form-control" id="currency">
                                                <option value="Pound">Pound</option>
                                                <option value="US Dollar" >US Dollar</option>
                                                <option value="Irs" >Irs.</option>
                                                <option value="Nrs" >Nrs.</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-3">
                                            <input type="text" class="form-control" placeholder="Minimum Salary" required>
                                        </div>
                                        <div class="form-group col-sm-6b col-md-3">
                                            <input type="text" class="form-control" placeholder="Maximum Salary" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-3">
                                            <select class="form-control" id="payment-type">
                                                <option value="Monthly" >Monthly</option>
                                                <option value="Weekly" >Weekly</option>
                                                <option value="Per Hour" >Per Hour</option>
                                                <option value="Contract" >Contract</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="salary-input-fixed">
                                    <h6>Offered Salary</h6>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-4">
                                            <select class=" form-control" id="currency-one">
                                                <option value="Pound">Pound</option>
                                                <option value="US Dollar" >US Dollar</option>
                                                <option value="Irs" >Irs.</option>
                                                <option value="Nrs" >Nrs.</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <input type="text" class="form-control" placeholder="Offered Salary" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <select class="form-control" id="payment-type-one">
                                                <option value="Monthly" selected>Monthly</option>
                                                <option value="Weekly" >Weekly</option>
                                                <option value="Per Hour" >Per Hour</option>
                                                <option value="Contract" >Contract</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="row preferred">
                                    <div class="col-sm-12">
                                        <p class="poppin-bold">How do you Want to recieve Application</p>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <input type="checkbox" class="form-control tick-three">
                                        <label for="email"> Email </label>
                                        <input type="checkbox" class="form-control tick-three">
                                        <label for="Phone"> Direct Contact(Phone) </label>
                                        <input type="checkbox" class="form-control tick-three">
                                        <label for="dental-job"> Dental Job</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="row preferred">
                                    <div class="col-sm-12">
                                        <p class="poppin-bold">Want to Recieve Resume</p>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <input type="checkbox" class="form-control tick-four">
                                        <label for="yes">yes</label>
                                        <input type="checkbox" class="form-control tick-four">
                                        <label for="no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <p class="poppin-bold mb-2">Job description</p>
                                <div id="editor">
                                    <p>This is some sample content.</p>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <p class="poppin-bold mb-2">Other Benifits</p>
                                <div id="editorone">
                                    <p>This is some sample content.</p>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <button class="btn bg-green text-white"> <a href="job-detail.html">Post Now</a> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-dm-12 col-md-4">
                    <div class="aside-job-seeker-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="aside-image-box">
                                            <img src="./images/logo2.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9 no-gutters">
                                        <ul>
                                            <li><i class="fa fa-user"></i> Wisdom Dental Care </li>
                                            <li><i class="fa fa-envelope"></i>info@wisdomdentalcare.com</li>
                                            <li><i class="fa fa-phone"></i>+123 3424323</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="complete-profile-box mt-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 text-center">
                                <div class="d-progress-bar">
                                    <h6><strong> 30%</strong></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 mt-3  d-flex justify-content-center align-items-center ">
                                <button class="btn bg-green"><a href="edit-profile.html">Update Your Profile</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="similar-job-box mt-3">
                        <div class="title-box py-2">
                            <h6 class="poppin-bold">Paused Jobs</h6>
                        </div>
                        <div class="similar-job mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 ">
                                    <div class="similar-job-logo">
                                        <a href="job-detail.html"> <img src="./images/logo3.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 no-gutters">
                                    <h6 class="text-blue poppin-bold"><a href="job-detail.html"> Dental Doctor</a></h6>
                                    <p><strong>Employer:</strong> National Dental Care Hospital</p>
                                    <p><strong>Apply before:</strong> 20th April 2021</p>
                                </div>
                            </div>
                        </div>
                        <div class="similar-job mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 ">
                                    <div class="similar-job-logo">
                                        <a href="job-detail.html"> <img src="./images/logo3.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 no-gutters">
                                    <h6 class="text-blue poppin-bold"><a href="job-detail.html"> Dental Doctor</a></h6>
                                    <p><strong>Employer:</strong> National Dental Care Hospital</p>
                                    <p><strong>Apply before:</strong> 20th April 2021</p>
                                </div>
                            </div>
                        </div>
                        <div class="similar-job mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 ">
                                    <div class="similar-job-logo">
                                        <a href="job-detail.html"> <img src="./images/logo3.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 no-gutters">
                                    <h6 class="text-blue poppin-bold"><a href="job-detail.html"> Dental Doctor</a></h6>
                                    <p><strong>Employer:</strong> National Dental Care Hospital</p>
                                    <p><strong>Apply before:</strong> 20th April 2021</p>
                                </div>
                            </div>
                        </div>
                        <div class="similar-job mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 ">
                                    <div class="similar-job-logo">
                                        <a href="job-detail.html"> <img src="./images/logo3.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 no-gutters">
                                    <h6 class="text-blue poppin-bold"><a href="job-detail.html"> Dental Doctor</a></h6>
                                    <p><strong>Employer:</strong> National Dental Care Hospital</p>
                                    <p><strong>Apply before:</strong> 20th April 2021</p>
                                </div>
                            </div>
                        </div>
                        <div class="similar-job mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 ">
                                    <div class="similar-job-logo">
                                        <a href="job-detail.html"> <img src="./images/logo3.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 no-gutters">
                                    <h6 class="text-blue poppin-bold"><a href="job-detail.html"> Dental Doctor</a></h6>
                                    <p><strong>Employer:</strong> National Dental Care Hospital</p>
                                    <p><strong>Apply before:</strong> 20th April 2021</p>
                                </div>
                            </div>
                        </div>
                        <div class="similar-job mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 ">
                                    <div class="similar-job-logo">
                                        <a href="job-detail.html"> <img src="./images/logo3.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 no-gutters">
                                    <h6 class="text-blue poppin-bold"><a href="job-detail.html"> Dental Doctor</a></h6>
                                    <p><strong>Employer:</strong> National Dental Care Hospital</p>
                                    <p><strong>Apply before:</strong> 20th April 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- post job -->
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
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script src="././js/custom.js "></script>
    <script>
        $('.js-example-basic-single').select2();

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorone'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorOne'))
            .catch(error => {
                console.error(error);
            });
        //<![CDATA[
        CKEDITOR.replace('editorOne', {

            height: '800'
        });
        //]]>
    </script>
</body>

</html>