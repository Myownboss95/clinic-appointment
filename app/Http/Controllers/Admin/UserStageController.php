<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUserStageRequest;
use App\Http\Requests\UpdateUserStageRequest;
use App\Repositories\UserStageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserStageController extends AppBaseController
{
    /** @var UserStageRepository $userStageRepository*/
    private $userStageRepository;

    public function __construct(UserStageRepository $userStageRepo)
    {
        $this->userStageRepository = $userStageRepo;
    }

    /**
     * Display a listing of the UserStage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userStages = $this->userStageRepository->all();

        return view('admin.user_stages.index')
            ->with('userStages', $userStages);
    }

    /**
     * Show the form for creating a new UserStage.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user_stages.create');
    }

    /**
     * Store a newly created UserStage in storage.
     *
     * @param CreateUserStageRequest $request
     *
     * @return Response
     */
    public function store(CreateUserStageRequest $request)
    {
        $input = $request->all();

        $userStage = $this->userStageRepository->create($input);

        toastr()->addSuccess('User Stage saved successfully.');

        return redirect(roleBasedRoute('userStages.index'));
    }

    /**
     * Display the specified UserStage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userStage = $this->userStageRepository->find($id);

        if (empty($userStage)) {
            toastr()->addError('User Stage not found');

            return redirect(roleBasedRoute('userStages.index'));
        }

        return view('admin.user_stages.show')->with('userStage', $userStage);
    }

    /**
     * Show the form for editing the specified UserStage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userStage = $this->userStageRepository->find($id);

        if (empty($userStage)) {
            toastr()->addError('User Stage not found');

            return redirect(roleBasedRoute('userStages.index'));
        }

        return view('admin.user_stages.edit')->with('userStage', $userStage);
    }

    /**
     * Update the specified UserStage in storage.
     *
     * @param int $id
     * @param UpdateUserStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserStageRequest $request)
    {
        $userStage = $this->userStageRepository->find($id);

        if (empty($userStage)) {
            toastr()->addError('User Stage not found');

            return redirect(roleBasedRoute('userStages.index'));
        }

        $userStage = $this->userStageRepository->update($request->all(), $id);

        toastr()->addSuccess('User Stage updated successfully.');

        return redirect(roleBasedRoute('userStages.index'));
    }

    /**
     * Remove the specified UserStage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userStage = $this->userStageRepository->find($id);

        if (empty($userStage)) {
            toastr()->addError('User Stage not found');

            return redirect(roleBasedRoute('userStages.index'));
        }

        $this->userStageRepository->delete($id);

        toastr()->addSuccess('User Stage deleted successfully.');

        return redirect(roleBasedRoute('userStages.index'));
    }
}
