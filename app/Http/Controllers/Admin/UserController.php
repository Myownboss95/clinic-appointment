<?php

namespace App\Http\Controllers\Admin;

use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Settings\GeneralSettings;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Constants\TransactionReasons;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\AdminUpdateUserRequest;
use App\Notifications\UserPasswordNotification;

class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;

    }

    /**
     * Display a listing of the User.
     *
     *
     * @return Response
     */
    public function index(Request $request, GeneralSettings $generalSettings)
    {


        return view('admin.users.index', [
            'customers' => User::where('role_id', 1)->latest(),
            'customers_count' => User::where('role_id', 1)->count(),
            'new_customers_count' => User::where('role_id', 1)
            ->where('created_at', '>=', Carbon::now()->subWeek())
                ->count(),
            'appointment' => Appointment::with(['subService', 'stage'])->latest(),
            'follow_up_appointment_count' => Appointment::whereNotNull('parent_appointment_id')->count(),
            'appointment_count' => Appointment::all()->count(),
            'transactions' => Transaction::with(['user', 'appointment.subservice'])->latest(),
            'transactions_count' => Transaction::count(),
            'total_transactions' => Transaction::sum('amount'),
            'calendly_last_handshake' => 'Last handshake perfomed at' . ' ' . Carbon::parse($generalSettings->calendly_created_at)->format('l, F j, Y, g:i A'),
            'total_referral_transactions' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->sum('amount'),
            'referral_transactions_count' => Transaction::where('reason', TransactionReasons::REFERRALS->value)->count(),

        ]);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {

        $unhashedPassword = Str::random(10);
        $hashPassword = Hash::make($unhashedPassword);
        $input = array_merge($request->all(), ['password' => $hashPassword]);
        $newUser = $this->userRepository->create($input);

        $newUser->notify(new UserPasswordNotification($newUser, $unhashedPassword));

        toastr()->timeOut(10000)->addSuccess('User saved successfully.');

        return redirect(roleBasedRoute('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        $setting = app(GeneralSettings::class);

        if (empty($user)) {
            toastr()->timeOut(10000)->addError('User not found');

            return redirect(roleBasedRoute('users.index'));
        }

        return view('admin.users.show', [
            'user' => $user->load('referrals'),
            'refBonus' => $setting->ref_bonus ?? 0,

        ])->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            toastr()->timeOut(10000)->addError('User not found');

            return redirect(roleBasedRoute('users.index'));
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, AdminUpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            toastr()->timeOut(10000)->addError('User not found');

            return redirect(roleBasedRoute('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('User updated successfully.');

        return back();
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            toastr()->timeOut(10000)->addError('User not found');

            return redirect(roleBasedRoute('users.index'));
        }

        $this->userRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('User deleted successfully.');

        return redirect(roleBasedRoute('users.index'));
    }

    // public function saveUser()
}
