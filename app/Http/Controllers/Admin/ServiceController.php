<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Response;

class ServiceController extends AppBaseController
{
    /** @var ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $services = $this->serviceRepository->all();

        return view('admin.services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.services.create', ['service' => new Service()]);
    }

    /**
     * Store a newly created Service in storage.
     *
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = array_merge($request->all(), ['slug' => Str::slug($request->input('name'))]);
        $service = $this->serviceRepository->create($input);
        toastr()->timeOut(10000)->addSuccess('Service saved successfully.');

        return redirect(roleBasedRoute('services.index'));
    }

    /**
     * Display the specified Service.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            toastr()->timeOut(10000)->addError('Service not found');

            return redirect(roleBasedRoute('services.index'));
        }

        return view('admin.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            toastr()->timeOut(10000)->addError('Service not found');

            return redirect(roleBasedRoute('services.index'));
        }

        return view('admin.services.edit')->with('service', $service);
    }

    /**
     * Update the specified Service in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            toastr()->timeOut(10000)->addError('Service not found');

            return redirect(roleBasedRoute('services.index'));
        }

        $service = $this->serviceRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('Service updated successfully.');

        return redirect(roleBasedRoute('services.index'));
    }

    /**
     * Remove the specified Service from storage.
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
            toastr()->timeOut(10000)->addError('Incorrect Password');

            return redirect()->back();
        }

        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            toastr()->timeOut(10000)->addError('Service not found');

            return redirect()->back();
        }

        $this->serviceRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('Service deleted successfully.');

        return redirect(roleBasedRoute('services.index'));
    }
}
