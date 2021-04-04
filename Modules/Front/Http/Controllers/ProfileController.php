<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Jobseeker\Entities\Jobseeker;
use Modules\Jobseeker\Entities\Additional_document;
use Modules\Jobseeker\Repositories\JobseekerRepository;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Modules\Jobseeker\Entities\Applied_job;
use Modules\Job\Entities\Job;
use Modules\Front\Entities\Profile;
use File, PDF;
use Modules\Jobseeker\Entities\Past_experience;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Validation\ValidatesRequests;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function __construct(JobseekerRepository $jobseeker)
  {
    $this->jobseeker = $jobseeker;
  }

  public function profileInfo($username)
  {
    $username = Auth::user()->username;
    $user = User::where('username', $username)->first();
    $id = Auth::id();

    $jobseeker = Jobseeker::with(['experiences', 'documents'])->where('user_id', $id)->first();
    return view('front::front.profile', compact('user', 'jobseeker'));
  }

  public function editProfile($id)
  {
    $id = Auth::id();
    $user = Jobseeker::where('user_id', $id)->with('experiences')->first();
    // $user = Jobseeker::where('user_id', $id)->first();
    //   $detail = $this->jobseeker->findOrFail($id);
    //   dd($detail);
    // dd($user);
    return view('front::front.edit-profile', compact('user'));
  }

  public function updateProfile(Request $request)
  {
    $id = Auth::id();
    $old = $this->jobseeker->where('user_id', $id)->firstOrFail();
    //   dd($request->all());
    //   dd($id);
    $request->validate($this->rules());
    $value = $request->except('profile_image', 'resume', 'cover_letter', '_token');

    if ($request->hasFile('profile_image')) {
      if ($old->profile_image) {
        $this->unlinkImage($old->profile_image);
      }
      $value['profile_image'] = $this->imageProcessing($request->file('profile_image'));
    }

    if ($request->hasFile('resume')) {
      if ($old->resume) {
        $this->unlinkImage($old->resume);
      }
      $value['resume'] = $this->documentProcessing($request->resume);
    }

    if ($request->hasFile('cover_letter')) {
      if ($old->cover_letter) {
        $this->unlinkImage($old->cover_letter);
      }
      $value['cover_letter'] = $this->documentProcessing($request->cover_letter);
    }

    $value['user_id'] = Auth::id();
    // dd($value);
    $this->jobseeker->updateJobSeekerProfile($value, Auth::id());
    return redirect()->back()->with('message', 'Jobseeker Added Succssfully');
  }

  //  public function updateExperience(Request $request){
  //   $res = array('msg' => 'Something is wrong');

  //     $data = $request->all();
  //     // dd($data);
  //     $save= new Past_experience();
  //     // $additionaldocs->insert($temp);
  //     $save->insert($data);
  //     if($save){
  //         $res = array('msg' => 'Form data submitted succesfully');
  //     }
  //     return response()->json($res);
  //  }

  public function updateExperience(Request $request)
  {
    // dd($request->all());
    $data = $request->all();
    $id = Auth::id();
    $jobseeker = Jobseeker::where('user_id', $id)->with('experiences')->first();
    // dd($jobseeker);
    $this->validate($request, [
      'start_date'    => 'required',
      'end_date' => 'required',
      'job_title' => 'required',
      'company_name' => 'required',

    ]);
    $value = $request->except('_token');
    foreach ($value['job_title'] as $item) {
      $attributes = new Past_experience();
      $attributes->jobseeker_id = $jobseeker->id;
      $attributes->job_title = $item;

      foreach ($data['start_date'] as $value)
        $attributes->start_date = $value;
      foreach ($data['end_date'] as $value)
        $attributes->end_date = $value;
      foreach ($data['company_name'] as $value)
        $attributes->company_name = $value;
      $attributes->save();
    }


    // $this->jobseeker->updatePastExperience($value, Auth::id());
    return redirect()->back()->with('Past experience Added Succssfully');
    // return redirect()->back()->with(['message' => 'Past experience Added Succssfully', 'jobseeker' => $jobseeker]);
    // return redirect()->back()->with(compact('jobseeker'));
  }

  public function additionalDocuments(Request $request)
  {
    //   dd($request->all());
    $id = Auth::id();
    $data = $request->documents;
    $jobseeker = Jobseeker::where('user_id', $id)->first();
    //   dd($jobseeker);

    //   dd($data);

    if ($request->documents) {
      $path = public_path() . '/files';
      if (!File::exists($path)) {
        File::makeDirectory($path, 0777, true, true);
      }
      $temp = array();
      foreach ($request->documents as  $item) {
        //   dd($item->getClientOriginalExtension());
        $documentName =  "document-" . date('Ymdhis') . rand(0, 1234) . "." . $item->getClientOriginalExtension();
        // dd( $imageName);
        $item->move($path, $documentName);

        $temp[] = array(
          'jobseeker_id' => $jobseeker->id,
          'documents' => $documentName
        );
      }
      $additionaldocs = new Additional_document();
      $additionaldocs->insert($temp);
    }
    return redirect()->back()->with('message', 'Documents Added Succssfully');
  }

  public function appliedJobs()
  {
    $jobseeker = Jobseeker::where('user_id', auth()->id())->first();
    // dd($jobseeker);
    $applied_jobs = Applied_job::where('jobseeker_id', $jobseeker->id)->get();
    // dd($applied_jobs);
    $applied_jobs_id = [];
    foreach ($applied_jobs as $item) {
      array_push($applied_jobs_id, $item->job_id);
    }
    // dd($applied_jobs_id);
    if (count($applied_jobs_id) > 0) {
      $applies = Job::whereIn('id', $applied_jobs_id)->get();
    } else {
      $applies = [];
    }
    // dd($applies);
    // return view('front::front.all-applied-jobs', compact('applies'));
    return redirect()->back()->with('message', 'Application sent successfully');
  }

  public function allJobs()
  {
    $alljobs = Job::whereDate('deadline_date', '>=', \Carbon\Carbon::now()->toDateString())->where('publish', 1)->orderBy('created_at', 'desc')->take(6)
      ->get();
    // dd($alljobs);
    return view('front::front.all-job', compact('alljobs'));
  }

  public function imageProcessing($profile_image)
  {
    $input['imagename'] = time() . '.' . $profile_image->getClientOriginalExtension();
    $thumbPath = public_path('images/thumbnail');
    $mainPath = public_path('images/main');
    $listingPath = public_path('images/listing');

    $img1 = Image::make($profile_image->getRealPath());
    $img1->save($mainPath . '/' . $input['imagename']);
    $img2 = Image::make($profile_image->getRealPath());
    $img2->save($listingPath . '/' . $input['imagename']);
    $img1 = Image::make($profile_image->getRealPath());
    $img1->fit(90, 100)->save($thumbPath . '/' . $input['imagename']);

    $destinationPath = public_path('/images');
    return $input['imagename'];
  }

  public function documentProcessing($document)
  {
    $input['documentName'] = "document-" . date('Ymdhis') . rand(0, 1234) . "." . $document->getClientOriginalExtension();
    $document->move(public_path('files'), $input['documentName']);
    return $input['documentName'];
  }

  public function rules()
  {

    $rules =  [
      'first_name' => 'required',
      'middle_name' => 'nullable',
      'last_name' => 'required',
      'email' => 'max:255',
      'mobile' => 'required|min:7|max:15',
      'gdc_number' => 'required|min:2|max:10',
      'country' => 'required',
      'street' => 'required',
      'city_county' => 'required',
      'postal_code' => 'required',
      'profile_image' => 'mimes:jpeg,png,jpg',
      'resume' => 'mimes:pdf',
      'cover_letter' => 'mimes:pdf',

    ];

    return $rules;
  }

  public function unlinkImage($imagename)
  {
    $thumbPath = public_path('images/thumbnail/') . $imagename;
    $mainPath = public_path('images/main/') . $imagename;
    $listingPath = public_path('images/listing/') . $imagename;
    $documentPath = public_path('files/') . $imagename;
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
}
