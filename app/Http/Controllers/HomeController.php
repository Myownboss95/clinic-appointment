<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Foundation\Auth\RegistersUsers;


class HomeController extends Controller
{

    public function index(){
        return view('home.landing', [
            'services' => Service::all()
        ]);
    }

    public function getAllSubservices(string $slug)
    {
        // dd(Service::where('slug', $slug)->with('subService')->first());
        return view('home.services', [
            'services' =>  Service::where('slug', $slug)->with('subService')->first()
        ]);
    }

    public function viewService(string $slug){
        return view('home.subservice-page', [
            'service' =>  SubService::where('slug', $slug)->first()
        ]);
    }

    public function bookAppointment()
    {
        
    }
     
}
