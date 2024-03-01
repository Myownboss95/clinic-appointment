<?php

namespace App\Http\Controllers\Admin;

use App\Actions\SaveCalendlyUriAction;
use App\Constants\EventStatus;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Settings\GeneralSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Integrations\Calendly\CalendlyService;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Models\CalendlyEventType;

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

        SaveCalendlyUriAction::execute();

        $this->getEventTypes();
        toastr()->timeOut(10000)->addSuccess('Calendly Connected successfully.');
        return redirect()->route('admin.index');
    }

    protected function getEventTypes()
    {
        $events = collect($this->calendlyService->eventTypes())->each(
            function ($event) {
                if (!CalendlyEventType::where('uri', $event['uri'])->exists()) {
                    CalendlyEventType::create(
                        [
                            'uri' => $event['uri'],
                            'status' => EventStatus::ACTIVE,
                            'scheduling_url' => $event['scheduling_url'],
                        ]
                    );
                }
            }
        );
        
        
    }
}
