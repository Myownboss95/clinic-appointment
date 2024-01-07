<?php

namespace App\Http\Controllers\Auth;

use App\Actions\SaveReferralCreditTransactionAction;
use App\Constants\PaymentChannels;
use App\Constants\TransactionReasons;
use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
use App\Data\TransactionData;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\PaymentChannel;
use App\Models\User;
use App\Notifications\CreditReferralWalletNotification;
use App\Notifications\SocialRegisterationNotification;
use App\Providers\RouteServiceProvider;
use App\Services\LocationService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $service = new LocationService();

        return view('auth.register', [
            'countries' => $service->countries(),
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255', 'unique:users,phone_number'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referred_by_user_id' => $this->getReferralId(),
        ]);

        return $user;

    }

    protected function getReferralId()
    {
        $refCode = collect(session('data'))->get('regToken') ?? null;
        // dd($refCode);
        if (blank($refCode)) {
            return null;
        }

        $referredUser = User::where('referral_code', $refCode)->first();
        if (! $referredUser) {
            return null;
        }

        //get the system referral bonus
        $setting = GeneralSetting::first();
        $refBonus = $setting->ref_bonus ?? 0;

        //save transaction and credit referrers wallet
        $paymentChannel = PaymentChannel::where('bank_name', PaymentChannels::ADMIN->value)->first();
        $transactionData = new TransactionData($refBonus,
            TransactionStatusTypes::PENDING,
            TransactionTypes::CREDIT,
            $referredUser,
            $paymentChannel,
            TransactionReasons::REFERRALS,
        );
        SaveReferralCreditTransactionAction::execute($transactionData);

        $referredUser->refresh();
        $referredUser->notify(new CreditReferralWalletNotification($referredUser, $refBonus));

        return $referredUser->id;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        }
        if (! $existingUser) {
            // Create a new user
            $newUser = User::create([
                'first_name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(Str::random(10)),
                'referred_by_user_id' => $this->getReferralId(),
            ]);

            $newUser->notify(new SocialRegisterationNotification($newUser, 'google'));
            // Log in the new user
            auth()->login($newUser, true);
        }

        return redirect(RouteServiceProvider::HOME);
    }

    protected function authenticated(Request $request, $user)
    {
        session()->forget('data');

        return redirect()->route(
            $user->role_id == 3
            ? 'admin.index'
            : ($user->role_id == 2
                ? 'staff.index'
                : 'user.index')

        );
    }
}
