<x-admin-layout title="Create job">
    <x-slot name="scripts">
        @include('include.ckeditorsetting')
        <script>
            loadImage();

        </script>
    </x-slot>

    <div class="page-content fade-in-up">
        <form method="post" action="{{ route('job.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Create Job</div>
                        </div>

                        <div class="ibox-body" style="">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Title</label>
                                    <input class="form-control" name="title" value="{{ old('title') }}" type="text"
                                        placeholder="Enter Job Title">
                                </div>

                                {{-- <div class="form-group col-md-6">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" value="{{ old('slug') }}" type="text"
                                        placeholder="Enter Job Slug">
                                </div> --}}
                            </div>

                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control" rows="8"
                                    cols="80">{{ old('short_description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="8"
                                    cols="80">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Banner Image (width: 870px, height:450px)</label>
                                <input class="form-control fileUpload" value="{{ old('image') }}" name="image"
                                    type="file">
                                <div class="mt-2 wrapper">
                                    <div class="image-holder">
                                    </div>
                                </div>
                            </div>

                            <div class="check-list">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="publish" type="checkbox" checked>
                                    <span class="input-span"></span>Publish</label>
                            </div>

                            <br>

                            <div class="form-group">
                                <button class="btn btn-default" type="submit">Submit</button>
                            </div>

                        </div>
                    </div>
            <x-job-create :jobCategories="$jobCategories">
                <x-slot name="title">
                    <div class="ibox-title">Create Job</div>
                </x-slot>
                <div class="form-group col-md-6">
                    <label>Select Employer:</label>
                    <select type="text" class="form-control" name="employer_id" id="employer_id">
                        <option value="" selected disabled>Choose employer</option>
                        @foreach ($employers as $employer)
                            <option value="{{ $employer->id }}">{{ $employer->employer_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </x-job-create>

        </form>
    </div>

    <x-slot name="styles">
        <style></style>
    </x-slot>

</x-admin-layout>
