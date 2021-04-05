@extends('front::layouts.front')
@section('content')
    <!-- searchbox -->
    @include('front::layouts.search')
    <!-- edit-profile -->
    <section class="mt-4">
        <div class="container">
            <div class="edit-profile-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box  text-blue">
                            <div class="row py-2">
                                <div class="col-9">
                                    <h6><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Profile</h6>
                                </div>
                                <div class="col-3 text-right">
                                    <a href="{{ route('profileInfo', Auth::user()->username) }}" class="bg-blue">Preview
                                        Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab"
                                aria-controls="basic-info" aria-selected="true"><i class="fa fa-id-card-o"
                                    aria-hidden="true"></i>Basic Information</a>
                            <a class="nav-link" id="work-experience-tab" data-toggle="pill" href="#work-experience"
                                role="tab" aria-controls="work-experience" aria-selected="false"><i class="fa fa-tasks"
                                    aria-hidden="true"></i>Work Experience</a>
                            <a class="nav-link" id="add-document-tab" data-toggle="pill" href="#document-tab" role="tab"
                                aria-controls="document-tab" aria-selected="false"><i class="fa fa-files-o"
                                    aria-hidden="true"></i> Additional Document</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="tab-content mt-4" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="basic-info" role="tabpanel"
                                aria-labelledby="basic-info-tab">
                                <div class="d-detail-box">
                                    <div class="title-box pb-2">
                                        <div class="row py-2">
                                            <div class="col-9">
                                                <h6>Basic Information</h6>
                                            </div>
                                            <div class="col-3 text-right">
                                                <button class="bg-blue btn edit-btn"><i class="fa fa-edit"></i>Edit
                                                    Profile</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="basic-info-box px-3 mt-3">
                                        <ul class="row">
                                            <li class="col-12"> <span class="basic-info-title">Profile Image</span> :<span
                                                    class="basic-info-detial">
                                                    @if (!$user->profile_image)
                                                        <img src="{{ asset('/images/man1.png') }}" alt="Alex image">
                                                    @endif
                                                    <img src="{{ asset('images/main/' . @$user->profile_image) }}" alt="">
                                                </span></li>
                                            <li class="col-12"> <span class="basic-info-title">Full Name</span> :<span
                                                    class="basic-info-detial">{{ $user->first_name }}
                                                    {{ $user->middle_name }} {{ $user->last_name }}</span></li>
                                            <li class="col-12"> <span class="basic-info-title">Email</span> :<span
                                                    class="basic-info-detial">{{ $user->email }}</span></li>
                                            <li class="col-12"> <span class="basic-info-title">Mobile</span> :<span
                                                    class="basic-info-detial">{{ $user->mobile }}</span></li>
                                            <li class="col-12"> <span class="basic-info-title">GDC Number</span> :<span
                                                    class="basic-info-detial">{{ $user->gdc_number }} </span></li>
                                            <li class="col-12"> <span class="basic-info-title">Country</span> :<span
                                                    class="basic-info-detial">{{ $user->country }} </span></li>
                                            <li class="col-12"> <span class="basic-info-title">City /County</span> :<span
                                                    class="basic-info-detial">{{ $user->city_county }} </span></li>
                                            <li class="col-12"> <span class="basic-info-title">Street</span> :<span
                                                    class="basic-info-detial">{{ $user->street }}</span></li>
                                            <li class="col-12"> <span class="basic-info-title">Postal Code</span> :<span
                                                    class="basic-info-detial">{{ $user->postal_code }}</span></li>
                                            <li class="col-12"> <span class="basic-info-title">Resume</span> :<span
                                                    class="basic-info-detial">Resume file here</span></li>
                                            <li class="col-12"> <span class="basic-info-title">Cover Letter</span> :<span
                                                    class="basic-info-detial">Cover Letter here</span></li>

                                        </ul>
                                    </div>
                                    <?php $users = Auth::user(); ?>

                                    <div class="basic-info-form mt-3 px-3">
                                        <form action="{{ route('updateProfile', $user->id) }}" method="post" class="row"
                                            enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="First Name" value="{{ $users->first_name }}">
                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" name="middle_name"
                                                    placeholder="Middle Name" value="{{ $users->middle_name }}">

                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="Last_name">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name"
                                                    name="last_name" value="{{ $users->last_name }}">
                                                @if ($errors->has('last_name'))
                                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email"
                                                    value="{{ $users->email }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label for="Mobile">Mobile </label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile"
                                                    value="{{ $user->mobile }}">
                                                @if ($errors->has('mobile'))
                                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="gdc_number">GDC Number </label>
                                                <input type="text" class="form-control" name="gdc_number"
                                                    placeholder="GDC Number" value="{{ $user->gdc_number }}">
                                                @if ($errors->has('gdc_number'))
                                                    <span class="text-danger">{{ $errors->first('gdc_number') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="city_county">Country</label>
                                                <select class="js-example-basic-single form-control" name="country"
                                                    id="country"
                                                    value="{{ $user->country }} >
                                                                                                                                                                                                                                                                                                                                                                                <option value="
                                                    uk" @if ($user->country == 'uk') {{ 'selected' }} @endif>UK</option>
                                                    <option value="usa" @if ($user->country == 'usa') {{ 'selected' }} @endif>USA</option>
                                                    <option value="canada" @if ($user->country == 'canada') {{ 'selected' }} @endif>Canada</option>
                                                    <option value="nepal" @if ($user->country == 'nepal') {{ 'selected' }} @endif>Nepal</option>
                                                    <option value="india" @if ($user->country == 'india') {{ 'selected' }} @endif>India</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="city_county">City /County </label>
                                                <input type="text" class="form-control" name="city_county"
                                                    value="{{ $user->city_county }}">
                                                @if ($errors->has('city_county'))
                                                    <span class="text-danger">{{ $errors->first('city_county') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="Street">Street </label>
                                                <input type="text" class="form-control" name="street"
                                                    value="{{ $user->street }}">
                                                @if ($errors->has('street'))
                                                    <span class="text-danger">{{ $errors->first('street') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="postal-code">Postal Code</label>
                                                <input type="text" class="form-control" name="postal_code"
                                                    value="{{ $user->postal_code }}">
                                                @if ($errors->has('postal_code'))
                                                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <label for="profile">Upload Image</label>
                                                <input type="file" name="profile_image" onchange='Test.UpdatePreview(this)'>
                                                <p> The image file must be in png, jpeg, jpg format with ration of
                                                    width=100px and height=90px. </p>

                                                @if ($user->profile_image)
                                                    <div class="u-proifle-image">
                                                        <img src="{{ asset('images/thumbnail/' . $user->profile_image) }}"
                                                            alt="Profile Image">
                                                    </div>
                                                @endif

                                                @if ($errors->has('profile_image'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('profile_image') }}</span>
                                                @endif

                                            </div>

                                            <div class="form-group col-sm-12 ">
                                                <label for="resume">Upload Resume</label>
                                                <input type="file" name="resume" id="myResume" /><br>
                                                <p> The file must be in pdf format. </p>

                                                <canvas id="pdfViewer"></canvas>

                                                @if ($errors->has('profile_image'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('profile_image') }}</span>
                                                @endif

                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <label for="cover_letter">Upload Cover Letter</label>
                                                <input type="file" name="cover_letter" id="myCoverLetter">
                                                <p> The file must be in pdf format. </p>

                                                <canvas id="pdfViewerOne"></canvas>
                                            </div>
                                            <div class="form-group col-sm-12 border-top pt-2 text-right">
                                                <button class="btn bg-green" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="work-experience" role="tabpanel"
                                aria-labelledby="work-experience-tab">
                                <div class="d-detail-box">
                                    <div class="title-box pb-2">
                                        Work Experience
                                    </div>

                                    <div class=" px-3 mt-3">
                                        <div class="work-experience-box">
                                            @forelse ($user->experiences as $experience)
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <p> <i class="fa fa-calendar text-blue"></i> <span>
                                                                {{ \Carbon\Carbon::parse($experience->start_date)->format(' F, Y') }}</span>-
                                                            <span>
                                                                {{ \Carbon\Carbon::parse($experience->end_date)->format(' F, Y') }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <ul>
                                                            <li><i class="fa fa-briefcase text-blue"></i>
                                                                {{ $experience->job_title }}</li>
                                                            <li><i class="fa fa-building text-blue"></i>
                                                                {{ $experience->company_name }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @empty

                                            @endforelse

                                        </div>

                                    </div>
                                    <div class="mt-3 px-3">
                                        <form method="post" action="{{ route('updateExperience') }}">
                                            @csrf
                                            <div class="work-form">
                                                <div class="hidden  row ">
                                                    <div class="example-template">
                                                        <div class="form-group col-sm-12">
                                                            <label for="job_title">Job Title</label>
                                                            <input type="text" class="form-control" id="job_title"
                                                                name="job_title[]" placeholder="Job Title ">
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label for="middle_name ">Company Name</label>
                                                            <input type="text" class="form-control" id="company_name"
                                                                name="company_name[]" placeholder="Company Name ">
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label for="Last_name">Duration</label>
                                                            <div class="row ">
                                                                <p class="col-6">From:<input type="date" name="start_date[]"
                                                                        id="start_date" class="form-control "></p>
                                                                <p class="col-6">To:<input type="date" name="end_date[]"
                                                                        id="end_date" class="form-control "></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <button class="del btn bg-green">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12  text-right ">
                                                <div class="border-top pt-2 save-btn">
                                                    <button class="btn bg-green" type="btn" id="exps">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>



                                    <div class="add-work-box mt-3 "><button class="add_field_button "> <i
                                                class="fa fa-plus "></i> Add Work Experience</button></div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="document-tab" role="tabpanel"
                                aria-labelledby="add-document-tab ">
                                <div class="d-detail-box ">
                                    <div class="title-box pb-2">
                                        <h6>Additional Document</h6>
                                    </div>
                                    <div class="multiple-upload-form mt-3 px-3 ">
                                        <form method="post" action="{{ route('additionalDocuments', Auth::id()) }} "
                                            class="row" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-sm-12 ">
                                                <label for="city_county">Upload Image</label>
                                                <input type="file" name="documents[]" accept="image/*" multiple>
                                                <p>Please Upload file in pdf, jpg, jpeg, png foramt and The file size must
                                                    not exceed 2mb.</p>
                                            </div>
                                            <div class="form-group col-sm-12 border-top pt-2 text-right ">
                                                <button class="btn bg-green " type="submit">Save</button>
                                            </div>
                                        </form>
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
@endsection



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/jquery.min.js') }} "></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $( document ).ready(function() {
            var className = $('.tab-pane').attr('class');
        }); 
    </script>
    
@endpush
