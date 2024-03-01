<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSubServiceRequest;
use App\Http\Requests\UpdateSubServiceRequest;
use App\Models\Service;
use App\Models\SubService;
use App\Repositories\SubServiceRepository;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Response;

class SubServiceController extends AppBaseController
{
    use UploadFiles;

    /** @var SubServiceRepository */
    private $subServiceRepository;

    public function __construct(SubServiceRepository $subServiceRepo)
    {
        $this->subServiceRepository = $subServiceRepo;
    }

    /**
     * Display a listing of the SubService.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$subServices = $this->subServiceRepository->all();
        $subServices = SubService::with('service')->get();

        // dd($subServices);
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
        return view('admin.sub_services.create', [
            'services' => Service::get(),
            'subService' => new SubService(),
        ]);
    }

    /**
     * Store a newly created SubService in storage.
     *
     *
     * @return Response
     */
    public function store(CreateSubServiceRequest $request)
    {
        $data = array_merge($request->all(), [
            'slug' => Str::slug($request->input('name')),
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage('sub_service', $request);
        }

        SubService::create($data);

        //$this->subServiceRepository->create($input);

        toastr()->timeOut(10000)->addSuccess('Sub Service saved successfully.');

        return redirect(roleBasedRoute('subServices.index'));
    }

    /**
     * Display the specified SubService.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            toastr()->timeOut(10000)->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        return view('admin.sub_services.show')->with('subService', $subService);
    }

    /**
     * Show the form for editing the specified SubService.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            toastr()->timeOut(10000)->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        return view('admin.sub_services.edit', [
            'services' => Service::get(),
        ])->with('subService', $subService);
    }

    /**
     * Update the specified SubService in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateSubServiceRequest $request)
    {
        $subService = SubService::find($id);

        if (empty($subService)) {
            toastr()->timeOut(10000)->addError('Sub Service not found');

            return redirect(roleBasedRoute('subServices.index'));
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage('sub_service', $request);
        }

        $subService->update($data);
        toastr()->timeOut(10000)->addSuccess('Sub Service updated successfully.');

        return redirect(roleBasedRoute('subServices.index'));
    }

    /**
     * Remove the specified SubService from storage.
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
        $subService = $this->subServiceRepository->find($id);

        if (empty($subService)) {
            toastr()->timeOut(10000)->addError('Sub Service not found');

            return redirect()->back();
        }

        $this->subServiceRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('Sub Service deleted successfully.');

        return redirect(roleBasedRoute('subServices.index'));

    }
}
