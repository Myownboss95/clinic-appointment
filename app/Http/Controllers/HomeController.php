<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(){
        return view('home.landing', [
            'services' => Service::all()
        ]);
    }

    public function getAllSubservices()
    {
        return view('home.subservices', [
            'services' => Service::with('sub_service')->get()
        ]);
    }

    public function create(){
        return view('home.register');
    }
}
