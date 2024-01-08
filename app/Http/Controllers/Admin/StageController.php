<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Stage;
use App\Repositories\StageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Response;

class StageController extends AppBaseController
{
    /** @var StageRepository */
    private $stageRepository;

    public function __construct(StageRepository $stageRepo)
    {
        $this->stageRepository = $stageRepo;
    }

    /**
     * Display a listing of the Stage.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stages = $this->stageRepository->all();

        return view('admin.stages.index')
            ->with('stages', $stages);
    }

    /**
     * Show the form for creating a new Stage.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.stages.create', ['stage' => new Stage()]);
    }

    /**
     * Store a newly created Stage in storage.
     *
     *
     * @return Response
     */
    public function store(CreateStageRequest $request)
    {
        $input = $request->all();

        $stage = $this->stageRepository->create(array_merge($input,
            [
                'slug' => Str::slug($request->input('name')),
            ]));

        toastr()->addSuccess('Stage saved successfully.');

        return redirect(roleBasedRoute('stages.index'));
    }

    /**
     * Display the specified Stage.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(roleBasedRoute('stages.index'));
        }

        return view('admin.stages.show')->with('stage', $stage);
    }

    /**
     * Show the form for editing the specified Stage.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(roleBasedRoute('stages.index'));
        }

        return view('admin.stages.edit')->with('stage', $stage);
    }

    /**
     * Update the specified Stage in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateStageRequest $request)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect(roleBasedRoute('stages.index'));
        }

        $stage = $this->stageRepository->update(array_merge($request->all(),
            [
                'slug' => Str::slug($request->input('name')),
            ]),
            $id);

        toastr()->addSuccess('Stage updated successfully.');

        return redirect(roleBasedRoute('stages.index'));
    }

    /**
     * Remove the specified Stage from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'current_password'],
        ]);

        if ($validator->fails()) {
            toastr()->addError('Incorrect Password');

            return redirect()->back();
        }

        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            toastr()->addError('Stage not found');

            return redirect()->back();
        }

        $this->stageRepository->delete($id);

        toastr()->addSuccess('Stage deleted successfully.');

        return redirect(roleBasedRoute('stages.index'));
    }
}
