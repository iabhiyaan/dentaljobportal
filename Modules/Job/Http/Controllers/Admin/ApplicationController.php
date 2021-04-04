<?php

namespace Modules\Job\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Employer\Repositories\EmployerRepository;
use Modules\Job\Repositories\JobRepository;
use Modules\Jobseeker\Repositories\JobseekerRepository;

class ApplicationController extends Controller
{
   protected $job;
   protected $jobseeker;
   protected $employer;

   public function __construct(JobRepository $job, JobseekerRepository $jobseeker, EmployerRepository $employer)
   {
      $this->job = $job;
      $this->jobseeker = $jobseeker;
      $this->employer = $employer;
   }

   public function allApplications($jobId)
   {
      $datas['details'] = $this->job->with(['applications.jobseeker'])->findOrFail($jobId);

      return view('job::admin.applications.allApplications', $datas);
   }

   public function jobseekerInfos($jobSeekerId)
   {
      $datas['detail'] = $this->jobseeker->findOrFail($jobSeekerId);
      return view('job::admin.applications.jobseeker', $datas);
   }

   public function downloadCV($jobSeekerId)
   {
      $pdfInfos = $this->job->downloadCV($jobSeekerId);
      [$jobseeker, $pdf] = $pdfInfos;
      return $pdf->download($jobseeker->first_name ? $jobseeker->first_name . '-cv.pdf' : 'jobseeker-cv.pdf');
   }
}
