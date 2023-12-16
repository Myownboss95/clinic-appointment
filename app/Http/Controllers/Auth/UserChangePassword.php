<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserChangePassword extends Controller
{
    public function index(){
        return view('auth.passwords.change');
    }

    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', Password::defaults()],
            'confirm_password' => ['required']
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        toastr()->addSuccess('Password updated successfully.');
        return back();
    }
}
