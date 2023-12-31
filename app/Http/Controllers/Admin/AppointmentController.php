<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StageTypes;
use Flash;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Stage;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Constants\TransactionReasons;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AppointmentRepository;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends AppBaseController
{
    /** @var AppointmentRepository $appointmentRepository*/
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepo)
    {
        $this->appointmentRepository = $appointmentRepo;
    }

    /**
     * Display a listing of the Appointment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['subService', 'stage'])->latest();
        $pendingStage = Stage::where('name', StageTypes::APPOINTMENT_SCHEDULING->value)->first(); 
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
            'pending_appointment_count' =>$pendingStage->appointments->count(),
            'new_pending_appointment_count' => $pendingStage->appointments->where('created_at', '>=', Carbon::now()->subWeek())
                                                ->whereNull('end_date')->count(),
            'completed_appointment_count' =>$completedStage->appointments->count(),
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
            'users' => User::get()
        ])->with('appointment', $appointments);
    }

    /**
     * Store a newly created Appointment in storage.
     *
     * @param CreateAppointmentRequest $request
     *
     * @return Response
     */
    public function store(CreateAppointmentRequest $request)
    {
        $input = $request->all();

        $appointment = $this->appointmentRepository->create($input);

        toastr()->addSuccess('Appointment saved successfully.');

        return redirect(roleBasedRoute('appointments.index'));
    }

    /**
     * Display the specified Appointment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $appointment = $this->appointmentRepository->find($id);

        if (empty($appointment)) {
            toastr()->addError('Appointment not found');

            return redirect(roleBasedRoute('appointments.index'));
        }

        $comments = $appointment->comments()->get();
        return view('admin.appointments.show', ['comments' => $comments])->with('appointment', $appointment);
    }

    /**
     * Show the form for editing the specified Appointment.
     *
     * @param int $id
     *
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
            'users' => User::get()
        ]
        )->with('appointment', $appointment);
    }

    /**
     * Update the specified Appointment in storage.
     *
     * @param int $id
     * @param UpdateAppointmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppointmentRequest $request)
    {
        $appointment = $this->appointmentRepository->find($id);

        if (empty($appointment)) {
            

            toastr()->addError('urrency List saved successfully.');
            return redirect(roleBasedRoute('appointments.index'));
        }

        $appointment = $this->appointmentRepository->update($request->all(), $id);

        toastr()->addSuccess('Appointment updated successfully.');

        return redirect(roleBasedRoute('appointments.index'));
    }

    /**
     * Remove the specified Appointment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
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
