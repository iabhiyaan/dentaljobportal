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
