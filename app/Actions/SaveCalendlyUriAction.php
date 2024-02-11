<?php

namespace App\Actions;

use Exception;
use Throwable;
use App\Data\TransactionData;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\DB;
use App\Notifications\PayoutReferralNotification;
use App\Http\Integrations\Calendly\CalendlyService;

class SaveCalendlyUriAction
{

    public static function execute()
    {
        try{
            $calendlyService = new CalendlyService();
            $fetchUri = $calendlyService->fetchUserURI();
            $settings = app(GeneralSettings::class);

            $settings->calendly_user_uri = $fetchUri->user_uri;
            $settings->calendly_user_email = $fetchUri->email;
            $settings->calendly_organisation = $fetchUri->organization;
            $settings->save();
        }
        catch (Throwable $th) {
            report($th);
        }
        
}
}