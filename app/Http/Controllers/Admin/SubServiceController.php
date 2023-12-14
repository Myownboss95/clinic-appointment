<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.sub_services.index')
            ->with('subServices', $subServices);
    }

    /**
     * Show the form for creating a new SubService.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sub_services.create');
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

        toastr()->addSuccess('Sub Service saved successfully.');

        return redirect(roleBasedRoute('subServices.index'));
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
            toastr()->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        return view('admin.sub_services.show')->with('subService', $subService);
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
            toastr()->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        return view('admin.sub_services.edit')->with('subService', $subService);
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
            toastr()->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        $subService = $this->subServiceRepository->update($request->all(), $id);

        toastr()->addSuccess('Sub Service updated successfully.');

        return redirect(roleBasedRoute('subServices.index'));
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
            toastr()->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        $this->subServiceRepository->delete($id);

        toastr()->addSuccess('Sub Service deleted successfully.');

        return redirect(roleBasedRoute('subServices.index'));
    }
}
