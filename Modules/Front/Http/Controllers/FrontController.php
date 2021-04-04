<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Job\Entities\Job;
use Modules\Jobseeker\Entities\Jobseeker;
use Modules\Employer\Entities\Employer;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Str;
use Mail;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Session;
use Modules\Jobseeker\Entities\Applied_job;
use Modules\Jobseeker\Entities\Past_experience;
use Modules\Jobseeker\Repositories\JobseekerRepository;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use function PHPUnit\Framework\isEmpty;
use Response;
use Illuminate\Support\Facades\Cookie;

class FrontController extends Controller
{
   /**
    * Display a listing of the resource.
    * @return Renderable
    */
   // public function index()
   // {
   //     return view('front::front.index');
   // }
   public function __construct(UserRepository $user, JobseekerRepository $jobseeker)
   {
      $this->user = $user;
      $this->jobseeker = $jobseeker;
      // $this->middleware('guest')->except('logout');
   }

   public function index()
   {

      $alljobs = Job::where('publish', 1)->orderBy('created_at', 'desc')->paginate(5);
      if (is_null(auth()->user())) {
         return view('front::front.index', compact('alljobs'));
      }
      // if (is_null(auth()->user())) {
      //    $alljobs = Job::where('publish', 1)->orderBy('created_at', 'desc')->paginate(5);

      return view('front::front.index', compact('alljobs'));
      // }
      // $alljobs = array();
      // $jobseeker = Jobseeker::where('user_id', auth()->id())->with('experiences')->first();
      // // dd($jobseeker->experiences->isEmpty());
      // if ($jobseeker->experiences->isEmpty()) {
      //    $searchResult = Job::latest()->where('publish', 1)->take(3)->get();

      //    if ($searchResult) {
      //       array_push($alljobs, $searchResult);
      //    }
      // }

      // // // dd($jobseeker->experiences);
      // foreach ($jobseeker->experiences as $exp) {
      //    // $exp->job_description;
      //    $searchResult = Job::whereDate('deadline_date', '>=', \Carbon\Carbon::now()->toDateString())
      //       // ->where('job_description', 'like', '%' . $exp->job_description . '%')
      //       ->orWhere('job_title', 'like', '%' . $exp->job_title . '%')->paginate(3);
      //    // ->orWhere('job_requirements', 'like', '%' . $exp->job_requirements . '%')
      //    // ->orWhere('job_duties', 'like', '%' . $exp->job_duties . '%')
      //    // ->orWhere('benefits', 'like', '%' . $exp->benefits . '%')
      //    // ->take(3)->get();
      //    // dd($searchResult, $alljobs);
      //    array_push($alljobs, $searchResult);

      //    // if (count($searchResult) > 0) {
      //    //    foreach ($searchResult as $key => $search) {
      //    //       array_push($alljobs, $search);
      //    //    }
      //    // }
      // }
      // // dd($alljobs);

      // // return view('front::front.index', compact('alljobs'));

      // // dd(auth()->user());
      // return view('front::front.index', compact('alljobs'));
   }


   public function postJobseekerLogin(Request $request)
   {
      // $url = session('__previous_url');
      // dd($url);

      $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required|min:6',

      ]);
      $user = User::where('email', $request->email)->first();


      if (!$user) {
         return back()->with('flash_message_error', 'User not found');
      }

      if (!\Hash::check($request->password, $user->password)) {
         return back()->with('flash_message_error', 'Invalid Password');
      }
      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
         Session::put('frontSession', Auth::user());

         $userStatus = User::where('email', $request->email)->first();
         if ($userStatus->verified == 0) {
            return redirect()->back()->with('flash_message_error', 'Please confirm your email to activate your account!');
         } else {
            // return redirect()->to($url)->with('student-update', 'Please update your profile.');
            // return redirect('/job-detail'.'/'.$slug);
            return redirect()->route('editProfile', auth()->user()->id);
            // return Redirect::to($url);
            // return redirect()->route('editProfile', auth()->user()->id);
            // return redirect()->intended('defaultpage');
         }
      } else {
         return redirect()->back()->with('flash_message_error', 'Invalid username or password');
      }
   }


   public function register()
   {
      return view('front::front.register');
   }

   public function postJobseekerRegister(Request $request)
   {
      $request->validate([
         'first_name' => 'required',
         'middle_name' => 'required',
         'last_name' => 'required',
         'email' => 'required|email|unique:users|max:255',
         'password' => 'required',
         'confirm_password' => 'required|min:6|same:password',
         'terms_condition' => 'required',
      ]);

      $name = explode(' ', $request->first_name);
      $username = $name[0] . rand(10, 1000);


      $formData = $request->except(['password', 'terms_condition']);
      $formData['password'] = bcrypt($request->password);
      $formData['username'] = $username;

      $formData['activation_link'] = \Str::random(63);
      $formData['name'] = $request->first_name . $request->middle_name . $request->last_name;
      $formData['terms_condition'] = is_null($request->terms_condition) ? 0 : 1;
      $form = $request->except('activation_link', 'terms_condition',  '_token');
      $formData['role'] = 'jobseeker';
      $data = $this->user->create($formData);
      $form['user_id'] = $data->id;
      $jobseeker = $this->jobseeker->create($form);
      $mail_data = [
         'name' => $formData['name'],
         'password' => $request->password,
         'email' => $request->email,
         'link' => route('verifyNewAccount', $formData['activation_link']),
         'home' => route('home'),

      ];

      Mail::send('email.account-activation-mail', $mail_data, function ($message) use ($mail_data, $request) {
         $message->to($request->email)->from('info@dentaljob.com');
         $message->subject('Please activate your account ');
      });

      return Redirect::back()->with('flash_message_error', "Please check your email for activation link");;
   }

   public function login(Request $request)
   {

      return view('front::front.login');
   }


   public function jobInner($slug)
   {
      $jobs = Job::where('slug', $slug)->first();

      $id = Auth::id();
      // dd($id);
      // $jobseeker = Jobseeker::where('user_id', $id)->first();
      // dd($this->jobseeker);
      $applied = [];
      if ($id != null) {
         $jobseeker = $this->jobseeker->with(['jobs'])->where('user_id', $id)->first();
         $applied = Applied_job::where('job_id', $jobs->id)->where('jobseeker_id', $jobseeker->id)->get();
      } else {
         $jobseeker = $this->jobseeker->with(['jobs'])->first();
      }


      $similarjobs = Job::where('id', '!=', $jobs->id)->where('job_title', 'like', '%' . $jobs->job_title . '%')
         ->whereDate('deadline_date', '<=', \Carbon\Carbon::now()->toDateString())
         ->where('job_requirements', 'like', '%' . $jobs->job_requirements . '%')->take(4)
         ->orderBy('published_date', 'DESC')
         ->get();

      if ($similarjobs->isEmpty()) {
         $similarjobs = Job::where('id', '!=', $jobs->id)
            ->whereDate('deadline_date', '>=', \Carbon\Carbon::now()->toDateString())
            ->orderBy('published_date', 'DESC')->take(4)
            ->get();
      }
      return view('front::front.job-detail', compact('jobs', 'jobseeker', 'applied', 'similarjobs'));
   }

   public function VerifyNewAccount($token, Request $request)
   {
      // dd($request);

      if ($token) {
         $length = strlen($token);

         $activatedUser = $this->user->where('activation_link', $token)->where('verified', 0)->first();
         // dd($activatedUser);
         if ($activatedUser) {

            $user =  User::where(['activation_link' => $token])->update(['verified' => 1]);
            $this->jobseeker->create(['user_id' => $activatedUser->id]);

            return redirect()->route('jobseeker.login');
         } else {
            return redirect()->route('jobseeker.register')->with('message', 'Your account is not activated.Please register again.');;
         }
      }
   }

   public function logout()
   {
      Auth::logout();
      Session::flush();
      return redirect()->route('home');
   }

   public function verificationCode(Request $request)
   {

      return view('front::front.verificationcodelink');
   }

   public function sendVerificationLink(Request $request)
   {
      $details = $this->user->where('email', $request->email)->first();
      if ($details) {
         $formData['activation_link'] = $details->activation_link;
         $mail_data = [
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'link' => route('resendVerification', $formData['activation_link']),
            'home' => route('home'),

         ];
         Mail::send('email.account-activation-mail', $mail_data, function ($message) use ($mail_data, $request) {
            $message->to($request->email)->from('info@dentaljob.com');
            $message->subject('Please activate your account ');
         });
         return redirect()->route('jobseeker.login')->withErrors(['Please check your email for activation link', 'message']);
      } else {
         return redirect()->back()->with('flash_message_error', 'Email doesnot exist!');
      }
   }
   public function resendVerification($activation_link, Request $request)
   {
      //   dd($token);

      $activatedUser = $this->user->where('activation_link', $activation_link)->where('verified', 0)->first();
      // dd($activatedUser);


      if ($activatedUser) {

         $user =  User::where(['activation_link' => $activation_link])->update(['verified' => 1]);

         return redirect()->route('jobseeker.login');
      } else {
         return redirect()->route('jobseeker.register')->with('message', 'Your account is not activated.Please register again.');;
      }
   }

   public function resetForm()
   {
      return view('front::front.password-reset');
   }

   public function profileInfo($username)
   {
      $username = Auth::user()->username;
      $user = User::where('username', $username)->first();
      return view('front::front.profile', compact('user'));
   }

   public function overview()
   {
      $searchResults = array();
      $jobseeker = Jobseeker::where('user_id', auth()->id())->with('experiences')->first();
      $applied_jobs = Applied_job::where('jobseeker_id', $jobseeker->id)->get();

      $applied_jobs_id = [];
      foreach ($applied_jobs as $item) {
         array_push($applied_jobs_id, $item->job_id);
      }


      if (count($applied_jobs_id) > 0) {
         $applies = Job::whereIn('id', $applied_jobs_id)->get();
      } else {
         $applies = [];
      }

      // dd($jobseeker->experiences->isEmpty());
      if ($jobseeker->experiences->isEmpty()) {
         $searchResult = Job::latest()->where('publish', 1)->orderby('created_at', 'desc')->take(5)->get();
         if ($searchResult) {
            array_push($searchResults, $searchResult);
         }
      }


      foreach ($jobseeker->experiences as $exp) {
         // $exp->job_description;
         $searchResult = Job::whereDate('deadline_date', '>=', \Carbon\Carbon::now()->toDateString())
            ->where('job_description', 'like', '%' . $exp->job_description . '%')
            ->orWhere('job_title', 'like', '%' . $exp->job_description . '%')
            ->orWhere('job_requirements', 'like', '%' . $exp->job_description . '%')
            ->orWhere('job_duties', 'like', '%' . $exp->job_description . '%')
            ->orWhere('benefits', 'like', '%' . $exp->job_description . '%')->take(5)->get();
         if ($searchResult) {
            array_push($searchResults, $searchResult);
         }
      }

      // dd($searchResults);

      return view('front::front.overview', compact('searchResults', 'applies'));
   }

   public function search()
   {
      $title = request()->get('title');
      $place =  request()->get('location');
      if ($title != null && $place != null) {
         $searched = Job::where('job_title', 'LIKE', "%" . $title . "%")
            ->where('location', 'LIKE', "%" . $place . "%")
            ->paginate(3);
      }

      if ($place != null && empty($title)) {
         $searched = Job::where('location', 'LIKE', "%" . $place . "%")->paginate(3);
      }
      if ($title != null && empty($place)) {
         $searched = Job::where('job_title', 'LIKE', "%" . $title . "%")->paginate(3);
      }
      return view('front::front.search', compact('searched'));
   }

   public function editProfile($id)
   {
      $id = Auth::id();
      $user = Jobseeker::where('user_id', $id)->first();
      //  dd($user);
      return view('front::front.edit-profile', compact('user'));
   }

   public function apply(Request $request)
   {
      // dd($request->all());
      $data = $request->except('_token');
      $job = Job::where('id', $request->job_id)->with('employer')->first();
      $jobseeker = Jobseeker::where('id', $request->jobseeker_id)->first();
      $applied_job = Applied_job::create($data);
      if (!$applied_job) {
         return redirect()->back()->with('message', 'Application not sent.');
      }

      $mail_data = [
         'employer_name' => $job->employer->employer_name,
         'name' => $jobseeker->first_name . ' ' . $jobseeker->middle_name . ' ' . $jobseeker->last_name,
         'job_title' => $job->job_title,
         'email' => $jobseeker->email,
      ];
      // $mail_employer = $job->employer->employer_email;
      Mail::send('email.job_application', $mail_data, function ($message) use ($mail_data, $job) {
         $message->to($job->employer->employer_email)->from($mail_data['email']);
         $message->subject('Job Application Received! ');
      });
      return redirect()->back()->with('message', 'Application sent successfully.');
   }
}
