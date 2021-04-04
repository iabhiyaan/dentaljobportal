<?php

namespace Modules\Job\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Employer\Entities\Employer;
use Modules\Jobseeker\Entities\Applied_job;
use Modules\Jobseeker\Entities\Jobseeker;

class Job extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['published_date', 'deadline_date'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobseekers()
    {
        return $this->belongsToMany('Modules\Jobseeker\Entities\Jobseeker::class', 'applied_jobs', 'jobseeker_id', 'job_id');
    }
    public function jobcategory()
    {
        return $this->belongsTo('Modules\Jobcategory\Entities\Jobcategory');
    }
    public function applications()
    {
        return $this->hasMany(Applied_job::class, 'job_id');
    }
}
