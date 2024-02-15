<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use App\Settings\GeneralSettings;
use App\Http\Integrations\Calendly\CalendlyService;

class HomeController extends Controller
{
    public function index()
    {
        $settings = app(GeneralSettings::class);
        return view('home.landing', [
            'services' => Service::all(),
            'settings' => $settings
        ]);
    }

    public function getAllSubservices(string $slug)
    {
        $settings = app(GeneralSettings::class);

        return view('home.services', [
            'services' => Service::where('slug', $slug)->with('subService')->first(),
            'settings' => $settings
        ]);
    }

    public function viewService(string $slug)
    {
        $settings = app(GeneralSettings::class);

        return view('home.subservice-page', [
            'service' => SubService::where('slug', $slug)->first(),
            'settings' => $settings

        ]);
    }

    public function calendly()
    {
        $calendlyService = new CalendlyService();
        $calendlyService->eventTypes();
    }
}
