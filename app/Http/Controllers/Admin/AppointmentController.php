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
            'users' => User::get(),
            'subServices' => SubService::get()
        ])->with('appointment', $appointments);
    }

    /**
     * Store a newly created Appointment in storage.
     *
     *
     * @return Response
     */
    public function store(CreateAppointmentRequest $request)
    {
        $input = $request->all();
         dd($input);

        $appointment = $this->appointmentRepository->create($input);

        toastr()->addSuccess('Appointment saved successfully.');

        return redirect(roleBasedRoute('appointments.index'));
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
            toastr()->addError('Appointment not found');

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
        $appointment = $this->appointmentRepository->find($id);

        if (empty($appointment)) {
            toastr()->addError('Appointment not found');

            return redirect(roleBasedRoute('appointments.index'));
        }

        return view('admin.appointments.edit',
            [
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

            toastr()->addError('Appointment saved successfully.');

            return redirect(roleBasedRoute('appointments.index'));
        }

        $appointment = $this->appointmentRepository->update($request->all(), $id);

        toastr()->addSuccess('Appointment updated successfully.');

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
            toastr()->addError('Incorrect Password');

            return redirect(roleBasedRoute('appointments.show', $id));
        }
        $appointment = $this->appointmentRepository->find($id);

        if (empty($appointment)) {
            toastr()->addError('Appointment not found');

            return redirect(roleBasedRoute('appointments.index'));
        }

        $this->appointmentRepository->delete($id);

        toastr()->addSuccess('Appointment saved successfully.');

        return redirect(roleBasedRoute('appointments.index'));
    }
}
