<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Response;

class UserProfileController extends AppBaseController
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the User.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $setting = GeneralSetting::first();
        $refBonus = $setting->ref_bonus ?? 0;

        return view('user.profile', [
            'user' => $request->user()->load(['referrals', 'bankDetail']),
            'refBonus' => $refBonus,
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
