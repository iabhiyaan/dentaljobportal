@extends('front::layouts.front')
@section('content')
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
                        <form action="{{ route('employer.job.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Company Name</label>
                                    <input class="form-control" name="employer_name" value="{{ old('employer_name') }}"
                                        type="text" placeholder="Enter Company Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Job Category:</label>
                                    <select type="text" class="form-control" name="jobcategory_id" id="jobcategory_id">
                                        <option value="" selected disabled>Choose Job Category</option>
                                        {{-- @foreach ($jobCategories as $jobCategory)
                                            <option value="{{ $jobCategory->id }}">
                                                {{ $jobCategory->title }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Job Title</label>
                                    <input class="form-control" name="job_title" value="{{ old('job_title') }}" type="text"
                                        placeholder="Enter Job Title">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Job Reference Id:</label>
                                    <input class="form-control" name="job_reference_id"
                                        value="{{ old('job_reference_id') }}" type="text"
                                        placeholder="Enter Job Reference ID">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Type of Employment</label>
                                    <select name="type_of_employment" class="form-control">
                                        <option value="" selected disabled>--Please Select Type</option>
                                        @foreach ($dashboard_employmentTypes as $employmentType)
                                            <option value="{{ $employmentType->id }}"> {{ $employmentType->title }}
                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Where will employee report to?</label>
                                    <input class="form-control" name="employee_reporting"
                                        value="{{ old('employee_reporting') }}" type="text" placeholder="Enter Job Title">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <input class="form-control" name="country" value="{{ old('country') }}" type="text"
                                        placeholder="Enter Country">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Town/City/County</label>
                                    <input class="form-control" name="town_city" value="{{ old('town_city') }}" type="text"
                                        placeholder="Enter Town/City/County">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Street Address</label>
                                    <input class="form-control" name="street_address" value="{{ old('street_address') }}"
                                        type="text" placeholder="Enter Street Address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Postal Code</label>
                                    <input class="form-control" name="post_code" value="{{ old('post_code') }}" type="text"
                                        placeholder="Enter Postal Code'">
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Number of hires</label>
                                    <input class="form-control" name="number_of_vacancy"
                                        value="{{ old('number_of_vacancy') }}" type="text"
                                        placeholder="Enter Number Of Hires">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Is there a planned start date for this job?</label>
                                    <input type="radio" name="start_date" value="yes">
                                    Yes
                                    <input type="radio" name="start_date" value="no">No

                                </div>

                                <div class="form-group col-md-6">
                                    <label>How do you want to receive application?</label>
                                    <input type="checkbox" id="customCheck" name="application_receive_email">
                                    <label>Email</label>
                                    <input type="checkbox" id="customCheck" name="application_receive_phone">
                                    <label>Contact</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Do you want to submit resume?</label>
                                    <input type="radio" name="resume_receive" value="yes">Yes
                                    <input type="radio" name="resume_receive" value="no">No
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Job Status</label>
                                    <input type="radio" name="job_status" value="open">No

                                    >Open
                                    <input type="radio" name="job_status" value="paused">Paused
                                    <input type="radio" name="job_status" value="closed">Closed

                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Type of Salary</label>
                                    <select name="salary_type" class="form-control">
                                        <option value="" selected disabled>Please Select Type</option>

                                        @foreach ($dashboard_salaryTypes as $salaryType)
                                            <option value="{{ $salaryType->id }}">
                                                {{ $salaryType->title }}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>



                                <div class="form-group col-md-6">
                                    <label>Salary Range</label>
                                    <select name="salary" class="form-control">
                                        <option value="" selected disabled>--Please Select Type</option>
                                        @foreach ($dashboard_salary as $salary)

                                            <option value="{{ $salary }}">
                                                {{ $salary }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Salary benefits</label>
                                    <textarea name="benefits" class="form-control" rows="8"
                                        cols="80">{{ old('benefits') }}</textarea>
                                </div>
                            </div>



                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Job Description</label>
                                    <textarea name="job_description" class="form-control" rows="8"
                                        cols="80">{{ old('job_description') }}</textarea>
                                </div>
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
                                        <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"></div>
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
@endsection

@push('scripts')
    <script src="/assets/front/js/jquery.min.js"></script>
    <script src="/assets/front/js/bootstrap.js"></script>
    <script src="/assets/front/js/custom.js"></script>
@endpush
