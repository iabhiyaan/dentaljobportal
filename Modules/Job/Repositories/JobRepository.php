<?php

namespace Modules\Job\Repositories;

use Modules\Job\Entities\Job;
use App\Repositories\Crud\CrudRepository;
use Carbon\Carbon;
use Image;
use Modules\Jobseeker\Repositories\JobseekerRepository;
use PDF, Auth;

class JobRepository extends CrudRepository implements JobInterface
{
	public function __construct(Job $model, JobseekerRepository $jobseeker)
	{
		$this->model = $model;
		$this->jobseeker = $jobseeker;
	}

	public function create($data)
	{
		$data['employer_id'] = Auth::id();
		$detail = $this->model->create($data);
		return $detail;
	}

	public function update($data, $id)
	{
		return $this->model->find($id)->update($data);
	}

	public function jobStore($request)
	{
		$request->validate([
			'job_title' => 'required',
			'country' => 'required',
            'jobcategory_id' => 'required|numeric',
            'published_date' => 'required',
		]);

		$formData = $request->except(['image', 'publish', 'application_receive_email', 'application_receive_phone']);

		$formData['publish'] = is_null($request->publish) ? 0 : 1;

		$application_received_email = '';
		$application_received_phone = '';
		$a = $request['application_receive_email'];
		$b = $request['application_receive_phone'];
		$a == 'on' ? $a_email = 'email_ok' : $a_email = 'email_not_ok';
		$b == 'on' ? $b_phone = 'phone_ok' : $b_phone = 'phone_not_ok';

		$formData['application_receive'] = $a_email . ',' . $b_phone;

		if ($request->hasFile('image')) {
			$formData['image'] = $this->imageProcessing($request->image, 870, 450, 'yes');
		}

		$timeNow=$this->getDateTime(); 

        $pub_date = $request->published_date. ' ' .$timeNow; //adds time to date coming from create form 
       
        $dead_date = $request->deadline_date. ' ' .$timeNow; //adds time to date coming from create form

        $formData['published_date']=$pub_date;
        $formData['deadline_date']=$dead_date;
        

		return $formData;
	}

	public function jobsUpdate($request, $oldRecord)
	{
		$request->validate([
            'job_title' => 'required',
            'country' => 'required',
            'jobcategory_id' => 'required|numeric',
            'published_date' => 'required',
        ]);
		$formData = $request->except(['image', 'publish', 'application_receive_email', 'application_receive_phone']);

		$formData['publish'] = is_null($request->publish) ? 0 : 1;

		$application_received_email = '';
		$application_received_phone = '';
		$a = $request['application_receive_email'];
		$b = $request['application_receive_phone'];
		$a == 'on' ? $a_email = 'email_ok' : $a_email = 'email_not_ok';
		$b == 'on' ? $b_phone = 'phone_ok' : $b_phone = 'phone_not_ok';

		$formData['application_receive'] = $a_email . ',' . $b_phone;

		if ($request->hasFile('image')) {
			if ($oldRecord->image) {
				$this->unlinkImage($oldRecord->image);
			}
			$formData['image'] = $this->imageProcessing($request->image, 870, 450, 'yes');
		}

		$timeNow=$this->getDateTime(); 
       
        $pub_date = $request->published_date. ' ' .$timeNow; //adds time to date coming from create form 
        $dead_date = $request->deadline_date. ' ' .$timeNow; //adds time to date coming from create form 

        $formData['published_date']=$pub_date;
        $formData['deadline_date']=$dead_date;

		return $formData;
	}

	// public function jobUpdate($request, $oldRecord)
	// {
	// 	$request->validate($this->rules(), $this->messages());

	// 	$formData = $request->except(['profile_image', 'publish',]);

	// 	$formData['publish'] = is_null($request->publish) ? 0 : 1;

	// 	if ($request->profile_image) {

	// 		if ($oldRecord->profile_image) {
	// 			$this->unlinkImage($oldRecord->profile_image);
	// 		}

	// 		$profile_image = $request->file('profile_image');
	// 		$imageName = Date("D-h-i-s") . '-' . rand() . '.' . $profile_image->getClientOriginalExtension();
	// 		$profile_image->move(public_path('images/main'), $imageName);
	// 		$formData['profile_image'] = $imageName;
	// 	}

	// 	return $formData;
	// }

	public function downloadCV($jobSeekerId)
	{
		$jobseeker = $this->jobseeker->with(['experiences', 'documents'])->findOrFail($jobSeekerId);
		$pdf = PDF::loadView('front::front.cv', compact('jobseeker'));
		return [$jobseeker, $pdf];
	}

	public function rules()
	{
		return  [
			'profile_image' => 'max:3048',
			'facebook' => 'nullable|url',
			'twitter' => 'nullable|url',
			'youtube' => 'nullable|url',
			'instagram' => 'nullable|url',
			'linkedin' => 'nullable|url',
			'whatsapp' => 'nullable|url',
		];
	}

	public function messages()
	{
		return  [
			'facebook.url' => 'facebook link must be url',
			'twitter.url' => 'twitter link must be url',
			'youtube.url' => 'youtube link must be url',
			'instagram.url' => 'instagram link must be url',
			'linkedin.url' => 'linkedin link must be url',
			'whatsapp.url' => 'whatsapp link must be url',
		];
	}

	public function imageProcessing($image, $width, $height, $otherpath)
	{

		$input['imagename'] = Date("D-h-i-s") . '-' . rand() . '.' . $image->getClientOriginalExtension();
		$thumbPath = public_path('images/thumbnail');
		$mainPath = public_path('images/main');
		$listingPath = public_path('images/listing');

		$img = Image::make($image->getRealPath());
		$img->fit($width, $height)->save($mainPath . '/' . $input['imagename']);

		// with no fit
		// $img->save($mainPath . '/' . $input['imagename']);

		if ($otherpath == 'yes') {
			$img->fit($width / 2, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save($listingPath . '/' . $input['imagename']);

			$img->fit(200, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save($thumbPath . '/' . $input['imagename']);
		}

		$img->destroy();
		return $input['imagename'];
	}

	public function unlinkImage($imagename)
	{
		$thumbPath = public_path('images/thumbnail/') . $imagename;
		$mainPath = public_path('images/main/') . $imagename;
		$listingPath = public_path('images/listing/') . $imagename;
		$documentPath = public_path('document/') . $imagename;
		if (file_exists($thumbPath)) {
			unlink($thumbPath);
		}

		if (file_exists($mainPath)) {
			unlink($mainPath);
		}

		if (file_exists($listingPath)) {
			unlink($listingPath);
		}

		if (file_exists($documentPath)) {
			unlink($documentPath);
		}
		return;
	}

	public function getDateTime(){
        $dtutc=Carbon::now(); //gives today's date, time and others like UTC, etc.
        $t=$dtutc->totimeString(); //extracts only time 
        
        return $t;
    }
}
