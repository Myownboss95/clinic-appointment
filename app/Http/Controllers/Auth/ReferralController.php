<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    //
    public function __invoke(Request $request, $id)
    {
        $request->session()->put('data', ['regToken' => $id]);

        return redirect()->route('register');
    }
}
