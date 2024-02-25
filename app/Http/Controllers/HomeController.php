<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use App\Settings\GeneralSettings;
use App\Http\Integrations\Calendly\CalendlyService;

class HomeController extends Controller
{
    protected $settings;

    public function __construct(GeneralSettings $settings)
    {
        $this->settings = $settings;
    }

    public function index()
    {
        return view('home.landing', [
            'services' => Service::all(),
            'settings' => $this->settings
        ]);
    }

    public function getAllSubservices(string $slug)
    {
        return view('home.services', [
            'services' => Service::where('slug', $slug)->with('subService')->first(),
            'settings' => $this->settings
        ]);
    }


    public function calendly()
    {
        $calendlyService = new CalendlyService();
        $calendlyService->eventTypes();
    }
}
