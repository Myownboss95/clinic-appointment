<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserBankDetails;
use Illuminate\Http\Request;

class UserBankDetailsController extends Controller
{
    public function update(Request $request, UserBankDetails $userBankDetails)
    {
        $data = $request->validate(
            [
                'bank' => ['required', 'string'],
                'accountName' => ['required', 'string'],
                'accountNumber' => ['required', 'string'],
            ]);
        $user = $request->user();
        if (! $user->bankDetail()->first()) {
            $user->bankDetail()->create($data);
            toastr()->addSuccess('Details saved successfully.');

            return back();
        }
        $user->bankDetail()->update($data);
        toastr()->addSuccess('Details updated successfully.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserBankDetails $userBankDetails)
    {
        //
    }
}
