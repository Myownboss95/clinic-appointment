<?php

namespace App\Http\Controllers\Auth;

use Response;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\UpdateUserProfileRequest;

class UserProfileController extends AppBaseController
{
   

    public function __construct()
    {}

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       return view('user.profile')
            ->with('user', $request->user());
    }

  
     
    public function update(UpdateUserProfileRequest $request)
    {
        $user = $request->user();

        $user->update($request->all());

        toastr()->addSuccess('Profile updated successfully.');

        return redirect(roleBasedRoute('profile.index'));
    }
}