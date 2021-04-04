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
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/jpg" sizes="16x16">
    <!-- title -->
    <title>Dental Jobs</title>
    <!-- font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- style sheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


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
                        <img src="{{ asset('images/banner- ads.png') }}" alt="dental-logo">

                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <img src="/images/logo1.png" alt="dental-logo">
                </div>
            </div>
        </div>
        <nav class="navbar   navbar-expand-lg  nav-bar navbar-light bg-green">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><span class="fa fa-home"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @php
                        $user = Auth::user();
                        if ($user) {
                        $jobseeker = Modules\Jobseeker\Entities\Jobseeker::where('user_id', $user->id)->first();
                        }
                        @endphp
                        @if ($user && $user->role == 'jobseeker')
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('overview') }}">Overview</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('profileInfo', $user->username) }}">My
                                    Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('editProfile', $user->username) }}">Edit
                                    Profile</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  default-btn login-signup-btn" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu drop-form" aria-labelledby="dropdownMenuButton">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 no-gutters">
                                            <div class="d-profile-image">
                                                @if (!$jobseeker->profile_image)
                                                    <img src="{{ asset('/images/man1.png') }}" alt="Alex image">
                                                @endif
                                                <img src="{{ asset('images/thumbnail/' . $jobseeker->profile_image) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-8">
                                            <h6 class="poppin-REGULAR">{{ $user->name }}</h6>
                                            <p><i class="fa fa-envelope-o"></i><a
                                                    href="mailto:{{ $user->email }}">{{ $user->email }}</a> </p>
                                            <p><i class="fa fa-phone"></i> <a
                                                    href="tel:{{ $jobseeker->mobile }}">{{ $jobseeker->mobile }}</a>
                                            </p>
                                            <p><i class="fa fa-graduation-cap" aria-hidden="true"></i>Dental Doctor,
                                                MD
                                            </p>
                                        </div>
                                    </div>
                                    <ul class="mt-2 pt-3 border-top">
                                        <li><a href="{{ route('appliedJobs', $user->username) }}"><i
                                                    class="fa fa-file-o" aria-hidden="true"></i>Applied Jobs</a>
                                        </li>
                                        <li><a href="{{ route('changePasswordForm') }}"><i class="fa fa-lock"
                                                    aria-hidden="true"></i>Change Password</a> </li>
                                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"
                                                    aria-hidden="true"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </li>

                        @elseif (auth()->user() && auth()->user()->role == 'employer')

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('employer.getEmployerOverview', auth()->user()->employer->id) }}">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('employer.getCompanyProfile', auth()->user()->employer->id) }}">Company
                                    Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('employer.getProfile', auth()->user()->employer->id) }}">Edit
                                    Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manag-job.html">Manage Job</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  default-btn login-signup-btn" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
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
                                            <p><i class="fa fa-envelope-o"></i><a
                                                    href="mailto:alex81@gmail.com">career@webhousenepal.com</a> </p>
                                            <p><i class="fa fa-phone"></i><a href="tel:+234234234">+234234234</a></p>
                                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>London</p>
                                        </div>
                                    </div>
                                    <ul class="mt-2 pt-3 border-top">
                                        <li><a href="#"><i class="fa fa-file-o" aria-hidden="true"></i>Posted Jobs</a>
                                        </li>
                                        <li><a href="password-reset.html"><i class="fa fa-lock"
                                                    aria-hidden="true"></i>Change Password</a> </li>
                                        <li><a href="{{ route('employer.employerLogout') }}"><i class="fa fa-sign-out"
                                                    aria-hidden="true"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <button class="btn bg-blue">
                                <a href="post-job.html" class="bg-blue">Post Job</a>
                            </button>

                        @else

                            <li class="nav-item"><a class="nav-link" href="{{ route('jobseeker.login') }}">login</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('jobseeker.register') }}">Register</a>
                            </li>

                        @endif



                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- header -->

    @yield('content')




    <!-- footer -->
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
