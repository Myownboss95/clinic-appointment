<?php

namespace App\Actions;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Data\TransactionData;
use Illuminate\Support\Facades\DB;
use App\Data\CreateUserResponseData;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Data\Calendly\CalendlyRedirectData;
use App\Notifications\PayoutReferralNotification;
use App\Notifications\SocialRegisterationNotification;
use GuzzleHttp\Promise\Create;

class CreateUserAction
{
    public static function execute(CalendlyRedirectData $calendlyRedirectData) : CreateUserResponseData
    {

        try {
            $user = User::where('email', $calendlyRedirectData->email)->first();
            $password = Hash::make(Str::random(10));
            
            if (!$user) {
                // Create a new user
                $user = User::create([
                    'first_name' => $calendlyRedirectData->firstName,
                    'last_name' => $calendlyRedirectData->lastName,
                    'email' => $calendlyRedirectData->email,
                    'phone_number' => $calendlyRedirectData->phone_number,
                    'password' => $password,
                    'role_id' => 1
                ]);

                
                $user->notify(new SocialRegisterationNotification($user, 'calendly', $password));
                // Log in the new user
                auth()->login($user, true);
                return new CreateUserResponseData($user, true);
            }
            
            $user->first_name = $calendlyRedirectData->firstName;
            $user->last_name = $calendlyRedirectData->lastName;
            $user->phone_number = $calendlyRedirectData->phone_number;
            $user->save();
            $user->refresh();
            return new CreateUserResponseData($user, false);

        } catch (\Throwable $th) {
            report($th);
        }
    }
}
