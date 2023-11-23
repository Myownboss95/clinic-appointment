<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Repositories\StageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StageController extends AppBaseController
{
    /** @var StageRepository $stageRepository*/
    private $stageRepository;

    public function __construct(StageRepository $stageRepo)
    {
        $this->stageRepository = $stageRepo;
    }

    /**
     * Display a listing of the Stage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stages = $this->stageRepository->all();

        return view('stages.index')
            ->with('stages', $stages);
    }

    /**
     * Show the form for creating a new Stage.
     *
     * @return Response
     */
    public function create()
    {
        return view('stages.create');
    }

    /**
     * Store a newly created Stage in storage.
     *
     * @param CreateStageRequest $request
     *
     * @return Response
     */
    public function store(CreateStageRequest $request)
    {
        $input = $request->all();

        $stage = $this->stageRepository->create($input);

        toastr()->addSuccess('Stage saved successfully.');

        return redirect(route('stages.index'));
    }

    /**
     * Display the specified Stage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(route('stages.index'));
        }

        return view('stages.show')->with('stage', $stage);
    }

    /**
     * Show the form for editing the specified Stage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(route('stages.index'));
        }

        return view('stages.edit')->with('stage', $stage);
    }

    /**
     * Update the specified Stage in storage.
     *
     * @param int $id
     * @param UpdateStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStageRequest $request)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(route('stages.index'));
        }

        $stage = $this->stageRepository->update($request->all(), $id);

        toastr()->addSuccess('Stage updated successfully.');

        return redirect(route('stages.index'));
    }

    /**
     * Remove the specified Stage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(route('stages.index'));
        }

        $this->stageRepository->delete($id);

        toastr()->addSuccess('Stage deleted successfully.');

        return redirect(route('stages.index'));
    }
}
