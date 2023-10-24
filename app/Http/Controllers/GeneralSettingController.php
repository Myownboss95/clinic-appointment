<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGeneralSettingRequest;
use App\Http\Requests\UpdateGeneralSettingRequest;
use App\Repositories\GeneralSettingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GeneralSettingController extends AppBaseController
{
    /** @var GeneralSettingRepository $generalSettingRepository*/
    private $generalSettingRepository;

    public function __construct(GeneralSettingRepository $generalSettingRepo)
    {
        $this->generalSettingRepository = $generalSettingRepo;
    }

    /**
     * Display a listing of the GeneralSetting.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $generalSettings = $this->generalSettingRepository->all();

        return view('general_settings.index')
            ->with('generalSettings', $generalSettings);
    }

    /**
     * Show the form for creating a new GeneralSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('general_settings.create');
    }

    /**
     * Store a newly created GeneralSetting in storage.
     *
     * @param CreateGeneralSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateGeneralSettingRequest $request)
    {
        $input = $request->all();

        $generalSetting = $this->generalSettingRepository->create($input);

        Flash::success('General Setting saved successfully.');

        return redirect(route('generalSettings.index'));
    }

    /**
     * Display the specified GeneralSetting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            Flash::error('General Setting not found');

            return redirect(route('generalSettings.index'));
        }

        return view('general_settings.show')->with('generalSetting', $generalSetting);
    }

    /**
     * Show the form for editing the specified GeneralSetting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            Flash::error('General Setting not found');

            return redirect(route('generalSettings.index'));
        }

        return view('general_settings.edit')->with('generalSetting', $generalSetting);
    }

    /**
     * Update the specified GeneralSetting in storage.
     *
     * @param int $id
     * @param UpdateGeneralSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeneralSettingRequest $request)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            Flash::error('General Setting not found');

            return redirect(route('generalSettings.index'));
        }

        $generalSetting = $this->generalSettingRepository->update($request->all(), $id);

        Flash::success('General Setting updated successfully.');

        return redirect(route('generalSettings.index'));
    }

    /**
     * Remove the specified GeneralSetting from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            Flash::error('General Setting not found');

            return redirect(route('generalSettings.index'));
        }

        $this->generalSettingRepository->delete($id);

        Flash::success('General Setting deleted successfully.');

        return redirect(route('generalSettings.index'));
    }
}
