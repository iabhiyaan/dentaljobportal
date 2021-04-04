@extends('front::layouts.front')
@section('content')
    <!-- login-form -->
    <!-- searchbox -->
    @include('front::layouts.search')
    <!-- search ends -->


    <!-- job detials -->
    <section class="job-detail-wrap py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @if (session('message'))
                        <x-alert type="success" message="{{ session('message') }}"></x-alert>
                    @endif
                    <div class="job-detail-box mt-4">
                        <div class="title-box pb-2">
                            <h5 class="poppin-bold text-blue"><i class="fa fa-briefcase"></i> {{ $jobs->employer_name }}
                            </h5>
                            <div class="p-date row">
                                <div class="col-sm-12 col-md-6">
                                    Published On:
                                    <span>{{ isset($jobs->published_date) ? $jobs->published_date->format(' jS \\ F Y ') : null }}</span>
                                </div>
                                <span class="col-sm-12 col-md-6 text-right">
                                    <button class="btn bg-green">Apply
                                        before:{{ isset($jobs->deadline_date) ? $jobs->deadline_date->format(' jS \\ F Y ') : null }}</button>
                                </span>
                            </div>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Job Location </strong> </h6>
                            </div>
                            <p>{{ $jobs->location }}</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Job Reference ID</strong> </h6>
                            </div>
                            <p>D-1242DN</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Company Address</strong></h6>
                            </div>

                            <ul>
                                <li><strong>Country:</strong> UK</li>
                                <li><strong>Town City/County:</strong> LONDON</li>
                                <li><strong>Street:</strong>10 Downing Street</li>
                                <li><strong>Postal Code:</strong>SW1A 2AA</li>
                            </ul>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Type of Employement</strong></h6>
                            </div>
                            <p>{{ $jobs->job_type }}</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Number of Hires</strong></h6>
                            </div>
                            <p><span>3</span>Nos</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Type of Employement</strong></h6>
                            </div>
                            <p>{{ $jobs->job_type }}</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Salary</strong></h6>
                            </div>
                            <p>{{ $jobs->salary }}</p>
                        </div>

                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Send Apllication/Contact Via</strong></h6>
                            </div>
                            <p>Email</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Resume </strong></h6>

                            </div>
                            <p>Required</p>
                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Job Description </strong></h6>
                            </div>
                            <p>{{ $jobs->job_description }}</p>

                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Responsibilities</strong></h6>
                            </div>
                            <ul>
                                <li> {{ $jobs->job_requirements }}</li>

                            </ul>

                        </div>
                        <div class="job-detail-section">
                            <div class="sub-title">
                                <h6><strong>Benefits</strong></h6>
                            </div>
                            <ul>
                                <li> {{ $jobs->benefits }}</li>

                            </ul>
                        </div>
                        <p class="mt-3"><strong>Notes:</strong>The Candidate must have all the Requirement document.</p><br>

                        @if (count($applied) == 0)
                            <form method="post" action="{{ route('apply') }}">
                                @csrf
                                @php
                                    session()->put('__previous_url', url()->current());
                                @endphp
                                <input type="hidden" name="jobseeker_id" value="{{ $jobseeker->id }}">
                                <input type="hidden" name="job_id" value="{{ $jobs->id }}">
                                @php
                                $today_date = Carbon\Carbon::now();
                                // dd($jobs->deadline_date);
                                $expire_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $jobs->deadline_date);
                                $data_difference = $today_date->diffInDays($expire_date, false);
                                @endphp
                                @if ($data_difference > 0)
                                    <button class="btn bg-green" type="submit">Apply</a></button>
                                @else
                                    <p class="text-danger">Already Expired!</p>
                                @endif
                            </form>
                        @else
                            <p class="text-danger">Already Applied!</p>
                        @endif
                    </div>
                </div>

                <div class="col-dm-12 col-md-4">
                    @if (Auth::user() && Auth::user()->role == 'jobseeker')
                        <div class="aside-job-seeker-box">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="aside-image-box">
                                                <img src="{{ asset('images/thumbnail/' . $jobseeker->profile_image) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9 no-gutters">
                                            <ul>
                                                <li><i class="fa fa-user"></i> {{ $jobseeker->first_name }}
                                                    {{ $jobseeker->middle_name }} {{ $jobseeker->last_name }}</li>
                                                <li><i class="fa fa-envelope"></i> {{ $jobseeker->email }}</li>
                                                <li><i class="fa fa-phone"></i>{{ $jobseeker->mobile }}</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="complete-profile-box mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 text-center">
                                    <x-progressbar></x-progressbar>


                                </div>

                                @if ($profile_progres != 100)
                                    <div class="col-sm-12 col-md-6 mt-3  d-flex justify-content-center align-items-center ">
                                        <button class="btn bg-green"><a
                                                href="{{ route('editProfile', Auth::user()->username) }}">Update Your
                                                Profile</a></button>
                                    </div>
                                @else
                                    <div class="col-sm-12 col-md-6 mt-3  d-flex justify-content-center align-items-center ">
                                        <p style="color:green">Congratulations!</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="similar-job-box mt-3">
                        <div class="title-box py-2">
                            <h6 class="poppin-bold">Similar Jobs</h6>
                        </div>
                        @forelse ($similarjobs as $item)
                            <div class="similar-job mt-2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 ">
                                        <div class="similar-job-logo">
                                            <img src="{{ asset('images/logo3.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 no-gutters">
                                        <h6 class="text-blue poppin-bold"><a href="{{ route('jobInner', $item->slug) }}">
                                                {{ $item->job_title }}</a>
                                        </h6>
                                        <p><strong>Employer:</strong> {{ $item->employer_name }}</p>
                                        <p><strong>Apply before:</strong>{{ $item->deadline_date->format(' jS \\ F Y ') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty

                            <p style="color:red"> No similar jobs found!!</p>


                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- update profile section ends -->

@endsection
