<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClinicUserRequest;
use App\Http\Requests\UpdateClinicUserRequest;
use App\Repositories\ClinicUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClinicUserController extends AppBaseController
{
    /** @var ClinicUserRepository $clinicUserRepository*/
    private $clinicUserRepository;

    public function __construct(ClinicUserRepository $clinicUserRepo)
    {
        $this->clinicUserRepository = $clinicUserRepo;
    }

    /**
     * Display a listing of the ClinicUser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clinicUsers = $this->clinicUserRepository->all();

        return view('clinic_users.index')
            ->with('clinicUsers', $clinicUsers);
    }

    /**
     * Show the form for creating a new ClinicUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('clinic_users.create');
    }

    /**
     * Store a newly created ClinicUser in storage.
     *
     * @param CreateClinicUserRequest $request
     *
     * @return Response
     */
    public function store(CreateClinicUserRequest $request)
    {
        $input = $request->all();

        $clinicUser = $this->clinicUserRepository->create($input);

        Flash::success('Clinic User saved successfully.');

        return redirect(route('clinicUsers.index'));
    }

    /**
     * Display the specified ClinicUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            Flash::error('Clinic User not found');

            return redirect(route('clinicUsers.index'));
        }

        return view('clinic_users.show')->with('clinicUser', $clinicUser);
    }

    /**
     * Show the form for editing the specified ClinicUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            Flash::error('Clinic User not found');

            return redirect(route('clinicUsers.index'));
        }

        return view('clinic_users.edit')->with('clinicUser', $clinicUser);
    }

    /**
     * Update the specified ClinicUser in storage.
     *
     * @param int $id
     * @param UpdateClinicUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClinicUserRequest $request)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            Flash::error('Clinic User not found');

            return redirect(route('clinicUsers.index'));
        }

        $clinicUser = $this->clinicUserRepository->update($request->all(), $id);

        Flash::success('Clinic User updated successfully.');

        return redirect(route('clinicUsers.index'));
    }

    /**
     * Remove the specified ClinicUser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clinicUser = $this->clinicUserRepository->find($id);

        if (empty($clinicUser)) {
            Flash::error('Clinic User not found');

            return redirect(route('clinicUsers.index'));
        }

        $this->clinicUserRepository->delete($id);

        Flash::success('Clinic User deleted successfully.');

        return redirect(route('clinicUsers.index'));
    }
}
