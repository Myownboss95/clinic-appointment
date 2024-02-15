<?php

namespace App\Actions;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Data\TransactionData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Data\Calendly\CalendlyRedirectData;
use App\Notifications\PayoutReferralNotification;
use App\Notifications\SocialRegisterationNotification;

class CreateUserAction
{
    public static function execute(CalendlyRedirectData $calendlyRedirectData) : User
    {

        try {
            $user = User::where('email', $calendlyRedirectData->email)->first();
            $password = Hash::make(Str::random(10));
            if ($user) {
                auth()->login($user, true);
            }
            if (!$user) {
                // Create a new user
                $user = User::create([
                    'first_name' => $calendlyRedirectData->firstName,
                    'last_name' => $calendlyRedirectData->lastName,
                    'email' => $calendlyRedirectData->email,
                    'password' => $password,
                ]);

                $user->notify(new SocialRegisterationNotification($user, 'calendly', $password));
                // Log in the new user
                auth()->login($user, true);
            }
            return $user;


        } catch (\Throwable $th) {

        }
    }
}
