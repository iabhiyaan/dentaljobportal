<x-admin-layout title="Site Setting">

    <x-slot name="scripts">
        <script>
            loadImage();

        </script>
    </x-slot>

    <div class="page-content fade-in-up">
        <form method="post" action="{{ route('setting.update', $detail->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- SEO and Social Media --}}
            <div class="row">
                <div class="col-md-5">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">SEO Details</div>
                        </div>
                        <div class="ibox-body">

                            <div class="form-group">
                                <label>Page Title</label>
                                <input class="form-control" type="text" name="page_title"
                                    value="{{ $detail->page_title }}" placeholder="Enter Page Title">
                            </div>

                            <div class="form-group">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title"
                                    value="{{ $detail->meta_title }}" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{ $detail->meta_description }}"
                                    name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group">
                                <label>Meta phrase</label>
                                <input class="form-control" type="text" value="{{ $detail->meta_phrase }}"
                                    name="meta_phrase" placeholder="Enter Meta phrase">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{ $detail->keyword }}" name="keyword"
                                    placeholder="Enter Keywords">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Social Media Links</div>

                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>Facebook Link</label>
                                    <input class="form-control" type="text" value="{{ $detail->facebook }}"
                                        name="facebook" placeholder="Enter facebook link">
                                </div>
                                <div class="col-12 form-group">
                                    <label>Twitter Link</label>
                                    <input class="form-control" type="text" value="{{ $detail->twitter }}"
                                        name="twitter" placeholder="Enter twitter link">
                                </div>

                                <div class="col-12 form-group">
                                    <label>instagram Link</label>
                                    <input class="form-control" type="text" value="{{ $detail->instagram }}"
                                        name="instagram" placeholder="Enter instagram link">
                                </div>

                                <div class="col-12 form-group">
                                    <label>linked Link</label>
                                    <input class="form-control" type="text" value="{{ $detail->linkedin }}"
                                        name="linkedin" placeholder="Enter linked Link">
                                </div>

                                <div class="col-12 form-group">
                                    <label>youtube Link</label>
                                    <input class="form-control" type="text" value="{{ $detail->youtube }}"
                                        name="youtube" placeholder="Enter youtube Link">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Site Setting --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Site Setting</div>
                        </div>
                        <div class="ibox-body" style="">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Site Name</label>
                                    <input class="form-control" type="text" name="site_name"
                                        value="{{ $detail->site_name }}" placeholder="Enter Site name">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Site Images --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Site Images</div>
                        </div>
                        <div class="ibox-body" style="">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Logo Left</label>
                                    <input type="file" name="logo_left" value="{{ $detail->logo_left }}"
                                        class="form-control fileUpload">
                                    <div class="mt-2 wrapper">
                                        <div class="image-holder">
                                            @if ($detail->logo_left)
                                                <img src="{{ asset('images/main/' . $detail->logo_left) }}" alt=""
                                                    class="thumb-image w-50 my-2">
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Logo right</label>
                                    <input type="file" name="logo_right" value="{{ $detail->logo_right }}"
                                        class="form-control fileUpload">
                                    <div class="mt-2 wrapper">
                                        <div class="image-holder">
                                            @if ($detail->logo_right)
                                                <img src="{{ asset('images/main/' . $detail->logo_right) }}" alt=""
                                                    class="thumb-image w-50 my-2">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <x-slot name="styles">
        <style>
            .image-holder img {
                border: 1px solid #ccc;
                padding: 13px;
                border-radius: 10px;
            }

        </style>
    </x-slot>

</x-admin-layout>
