<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAppointmentRequest;

class StaffController extends AppBaseController
{

    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;

    }
    
    /**
     * Display a listing of the Staff.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $staffs = User::where('role_id', 2)->latest()->get();

        return view('admin.staff.index')
            ->with('staffs', $staffs);
    }

    /**
     * Show the form for creating a new Staff.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created Staff in storage.
     *
     * @param CreateStaffRequest $request
     *
     * @return Response
     */
    public function store(CreateStaffRequest $request)
    {
        $input = $request->all();

        $staff = $this->userRepository->create(
            array_merge($input, [
                'password' => Hash::make($request->input('password')),
                'role_id' => 2
            ]));

        toastr()->addSuccess('Staff created successfully.');

        return redirect(route('admin.staff.index'));
    }

    /**
     * Display the specified Staff.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staff = $this->userRepository->find($id);

        if (empty($staff)) {
            toastr()->addError('Staff not found');

            return redirect(route('admin.staff.index'));
        }

        return view('admin.staff.show')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified Staff.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $staff = $this->userRepository->find($id);

        if (empty($staff)) {
            toastr()->addError('Staff not found');

            return redirect(route('admin.staff.index'));
        }

        return view('admin.staff.edit')->with('staff', $staff);
    }

    /**
     * Update the specified Staff in storage.
     *
     * @param int $id
     * @param UpdateStaffRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStaffRequest $request)
    {
        $staff = $this->userRepository->find($id);

        if (empty($staff)) {
            

            toastr()->addError('Not Found.');
            return redirect(route('admin.staff.index'));
        }

        $staff = $this->userRepository->update($request->all(), $id);

        toastr()->addSuccess('Staff updated successfully.');

        return redirect(route('admin.staff.index'));
    }

    /**
     * Remove the specified Staff from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staff = $this->userRepository->find($id);

        if (empty($staff)) {
            toastr()->addError('Staff not found');
            return redirect(route('admin.staff.index'));
        }

        $this->userRepository->delete($id);

        toastr()->addSuccess('Staff saved successfully.');

        return redirect(route('admin.staff.index'));
    }

    /**
     * Remove the specified Staff from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function removeAdmin($id)
    {
        $staff = $this->userRepository->find($id);

        if (empty($staff)) {
            toastr()->addError('Staff not found');
            return redirect(route('admin.staff.index'));
        }

        $this->userRepository->update(['role_id' => 1],$id);

        toastr()->addSuccess('Staff saved successfully.');

        return redirect(route('admin.staff.index'));
    }
    /**
     * Remove the specified Staff from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function setAdmin($id)
    {
        $staff = $this->userRepository->find($id);

        if (empty($staff)) {
            toastr()->addError('Staff not found');
            return redirect(route('admin.staff.index'));
        }

        $this->userRepository->update(['role_id' => 2],$id);

        toastr()->addSuccess('Staff saved successfully.');

        return redirect(route('admin.staff.index'));
    }
}
