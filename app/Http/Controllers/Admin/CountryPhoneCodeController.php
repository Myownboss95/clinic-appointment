<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCountryPhoneCodeRequest;
use App\Http\Requests\UpdateCountryPhoneCodeRequest;
use App\Repositories\CountryPhoneCodeRepository;
use Illuminate\Http\Request;
use Response;

class CountryPhoneCodeController extends AppBaseController
{
    /** @var CountryPhoneCodeRepository */
    private $countryPhoneCodeRepository;

    public function __construct(CountryPhoneCodeRepository $countryPhoneCodeRepo)
    {
        $this->countryPhoneCodeRepository = $countryPhoneCodeRepo;
    }

    /**
     * Display a listing of the CountryPhoneCode.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $countryPhoneCodes = $this->countryPhoneCodeRepository->all();

        return view('admin.country_phone_codes.index')
            ->with('countryPhoneCodes', $countryPhoneCodes);
    }

    /**
     * Show the form for creating a new CountryPhoneCode.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.country_phone_codes.create');
    }

    /**
     * Store a newly created CountryPhoneCode in storage.
     *
     *
     * @return Response
     */
    public function store(CreateCountryPhoneCodeRequest $request)
    {
        $input = $request->all();

        $countryPhoneCode = $this->countryPhoneCodeRepository->create($input);

        toastr()->addSuccess('Country Phone Code saved successfully.');

        return redirect(roleBasedRoute('countryPhoneCodes.index'));
    }

    /**
     * Display the specified CountryPhoneCode.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            toastr()->addError('Country Phone Code not found');

            return redirect(roleBasedRoute('countryPhoneCodes.index'));
        }

        return view('admin.country_phone_codes.show')->with('countryPhoneCode', $countryPhoneCode);
    }

    /**
     * Show the form for editing the specified CountryPhoneCode.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            toastr()->addError('Country Phone Code not found');

            return redirect(roleBasedRoute('countryPhoneCodes.index'));
        }

        return view('admin.country_phone_codes.edit')->with('countryPhoneCode', $countryPhoneCode);
    }

    /**
     * Update the specified CountryPhoneCode in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateCountryPhoneCodeRequest $request)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            toastr()->addError('Country Phone Code not found');

            return redirect(roleBasedRoute('countryPhoneCodes.index'));
        }

        $countryPhoneCode = $this->countryPhoneCodeRepository->update($request->all(), $id);

        toastr()->addSuccess('Country Phone Code updated successfully.');

        return redirect(roleBasedRoute('countryPhoneCodes.index'));
    }

    /**
     * Remove the specified CountryPhoneCode from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            toastr()->addError('Country Phone Code not found');

            return redirect(roleBasedRoute('countryPhoneCodes.index'));
        }

        $this->countryPhoneCodeRepository->delete($id);

        toastr()->addSuccess('Country Phone Code deleted successfully.');

        return redirect(roleBasedRoute('countryPhoneCodes.index'));
    }
}
