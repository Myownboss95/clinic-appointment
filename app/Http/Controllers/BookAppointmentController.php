<?php

namespace App\Http\Controllers;

use App\Models\SubService;

class BookAppointmentController extends Controller
{
    public function index($slug)
    {
        return view('home.book-appointment', [
            'service' => SubService::where('slug', $slug)->first(),
        ]);
    }
}
