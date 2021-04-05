<?php

namespace Modules\user\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Employer\Repositories\EmployerRepository;
use Modules\Jobseeker\Repositories\JobseekerRepository;

class RoleUserController extends Controller
{

    public function __construct(UserRepository $user, EmployerRepository $employer, JobseekerRepository $jobseeker)
    {
        $this->user = $user;
        $this->employer = $employer;
        $this->jobseeker = $jobseeker;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->user->latest()->where('role', 'employer')->orWhere('role', 'jobseeker')->get();
        return view('user::list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'unique:users|email',
            'password' => 'required|confirmed|min:7',
        ];
        
        $name = explode(' ', $request->name);
        $username = $name[0].rand(10,1000);
        
        $request->validate($rules);

        $formData = $this->user->storeUser($request);
        $formData['is_active'] = 1;
        $formData['username'] = $username;
        // dd($formData['username']);

        $createdUser = $this->user->create($formData);
        
        if ($request->role == 'employer') {
            $this->employer->create([
                'user_id' => $createdUser->id,
            ]);
        } else if ($request->role == 'jobseeker') {
            $this->jobseeker->create([
                'user_id' => $createdUser->id,
            ]);
        }

        return redirect()->route('roleuser.index')->with('message', 'user added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->user->findOrFail($id);
        return view('user::edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old = $this->user->find($id);
       

        $sameEmailVal = $old->email == $request->email ? true : false;

        $request->validate($this->rules($old->id, $sameEmailVal));

        $formData = $this->user->updateUser($request);

        $this->user->update($formData, $id);
        return redirect()->route('roleuser.index')->with('message', 'user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroy($id);
        return redirect()->back()->with('message', 'user deleted successfully');
    }
    public function rules($oldId = null, $sameEmailVal = false)
    {
        $rules =  [
            'name' => 'required',
            'email' => 'unique:users|email',
            'password' => 'confirmed',
        ];
        if ($sameEmailVal) {
            $rules['email'] = 'unique:users,email,' . $oldId . '|max:255';
        }
        return $rules;
    }
}
