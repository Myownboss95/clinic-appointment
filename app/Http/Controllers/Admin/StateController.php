<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Repositories\StateRepository;
use Illuminate\Http\Request;
use Response;

class StateController extends AppBaseController
{
    /** @var StateRepository */
    private $stateRepository;

    public function __construct(StateRepository $stateRepo)
    {
        $this->stateRepository = $stateRepo;
    }

    /**
     * Display a listing of the State.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $states = $this->stateRepository->all();

        return view('admin.states.index')
            ->with('states', $states);
    }

    /**
     * Show the form for creating a new State.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.states.create');
    }

    /**
     * Store a newly created State in storage.
     *
     *
     * @return Response
     */
    public function store(CreateStateRequest $request)
    {
        $input = $request->all();

        $state = $this->stateRepository->create($input);

        toastr()->addSuccess('State saved successfully.');

        return redirect(roleBasedRoute('states.index'));
    }

    /**
     * Display the specified State.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            toastr()->addError('State not found');

            return redirect(roleBasedRoute('states.index'));
        }

        return view('admin.states.show')->with('state', $state);
    }

    /**
     * Show the form for editing the specified State.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            toastr()->addError('State not found');

            return redirect(roleBasedRoute('states.index'));
        }

        return view('admin.states.edit')->with('state', $state);
    }

    /**
     * Update the specified State in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateStateRequest $request)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            toastr()->addError('State not found');

            return redirect(roleBasedRoute('states.index'));
        }

        $state = $this->stateRepository->update($request->all(), $id);

        toastr()->addSuccess('State updated successfully.');

        return redirect(roleBasedRoute('states.index'));
    }

    /**
     * Remove the specified State from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            toastr()->addError('State not found');

            return redirect(roleBasedRoute('states.index'));
        }

        $this->stateRepository->delete($id);

        toastr()->addSuccess('State deleted successfully.');

        return redirect(roleBasedRoute('states.index'));
    }
}
