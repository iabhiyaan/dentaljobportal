<x-admin-layout title="Edit Job">
    <x-slot name="scripts">
        @include('include.ckeditorsetting')
        <script>
            loadImage();

        </script>
    </x-slot>

    <div class="page-content fade-in-up">
        <form method="POST" action="{{ route('job.update', $detail->id) }}" enctype="multipart/form-data">
            <input type="hidden" name='_token' value="{{ csrf_token() }}">
            <input type="hidden" name="id" value={{ $detail->id }}>
            <input type="hidden" name="_method" value="PUT">

            <x-job-create :jobCategories="$jobCategories" :detail="$detail">
                <x-slot name="title">
                    <div class="ibox-title">Edit Job</div>
                </x-slot>
                <div class="form-group col-md-6">
                    <label>Select Employer:</label>
                    <select type="text" class="form-control" name="employer_id" id="employer_id">
                        <option value="" selected disabled>Choose employer</option>
                        @foreach ($employers as $employer)
                            <option {{ $detail->employer_id == $employer->id ? 'selected' : null }}
                                value="{{ $employer->id }}">{{ $employer->employer_name }}
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
