<?php

namespace App\Http\Controllers;

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

        return view('user_stages.index')
            ->with('userStages', $userStages);
    }

    /**
     * Show the form for creating a new UserStage.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_stages.create');
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

        Flash::success('User Stage saved successfully.');

        return redirect(route('userStages.index'));
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
            Flash::error('User Stage not found');

            return redirect(route('userStages.index'));
        }

        return view('user_stages.show')->with('userStage', $userStage);
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
            Flash::error('User Stage not found');

            return redirect(route('userStages.index'));
        }

        return view('user_stages.edit')->with('userStage', $userStage);
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
            Flash::error('User Stage not found');

            return redirect(route('userStages.index'));
        }

        $userStage = $this->userStageRepository->update($request->all(), $id);

        Flash::success('User Stage updated successfully.');

        return redirect(route('userStages.index'));
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
            Flash::error('User Stage not found');

            return redirect(route('userStages.index'));
        }

        $this->userStageRepository->delete($id);

        Flash::success('User Stage deleted successfully.');

        return redirect(route('userStages.index'));
    }
}
