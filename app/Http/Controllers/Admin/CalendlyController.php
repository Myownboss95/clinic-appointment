<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Settings\GeneralSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Integrations\Calendly\CalendlyService;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;

class CalendlyController extends Controller
{
    public function __construct(protected CalendlyService $calendlyService)
    {
        //
    }

    public function init()
    {
        return redirect($this->calendlyService->getRedirectUrl());
    }

    public function handleCallback(Request $request)
    {
        $code = $request->input('code');

        $state = $request->input('state');

        $authenticator = $this->calendlyService->getAccessToken($code, $state);


        $settings = app(GeneralSettings::class);
        $settings->calendly_access_token = $authenticator->getAccessToken();
        $settings->calendly_refresh_token = $authenticator->getRefreshToken();
        $settings->calendly_expires_at = $authenticator->getExpiresAt();
        $settings->calendly_created_at = now();
        $settings->save();

        toastr()->addSuccess('Calendly Connected successfully.');
        return redirect()->route('admin.index');
    }

    public function getEventTypes()
    {
        dd($this->calendlyService->eventTypes());
    }
}
