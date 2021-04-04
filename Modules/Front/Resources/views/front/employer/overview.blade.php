@extends('front::layouts.front')
@section('content')
    <!-- update profile section-->
    <section class="d-complete-profile mt-3">
        <div class="container">
            <div class="complete-profile-box">
                <div class="row">
                    <div class="col-sm-12 col-md-3 text-center">
                        <div class="d-progress-bar">
                            <h6><strong> 30%</strong></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="complete-text-box">
                            <h6 class="poppin-regular"><i class="fa fa-user"></i>Profile Completeness</h6>
                            <p>Please complete your profile to 100% to increase the chance of getting right job matching
                                with your Profile. </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3  d-flex justify-content-center align-items-center ">
                        <button class="btn bg-green"><a
                                href="{{ route('employer.getProfile', auth()->user()->employer->id) }}">Update Your
                                Profile</a></button>
                        <div class="close-btn">
                            x
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- update profile section ends -->
    <!-- post a job section will be shown when the user  register for the first time  -->
    <!-- post a job -->
    <section class=" mt-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="post-job-btn-box py-2">
                        <i class="fa fa-briefcase text-blue"></i>
                        <h6 class="poppin-bold text-blue text-capitalize">You have not Posted a Job yet</h6>
                        <button class="btn bg-green"><a href="{{ route('employer.job.create') }}">Post a
                                Job</a></button>
                        <p>this section will be shown when the user register for the first time and have not posted any job
                            yet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- post a job ends -->

    <!--  applied jobs list  -->
    <section class="job-section mt-4">
        <div class="container ">
            <div class="d-job-list-box mt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-briefcase" aria-hidden="true"></i>Open Jobs</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
            <div class="d-job-list-box mt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-briefcase" aria-hidden="true"></i>Closed Jobs</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
            <div class="d-job-list-box mt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-briefcase" aria-hidden="true"></i>Paused Jobs</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
                                            <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i> Trainee
                                                Dental Nurse-EC3R 7NE</h6>
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
@endsection

@push('scripts')
    <script src="/assets/front/js/jquery.min.js"></script>
    <script src="/assets/front/js/bootstrap.js"></script>
    <script src="/assets/front/js/custom.js"></script>
@endpush
