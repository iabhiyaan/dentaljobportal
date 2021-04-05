@extends('front::layouts.front')
@section('content')

    @if ($errors->any())
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success alert-dismissible message">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="message" aria-hidden="true">&times;</span>
                </button>
                <h4>{{ $errors->first() }}</h4>
            </div>
        </div>
    @endif
    <!-- main body  -->
    <!-- advertsiern your dental job -->
    <section class="mt-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ads-job-section">
                        <div class="ads-tittle">
                            <h2 class="text-capitalize poppin-medium">Advertise your dental job for FREE </h2>
                            <h6> Reach out to hundreds of active dental jobseekers. Browse and search through candidate
                                prfiles to find the right one for your practice.
                            </h6>
                        </div>

                        <div class="ads-asset-upload">
                            <div class="row">
                                <div class="col-sm-12 col-md-8">
                                    <div class="media">
                                        <div class="pointer-icon">
                                            <img src="{{ asset('images/Asset-1.png') }}" alt="" srcset="">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="text-capitalize poppin-regular text-blue">Get Hired !</h4>
                                            <input type="file" class="ulpoad-text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 text-right">
                                    <button class="d-btn bg-blue ">Post Your Job Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- searchbox -->
    <section class="search-form mt-3 py-2">
        <div class="container bdr-btm pb-5">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="share-like-box">
                        <span class="fa fa-thumbs-up"><label class="poppin-regular">Like</label> </span>
                        <span class="fa fa-share"><label class="poppin-regular">share</label></span>
                    </div>
                    <h2 class="text-blue mt-4 poppin-regular"><img src="./images/search-blue.png" alt="" srcset=""> Serach
                        Jobs</h2>
                </div>
            </div>
            <div class="form row justify-content-center mt-3 mt-lg-5">
                <form action="{{ route('search') }}" method="get" class="row ">
                    <div class="from-group col-sm-4 mt-2">
                        <input type="text" class="form-control" name="title" id="job_title"
                            placeholder="What: Job Title Keywords, Company" />
                    </div>
                    <div class="from-group col-sm-4 mt-2">
                        <input type="text" class="form-control" name="location" id="job_location"
                            placeholder="Where: City, Country">
                    </div>
                    <div class="from-group col-sm-3 mt-2">
                        <button class="d-btn bg-green" id="searchSubmit" type="submit"><i class="fa fa-search"></i>
                            search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jobs list  -->

    <section class="job-section mt-4">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="img-box">
                        <img src="./images/job-blue.png" alt="" srcset="">
                    </div>
                    <span class="jobs-text  text-blue">Jobs</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12 col-md-4">
                    <a href="#" target="_blank"><img src="./images/bannerv.gif" alt="" srcset=""></a>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="job-list">
                        
                        @foreach ($alljobs as $job)
                            <div class="job-box mb-3">
                                <h2 class="text-capitalize text-blue"><a
                                        href="{{ route('jobInner', $job->slug) }}">{{ $job->job_title }}</a>
                                </h2>
                                <p class="p-date">Published on:
                                    @if ($job->published_date)
                                        <span>{{ $job->published_date->format(' jS \\ F Y ') }}</span>
                                    @endif

                                </p>
                                <p>{{ Str::limit($job->job_description, 150) }}<a
                                        href="{{ route('jobInner', $job->slug) }}">Read More</a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    {{ $alljobs->links('pagination.default') }}
                    <button class="d-btn bg-green text-uppercase"> <span class="icon-search"></span> new search</button>
                </div>

            </div>
        </div>
    </section>


@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        if ($('#job_title').val() == 0 && $('#job_location').val() == 0) {
            //    $('#searchSubmit').appendClass('disable')
            $('#searchSubmit').prop('disabled', true);
        }

        $('#job_title').on('keyup', function() {
            $('#searchSubmit').prop('disabled', false);
        })

        $('#job_location').on('keyup', function() {
            $('#searchSubmit').prop('disabled', false);
        })

    </script>
@endpush
