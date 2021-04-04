<?php

namespace App\ViewComposer;

use Illuminate\View\View;
use Modules\EmploymentSalaryType\Repositories\EmploymentSalaryTypeRepository;
use Modules\Setting\Repositories\SettingRepository;
use Illuminate\Support\Facades\Auth;
use DB;
use Modules\Jobseeker\Entities\Jobseeker;

class ViewComposer
{
    protected $profile_progress = null;
    public function __construct(SettingRepository $setting, EmploymentSalaryTypeRepository $employmentSalaryType, Jobseeker $jobseeker)
    {
        $this->setting = $setting;
        $this->employmentSalaryType = $employmentSalaryType;
        $this->jobseeker = $jobseeker;
    }

    public function compose(View $view)
    {
        $profile_progress = 0;
        if (auth()->user() && auth()->user()->role == 'jobseeker') {
            $profile_progress = $this->profile(Auth::id());
        }
        // dd($profile_progress);
        $settings = $this->setting->first();
        $roles = ['employer', 'jobseeker',];
        $employees_size = ['1-49', '50-149', '150-249', '250-449', '450-749', '750-1000', '1000+',];
        $salaryRange = ['Negotiable', '10-20K', '20-30K', '30-40K', '40-50K', '50-60K', '60-70K', '70-80K', 'More than 80K'];


        $employmentTypes = $this->employmentSalaryType->where('type', 'employment')->get();
        $salaryTypes = $this->employmentSalaryType->where('type', 'salary')->get();
        $view->with([
            'dashboard_composer' => $settings,
            'dashboard_roles' => $roles,
            'dashboard_employees_size' => $employees_size,
            'dashboard_employmentTypes' => $employmentTypes,
            'dashboard_salaryTypes' => $salaryTypes,
            'dashboard_salary' => $salaryRange,
            'profile_progres' => $profile_progress,
        ]);
    }

    public function profile($id)
    {
        $profile_progress = 0;
        $total_field = 18;
        // $percent = $field / $total_field * 100;
        $null_field_count = 0;

        //jobseeker
        $fields = DB::getSchemaBuilder()->getColumnListing('jobseekers');
        $exclude = array('user_id', 'middle_name', 'id', 'cv', 'created_at', 'updated_at', 'mobile_number', 'gender', 'city', 'preferred_time', 'interest');
        $filtered = array_diff($fields, $exclude);

        //past_exps
        $fields1 = DB::getSchemaBuilder()->getColumnListing('past_experiences');
        $exclude1 = array('jobseeker_id', '_token', 'id', 'current_working', 'work_duration_from', 'work_duration_to', 'job_description', 'created_at', 'updated_at');
        $filtered1 = array_diff($fields1, $exclude1);

        //additional_docs
        $fields2 = DB::getSchemaBuilder()->getColumnListing('additional_documents');
        $exclude2 = array('jobseeker_id', 'id', 'created_at', 'updated_at');
        $filtered2 = array_diff($fields2, $exclude2);


        if ($id != null) {
            $jobseeker = Jobseeker::where('user_id', $id)->with('experiences')->with('documents')->first();
            // dd(count($filtered));
            for ($i = 0; $i < count($filtered); $i++) {
                if ($jobseeker[array_values($filtered)[$i]] == null) {
                    $null_field_count += 1;
                }
            }
            if ($jobseeker->experiences->isEmpty()) {
                $null_field_count = 4;
            } else {
                foreach ($jobseeker->experiences as $exp) {
                    for ($i = 0; $i < count($filtered1); $i++) {
                        // dd($jobseeker->experiences[array_values($filtered1)[$i]]);
                        // dd($exp);
                        if ($exp[array_values($filtered1)[$i]] == null) {
                            $null_field_count += 1;
                        }
                    }
                }
            }

            if ($jobseeker->documents->isEmpty()) {
                $null_field_count += 1;
            } else {
                foreach ($jobseeker->documents as $doc) {
                    for ($i = 0; $i < count($filtered2); $i++) {
                        if ($doc[array_values($filtered2)[$i]] == null) {
                            $null_field_count += 1;
                        }
                    }
                }
            }

            $profile_progress = (($total_field - $null_field_count) / $total_field) * 100;

            $profile_progress = number_format((float)$profile_progress);
        }

        return $profile_progress;
    }
}
