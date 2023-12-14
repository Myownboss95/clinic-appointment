<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReferralController extends Controller
{
    //
    public function __invoke(Request $request, $id)
    {
        $request->session()->put('data', ['regToken' => $id]);
        return redirect()->route('register');
    }
}
