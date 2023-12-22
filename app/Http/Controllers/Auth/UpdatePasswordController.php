<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordController extends Controller
{

    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults()],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        toastr()->addSuccess('Password updated successfully.');
        return back();
    }
}
