<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateClinicUserRequest;
use App\Http\Requests\UpdateClinicUserRequest;
use App\Repositories\ClinicUserRepository;
use Illuminate\Http\Request;
use Response;

class ClinicUserController extends AppBaseController
{
    /** @var ClinicUserRepository */
    private $clinicUserRepository;

    public function __construct(ClinicUserRepository $clinicUserRepo)
    {
        $this->clinicUserRepository = $clinicUserRepo;
    }

    /**
     * Display a listing of the ClinicUser.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clinicUsers = $this->clinicUserRepository->all();

        return view('admin.clinic_users.index')
            ->with('clinicUsers', $clinicUsers);
    }

    /**
     * Show the form for creating a new ClinicUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clinic_users.create');
    }

    /**
     * Store a newly created ClinicUser in storage.
     *
     *
     * @return Response
     */
    public function store(CreateClinicUserRequest $request)
    {
        $input = $request->all();

        $clinicUser = $this->clinicUserRepository->create($input);

        toastr()->addSuccess('Clinic User saved successfully.');

        return redirect(roleBasedRoute('clinicUsers.index'));
    }

    /**
     * Display the specified ClinicUser.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            toastr()->addError('Clinic User not found');

            return redirect(roleBasedRoute('clinicUsers.index'));
        }

        return view('admin.clinic_users.show')->with('clinicUser', $clinicUser);
    }

    /**
     * Show the form for editing the specified ClinicUser.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            toastr()->addError('Clinic User not found');

            return redirect(roleBasedRoute('clinicUsers.index'));
        }

        return view('admin.clinic_users.edit')->with('clinicUser', $clinicUser);
    }

    /**
     * Update the specified ClinicUser in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateClinicUserRequest $request)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            toastr()->addError('Clinic User not found');

            return redirect(roleBasedRoute('clinicUsers.index'));
        }

        $clinicUser = $this->clinicUserRepository->update($request->all(), $id);

        toastr()->addSuccess('Clinic User updated successfully.');

        return redirect(roleBasedRoute('clinicUsers.index'));
    }

    /**
     * Remove the specified ClinicUser from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            toastr()->addError('Clinic User not found');

            return redirect(roleBasedRoute('clinicUsers.index'));
        }

        $this->clinicUserRepository->delete($id);

        toastr()->addSuccess('Clinic User deleted successfully.');

        return redirect(roleBasedRoute('clinicUsers.index'));
    }
}
