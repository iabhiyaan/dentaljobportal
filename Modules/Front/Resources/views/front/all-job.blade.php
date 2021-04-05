@extends('front::layouts.front')
@section('content')

    <!-- searchbox -->
    @include('front::layouts.search')
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
                                    @forelse ($alljobs as $item)
                                        <tr>
                                            <td>
                                                <h6 class="text-blue"><i class="fa fa-id-badge" aria-hidden="true"></i>
                                                    {{ $item->job_title }}</h6>
                                            </td>
                                            <td colspan="2">
                                                <div class="media">
                                                    <div class="d-hospital-logo">
                                                        <img src="{{ asset('images/logo3.png') }}" alt="">
                                                    </div>
                                                    <div class="media-body mt-1">
                                                        {{ $item->employer_name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->created_at->format(' jS \\ F Y ') }}</td>
                                            <td>{{ $item->deadline_date->format(' jS \\ F Y ') }}</td>
                                            <td><a href="{{ route('jobInner', $item->slug) }}">Details</a> </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <span style="color:red">No Jobs Found!!</span>
                                            </td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest job list ends -->

@endsection
