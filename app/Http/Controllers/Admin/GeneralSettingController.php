<?php

namespace App\Http\Controllers\Admin;

use Response;
use Illuminate\Http\Request;
use App\Settings\GeneralSettings;
use App\Http\Controllers\AppBaseController;
use App\Repositories\GeneralSettingRepository;
use App\Http\Requests\CreateGeneralSettingRequest;
use App\Http\Requests\UpdateGeneralSettingRequest;

class GeneralSettingController extends AppBaseController
{
    /** @var GeneralSettingRepository */
    private $generalSettingRepository;

    public function __construct(GeneralSettingRepository $generalSettingRepo)
    {
        $this->generalSettingRepository = $generalSettingRepo;
    }

    /**
     * Display a listing of the GeneralSetting.
     *
     *
     * @return Response
     */
    public function index(GeneralSettings $settings)
    {
        return view('admin.general_settings.create', [
            'app_name' => $settings->app_name,
            'app_address' => $settings->app_address,
            'hero' => $settings->hero,
            'site_description' => $settings->site_description,
            'ref_bonus' => $settings->ref_bonus,
            'site_phone' => $settings->site_phone,
            'site_email' => $settings->site_email,
            'site_facebook' => $settings->site_facebook,
            'site_instagram' => $settings->site_instagram,
            'site_linkedin' => $settings->site_linkedin,
            'site_twitter' => $settings->site_twitter,
        ]);
    }

    /**
     * Show the form for creating a new GeneralSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.general_settings.create');
    }

    /**
     * Store a newly created GeneralSetting in storage.
     *
     *
     * @return Response
     */
    public function store(CreateGeneralSettingRequest $request,GeneralSettings $settings)
    {
        $settings->site_description = $request->input('site_description');
        $settings->hero = $request->input('hero');
        $settings->app_address = $request->input('app_address');
        $settings->site_description = $request->input('site_description');
        $settings->ref_bonus = $request->input('ref_bonus');
        $settings->site_phone = $request->input('site_phone');
        $settings->site_facebook = $request->input('site_facebook');
        $settings->site_instagram = $request->input('site_instagram');
        $settings->site_linkedin = $request->input('site_linkedin');
        $settings->site_twitter = $request->input('site_twitter');

        $settings->save();
        toastr()->addSuccess('Settings saved successfully.');

        return redirect(roleBasedRoute('settings.index'));
    }

    /**
     * Display the specified GeneralSetting.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            toastr()->addError('General Setting not found');

            return redirect(roleBasedRoute('generalSettings.index'));
        }

        return view('admin.general_settings.show')->with('generalSetting', $generalSetting);
    }

  
}
