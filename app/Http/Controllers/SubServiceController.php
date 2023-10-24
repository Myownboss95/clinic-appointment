<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubServiceRequest;
use App\Http\Requests\UpdateSubServiceRequest;
use App\Repositories\SubServiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubServiceController extends AppBaseController
{
    /** @var SubServiceRepository $subServiceRepository*/
    private $subServiceRepository;

    public function __construct(SubServiceRepository $subServiceRepo)
    {
        $this->subServiceRepository = $subServiceRepo;
    }

    /**
     * Display a listing of the SubService.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subServices = $this->subServiceRepository->all();

        return view('sub_services.index')
            ->with('subServices', $subServices);
    }

    /**
     * Show the form for creating a new SubService.
     *
     * @return Response
     */
    public function create()
    {
        return view('sub_services.create');
    }

    /**
     * Store a newly created SubService in storage.
     *
     * @param CreateSubServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateSubServiceRequest $request)
    {
        $input = $request->all();

        $subService = $this->subServiceRepository->create($input);

        Flash::success('Sub Service saved successfully.');

        return redirect(route('subServices.index'));
    }

    /**
     * Display the specified SubService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            Flash::error('Sub Service not found');

            return redirect(route('subServices.index'));
        }

        return view('sub_services.show')->with('subService', $subService);
    }

    /**
     * Show the form for editing the specified SubService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            Flash::error('Sub Service not found');

            return redirect(route('subServices.index'));
        }

        return view('sub_services.edit')->with('subService', $subService);
    }

    /**
     * Update the specified SubService in storage.
     *
     * @param int $id
     * @param UpdateSubServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubServiceRequest $request)
    {
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            Flash::error('Sub Service not found');

            return redirect(route('subServices.index'));
        }

        $subService = $this->subServiceRepository->update($request->all(), $id);

        Flash::success('Sub Service updated successfully.');

        return redirect(route('subServices.index'));
    }

    /**
     * Remove the specified SubService from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            Flash::error('Sub Service not found');

            return redirect(route('subServices.index'));
        }

        $this->subServiceRepository->delete($id);

        Flash::success('Sub Service deleted successfully.');

        return redirect(route('subServices.index'));
    }
}
