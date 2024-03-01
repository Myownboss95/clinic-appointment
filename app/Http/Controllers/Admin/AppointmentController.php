<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StageTypes;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Stage;
use App\Models\SubService;
use App\Models\User;
use App\Repositories\AppointmentRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class AppointmentController extends AppBaseController
{
    /** @var AppointmentRepository */
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepo)
    {
        $this->appointmentRepository = $appointmentRepo;
    }

    /**
     * Display a listing of the Appointment.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['subService', 'stage'])->latest();
        $pendingStage = Stage::where('name', StageTypes::PENDING->value)->first();
        $completedStage = Stage::where('name', StageTypes::COMPLETED->value)->first();

        return view('admin.appointments.index',
            [
                'customers' => User::where('role_id', 1)->latest(),
                'customers_count' => User::where('role_id', 1)->count(),
                'new_customers_count' => User::where('role_id', 1)
                    ->where('created_at', '>=', Carbon::now()->subWeek())
                    ->count(),
                'appointment' => $query->get(),
                'follow_up_appointment_count' => $query->whereNotNull('parent_appointment_id')->count(),
                'appointment_count' => $query->count(),
                'pending_appointment_count' => $pendingStage->appointments->count(),
                'new_pending_appointment_count' => $pendingStage->appointments->where('created_at', '>=', Carbon::now()->subWeek())
                    ->whereNull('end_date')->count(),
                'completed_appointment_count' => $completedStage->appointments->count(),
                'new_completed_appointment_count' => $completedStage->appointments->where('created_at', '>=', Carbon::now()->subWeek())
                    ->whereNull('end_date')->count(),
            ]);

    }

    public function pendingAppointments(Request $request)
    {
        $query = Appointment::with(['subService', 'stage'])->latest();
        $pendingStage = Stage::where('name', StageTypes::PENDING->value)->first();
        $completedStage = Stage::where('name', StageTypes::COMPLETED->value)->first();

        return view('admin.appointments.pending-appointments',
            [
                'customers' => User::where('role_id', 1)->latest(),
                'customers_count' => User::where('role_id', 1)->count(),
                'new_customers_count' => User::where('role_id', 1)
                    ->where('created_at', '>=', Carbon::now()->subWeek())
                    ->count(),
                'appointment' => $query->get(),
                'follow_up_appointment_count' => $query->whereNotNull('parent_appointment_id')->count(),
                'appointment_count' => $query->count(),
                'pending_appointment_count' => $pendingStage->appointments->count(),
                'new_pending_appointment_count' => $pendingStage->appointments->where('created_at', '>=', Carbon::now()->subWeek())
                    ->whereNull('end_date')->count(),
                'completed_appointment_count' => $completedStage->appointments->count(),
                'new_completed_appointment_count' => $completedStage->appointments->where('created_at', '>=', Carbon::now()->subWeek())
                    ->whereNull('end_date')->count(),
            ]);

    }

    /**
     * Show the form for creating a new Appointment.
     *
     * @return Response
     */
    public function create()
    {
        $appointments = new Appointment();

        return view('admin.appointments.create', [
            'stages' => Stage::get(),
            'users' => User::where('role_id', 1)->get(),
            'services' => SubService::get()
        ]);
    }

    /**
     * Store a newly created Appointment in storage.
     *
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_service_id' => 'required|integer|exists:sub_services,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($request->input('user_id'));
        $subService = SubService::findOrFail($request->input('sub_service_id'));
        session()->put('user', $user);
        session()->put('subservice', $subService);
        return redirect(roleBasedRoute('appointments.book-appointment'));
    }

    public function bookAppointment()
    {
        $user = session()->get('user');
        $service = session()->get('subservice');
        if (!$user && !User::where('id', $user->id)->exists()) {
            toastr()->timeOut(10000)->addError('Please select user again.');
            return redirect()->back();
        }
        if (!$service && !SubService::where('id', $service->id)->exists()) {
            toastr()->timeOut(10000)->addError('Please select service again.');
            return redirect()->back();
        }

        

        return view('admin.appointments.book-appointment',
                    ['user'=>$user,
                    'service' => $service ]);
    }
    /**
     * Display the specified Appointment.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $appointment = Appointment::where('id', $id)->with(['comments', 'subService', 'transaction', 'stage'])->first();

        if (empty($appointment)) {
            toastr()->timeOut(10000)->addError('Appointment not found');

            return redirect(roleBasedRoute('appointments.index'));
        }

        $allComments = $appointment->comments->sortBy('stage_id');

        $yourComments = $allComments->filter(function ($comment) {
            return $comment->author_id === auth()->user()->id;
        });

        $otherComments = $allComments->filter(function ($comment) {
            return $comment->author_id !== auth()->user()->id;
        });

        return view('admin.appointments.show', [
            'appointment' => $appointment,
            'yourComments' => $yourComments,
            'otherComments' => $otherComments,
            'stages' => Stage::get(),
        ]);
    }

    /**
     * Show the form for editing the specified Appointment.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $appointment = Appointment::where('id',$id)->with('subService')->first();

        if (empty($appointment)) {
            toastr()->timeOut(10000)->addError('Appointment not found');

            return redirect(roleBasedRoute('appointments.index'));
        }

        return view('admin.appointments.edit',
            [
                'subService_id' => $appointment->subService->first()->id,
                'subServices' => SubService::get(),
                'stages' => Stage::get(),
                'users' => User::get(),
            ]
        )->with('appointment', $appointment);
    }

    /**
     * Update the specified Appointment in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateAppointmentRequest $request)
    {
        $appointment = $this->appointmentRepository->find($id);

        if (empty($appointment)) {

            toastr()->timeOut(10000)->addError('Appointment saved successfully.');

            return redirect(roleBasedRoute('appointments.index'));
        }

        $appointment = $this->appointmentRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('Appointment updated successfully.');

        return redirect(roleBasedRoute('appointments.index'));
    }

    /**
     * Remove the specified Appointment from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'current_password'],
        ]);

        if ($validator->fails()) {
            toastr()->timeOut(10000)->addError('Incorrect Password');

            return redirect(roleBasedRoute('appointments.show', $id));
        }
        $appointment = $this->appointmentRepository->find($id);

        if (empty($appointment)) {
            toastr()->timeOut(10000)->addError('Appointment not found');

            return redirect(roleBasedRoute('appointments.index'));
        }

        $this->appointmentRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('Appointment saved successfully.');

        return redirect(roleBasedRoute('appointments.index'));
    }
}
