 <div class="row">
     <div class="col-md-12">
         <div class="ibox">
             <div class="ibox-head">
                 {{ $title }}
             </div>

             <div class="ibox-body" style="">
                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Company Name</label>
                         <input class="form-control" name="employer_name"
                             value="{{ $detail->employer_name ?? old('employer_name') }}" type="text"
                             placeholder="Enter Company Name">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Job Category:</label>
                         <select type="text" class="form-control" name="jobcategory_id" id="jobcategory_id">
                             <option value="" selected disabled>Choose Job Category</option>
                             @foreach ($jobCategories as $jobCategory)
                                 @if (isset($detail))
                                     <option value="{{ $jobCategory->id }}"
                                         {{ $detail->jobcategory_id == $jobCategory->id ? 'selected' : '' }}>
                                         {{ $jobCategory->title }}
                                     </option>
                                 @else
                                     <option value="{{ $jobCategory->id }}">
                                         {{ $jobCategory->title }}
                                     </option>
                                 @endif
                             @endforeach
                         </select>
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Job Title</label>
                         <input class="form-control" name="job_title"
                             value="{{ $detail->job_title ?? old('job_title') }}" type="text"
                             placeholder="Enter Job Title">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Job Reference Id:</label>
                         <input class="form-control" name="job_reference_id"
                             value="{{ $detail->job_reference_id ?? old('job_reference_id') }}" type="text"
                             placeholder="Enter Job Reference ID">
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Type of Employment</label>
                         <select name="type_of_employment" class="form-control">
                             <option value="" selected disabled>--Please Select Type</option>
                             @foreach ($dashboard_employmentTypes as $employmentType)
                                 @if (isset($detail->type_of_employment))
                                     <option value="{{ $employmentType->id }}"
                                         {{ $detail->type_of_employment == $employmentType->id ? 'selected' : '' }}>
                                         {{ $employmentType->title }}
                                     </option>
                                 @else
                                     <option value="{{ $employmentType->id }}"> {{ $employmentType->title }} </option>
                                 @endif
                             @endforeach
                         </select>


                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Where will employee report to?</label>
                         <input class="form-control" name="employee_reporting"
                             value="{{ $detail->employee_reporting ?? old('employee_reporting') }}" type="text"
                             placeholder="Enter Job Title">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Country</label>
                         <input class="form-control" name="country" value="{{ $detail->country ?? old('country') }}"
                             type="text" placeholder="Enter Country">
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Town/City/County</label>
                         <input class="form-control" name="town_city"
                             value="{{ $detail->town_city ?? old('town_city') }}" type="text"
                             placeholder="Enter Town/City/County">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Street Address</label>
                         <input class="form-control" name="street_address"
                             value="{{ $detail->street_address ?? old('street_address') }}" type="text"
                             placeholder="Enter Street Address">
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Postal Code</label>
                         <input class="form-control" name="post_code"
                             value="{{ $detail->post_code ?? old('post_code') }}" type="text"
                             placeholder="Enter Postal Code'">
                     </div>


                     <div class="form-group col-md-6">
                         <label>Number of hires</label>
                         <input class="form-control" name="number_of_vacancy"
                             value="{{ $detail->number_of_vacancy ?? old('number_of_vacancy') }}" type="text"
                             placeholder="Enter Number Of Hires">
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Is there a planned start date for this job?</label>
                         <input type="radio" name="start_date" value="yes"
                             {{ isset($detail) && $detail->start_date == 'yes' ? 'checked' : null }}>
                         Yes
                         <input type="radio" name="start_date" value="no"
                             {{ isset($detail) && $detail->start_date == 'no' ? 'checked' : null }}>No

                     </div>

                     <div class="form-group col-md-6">
                         <label>How do you want to receive application?</label>
                         <?php if (isset($detail->application_receive)) {
                         $application_received = explode(',', $detail->application_receive);
                         $email = $application_received[0];
                         $phone = $application_received[1];
                         } ?>
                         <input type="checkbox" id="customCheck" name="application_receive_email"
                             {{ @$email == 'email_ok' ? 'checked' : '' }}>
                         <label>Email</label>
                         <input type="checkbox" id="customCheck" name="application_receive_phone"
                             {{ @$phone == 'phone_ok' ? 'checked' : '' }}>
                         <label>Contact</label>
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Do you want to submit resume?</label>
                         <input type="radio" name="resume_receive" value="yes"
                             {{ isset($detail->resume_receive) && $detail->resume_receive == 'yes' ? 'checked' : null }}>Yes
                         <input type="radio" name="resume_receive" value="no"
                             {{ isset($detail->resume_receive) && $detail->resume_receive == 'no' ? 'checked' : null }}>No
                     </div>

                     <div class="form-group col-md-6">
                         <label>Job Status</label>
                         <input type="radio" name="job_status" value="open"
                             {{ isset($detail->job_status) && $detail->job_status == 'open' ? 'checked' : null }}>No

                         >Open
                         <input type="radio" name="job_status" value="paused"
                             {{ isset($detail->job_status) && $detail->job_status == 'paused' ? 'checked' : null }}>Paused
                         <input type="radio" name="job_status" value="closed"
                             {{ isset($detail->job_status) && $detail->job_status == 'closed' ? 'checked' : null }}>Closed

                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-md-6">
                         <label>Type of Salary</label>
                         <select name="salary_type" class="form-control">
                             <option value="" selected disabled>Please Select Type</option>
                             @foreach ($dashboard_salaryTypes as $salaryType)
                                 <option value="{{ $salaryType->id }}"
                                     {{ $detail!=null && $detail->type == $salaryType->id ? 'selected' : '' }}>
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
                                 @if (isset($detail->salary))
                                     <option value="{{ $salary }}" {{ $detail->salary == $salary ? 'selected' : '' }}>
                                         {{ $salary }}
                                     </option>
                                 @else
                                     <option value="{{ $salary }}">
                                         {{ $salary }}
                                     </option>
                                 @endif
                             @endforeach
                         </select>
                     </div>

                     <div class="form-group col-md-12">
                         <label>Salary benefits</label>
                         <textarea name="benefits" class="form-control" rows="8"
                             cols="80">{{ $detail->benefits ?? old('benefits') }}</textarea>
                     </div>
                 </div>



                 <div class="row">
                     <div class="form-group col-md-12">
                         <label>Job Description</label>
                         <textarea name="job_description" class="form-control" rows="8"
                             cols="80">{{ $detail->job_description ?? old('job_description') }}</textarea>
                     </div>
                 </div>


                 <div class="check-list">
                     <label class="ui-checkbox ui-checkbox-primary">
                         <input name="publish" type="checkbox"
                             {{ isset($detail->publish) && $detail->publish ? 'checked' : null }}>
                         <span class="input-span"></span>Publish</label>
                 </div>

                 <br>

                 <div class="form-group">
                     <button class="btn btn-default" type="submit">Submit</button>
                 </div>

             </div>
         </div>
     </div>
 </div>
