<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV</title>
</head>

<body>

    <label>Name:</label>
    {{ $jobseeker->first_name }} {{ $jobseeker->middle_name }} {{ $jobseeker->last_name }} <br>
    <label>Email:</label>
    {{ $jobseeker->email }} <br>
    <label>Mobile No.:</label>
    {{ $jobseeker->mobile }} <br>
    <label>GDC No.:</label>
    {{ $jobseeker->gdc_number }} <br>
    <label>Country:</label>
    {{ $jobseeker->country }} <br>
    <label>City/County:</label>
    {{ $jobseeker->city_county }} <br>
    <label>Street:</label>
    {{ $jobseeker->street }} <br>
    <label>Work Experience:</label>
    @if ($jobseeker->experiences)
        <table>
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Company Name</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jobseeker->experiences as $item)
                    <tr>

                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->job_title }} </td>

                    </tr>
                @empty
                    No Jobs Experience Found!!
    @endforelse


    </tbody>
    </table>
    @endif

</body>

</html>
