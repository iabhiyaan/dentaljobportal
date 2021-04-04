<?php

namespace Modules\Front\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Modules\Employer\Repositories\EmployerRepository;
use Auth;
use Mail;
use Modules\Job\Repositories\JobRepository;

class JobController extends Controller
{

   public function __construct(JobRepository $model)
   {
      $this->model = $model;
   }
   /**
    * Display a listing of the resource.
    * @return Renderable
    */
   public function index()
   {
      $datas['details'] = $details = $this->model->latest()->get();
      return view('front::front.employer.job.list', $datas);
   }

   /**
    * Show the form for creating a new resource.
    * @return Renderable
    */
   public function create()
   {
      return view('front::front.employer.job.create');
   }

   /**
    * Store a newly created resource in storage.
    * @param Request $request
    * @return Renderable
    */
   public function store(Request $request)
   {
      $request->validate($this->model->rules());

      $formData = $request->except(['_token',]);

      $this->model->create($formData);
      return redirect()->route('front.indexfront.employer.job.')->with('message', 'Employment salary type created successfuly.');
   }

   /**
    * Show the specified resource.
    * @param int $id
    * @return Renderable
    */
   public function show($id)
   {
      abort('404');
   }

   /**
    * Show the form for editing the specified resource.
    * @param int $id
    * @return Renderable
    */
   public function edit($id)
   {
      $datas['detail'] = $detail = $this->model->findOrFail($id);
      return view('front::front.employer.job.edit', $datas);
   }

   /**
    * Update the specified resource in storage.
    * @param Request $request
    * @param int $id
    * @return Renderable
    */
   public function update(Request $request, $id)
   {
      $request->validate($this->model->rules());

      $oldRecord = $this->model->findOrFail($id);

      $formData = $request->except(['_token',]);

      $this->model->update($formData, $id);

      return redirect()->route('front.indexfront.employer.job.')->with('message', 'Employment salary type edited successfuly.');
   }

   /**
    * Remove the specified resource from storage.
    * @param int $id
    * @return Renderable
    */
   public function destroy($id)
   {
      $oldRecord = $this->model->findOrFail($id);

      $oldRecord->delete();

      return redirect()->route('front.indexfront.employer.job.')->with('message', 'Employment salary type deleted successfuly.');
   }
}
