<?php

namespace Modules\Front\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Modules\Employer\Repositories\EmployerRepository;
use Auth;
use Mail;

class EmployerController extends Controller
{
   protected $employer;
   protected $user;

   public function __construct(EmployerRepository $employer, UserRepository $user)
   {
      $this->employer = $employer;
      $this->user = $user;
   }

   public function postEmployerRegister(Request $request)
   {
      $request->validate([
         'name' => 'required|string',
         'email' => 'required|email|unique:users',
         'password' => 'required|confirmed',
      ]);

      $formData = $request->except(['password', 'terms-condition']);
      $formData['publish'] = 0;
      $formData['role'] = 'employer';
      $formData['password'] = bcrypt($request->password);
      $formData['activation_link'] = \Str::random(63);

      $this->user->create($formData);

      $mail_data = [
         'name' => $formData['name'],
         'email' => $request->email,
         'link' => route('employer.verifyNewAccount', $formData['activation_link']),
         'home' => route('home'),
      ];

      Mail::send('email.account-activation-mail', $mail_data, function ($message) use ($mail_data, $request) {
         $message->to($request->email)->from(env('MAIL_FROM_ADDRESS'));
         $message->subject('Please activate your account ');
      });
      return redirect()->back()->with('message', 'Please check your email. Activation link has been send');
   }

   public function VerifyNewAccount($token, Request $request)
   {
      if (!$token) {
         $request->session()->flash('error', 'Invalid Request.');
         return redirect()->route('jobseeker.register');
      }

      $length = strlen($token);

      if ($length < 63) {
         $request->session()->flash('error', 'Invalid Activation link found.');
         return redirect()->route('jobseeker.register');
      }

      $user = $this->user->where('activation_link', $token)->first();

      if (!$user) {
         $request->session()->flash('message', 'Invalid Activation link found.');
         return redirect()->route('jobseeker.register');
      }

      if ($user->activation_link == $token) {
         $user['activation_link'] = null;
         $user['publish']     = 1;
         $user['is_active']     = 1;

         $this->employer->create(['user_id' => $user->id,]);
      } else {
         $request->session()->flash('message', 'Invalid Activation link found.');
         // this register form for employer is on same page i.e on jobseeker register page
         return redirect()->route('jobseeker.register');
      }

      $success  = $user->save();

      if ($success) {
         // this login form for employer is on same page i.e on jobseeker login page
         return redirect()->route('jobseeker.login')->with(['message' => 'Thank You ! Your Account Has been Activated. Please click on employer tab', 'type' => 'success']);
      } else {
         $request->session()->flash('message', 'Sorry There was a problem while activating your  account. Please try again.');

         return redirect()->back();
      }
   }

   public function postEmployerLogin(Request $request)
   {

      $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required|min:6',
      ]);

      $user = $this->user->where('email', $request->email)->where('role', 'employer')->where('publish', 1)->first();

      if (!$user) {
         return back()->with('flash_message_error', 'User not found');
      }

      if (!\Hash::check($request->password, $user->password)) {
         return back()->with('flash_message_error', 'Invalid Password');
      }

      if ($user->role == 'employer' && $user->publish == '0') {
         return redirect()->back()->with(['message' => 'Please contact admin', 'type' => 'danger']);
      }

      if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
         return redirect()->route('employer.getProfile', $user->employer->id)->with(['message' => 'Please update your profile', 'type' => 'success']);
      } else {
         return back()->withInput()->withErrors(['email' => 'something is wrong!']);
      }
   }

   public function getEmployerProfile($employerId)
   {
      $datas['detail'] = $this->employer->findOrFail($employerId);

      return view('front::front.employer.edit-profile', $datas);
   }

   public function updateEmployerProfile(Request $request, $employerId)
   {
      $oldRecord = $this->employer->findOrFail($employerId);

      $formData = $this->employer->employerUpdate($request, $oldRecord);
      $formData['publish'] = $oldRecord->publish;

      $this->employer->update($formData, $employerId);
      return redirect()->back()->with(['message' => 'Profile updated successfully', 'type' => 'success']);
   }

   public function getCompanyProfile($employerId)
   {
      $datas['detail'] = $this->employer->findOrFail($employerId);
      return view('front::front.employer.company-profile', $datas);
   }

   public function getEmployerOverview($employerId)
   {
      $datas['detail'] = $this->employer->findOrFail($employerId);
      return view('front::front.employer.overview', $datas);
   }
}
