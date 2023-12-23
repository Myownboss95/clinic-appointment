<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Foundation\Auth\RegistersUsers;


class BookAppointmentController extends Controller
{

    public function index($slug){
        return view('home.book-appointment', [
            'service' =>  SubService::where('slug', $slug)->first()
        ]);
    }
     
}
