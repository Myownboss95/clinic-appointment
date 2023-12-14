<?php

namespace App\Http\Controllers\Auth;

use Response;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
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
        $setting = GeneralSetting::first();
        $refBonus = $setting->ref_bonus ?? 0;
        
        return view('user.profile', [
                'user' => $request->user()->load('referrals'),
                'refBonus' => $refBonus
       ]);
    }

  
     
    public function update(UpdateUserProfileRequest $request)
    {
        $user = $request->user();

        $user->update($request->all());

        toastr()->addSuccess('Profile updated successfully.');

        return redirect(roleBasedRoute('profile.index'));
    }
}