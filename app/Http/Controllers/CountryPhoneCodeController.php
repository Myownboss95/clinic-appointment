<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountryPhoneCodeRequest;
use App\Http\Requests\UpdateCountryPhoneCodeRequest;
use App\Repositories\CountryPhoneCodeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CountryPhoneCodeController extends AppBaseController
{
    /** @var CountryPhoneCodeRepository $countryPhoneCodeRepository*/
    private $countryPhoneCodeRepository;

    public function __construct(CountryPhoneCodeRepository $countryPhoneCodeRepo)
    {
        $this->countryPhoneCodeRepository = $countryPhoneCodeRepo;
    }

    /**
     * Display a listing of the CountryPhoneCode.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $countryPhoneCodes = $this->countryPhoneCodeRepository->all();

        return view('country_phone_codes.index')
            ->with('countryPhoneCodes', $countryPhoneCodes);
    }

    /**
     * Show the form for creating a new CountryPhoneCode.
     *
     * @return Response
     */
    public function create()
    {
        return view('country_phone_codes.create');
    }

    /**
     * Store a newly created CountryPhoneCode in storage.
     *
     * @param CreateCountryPhoneCodeRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryPhoneCodeRequest $request)
    {
        $input = $request->all();

        $countryPhoneCode = $this->countryPhoneCodeRepository->create($input);

        Flash::success('Country Phone Code saved successfully.');

        return redirect(route('countryPhoneCodes.index'));
    }

    /**
     * Display the specified CountryPhoneCode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            Flash::error('Country Phone Code not found');

            return redirect(route('countryPhoneCodes.index'));
        }

        return view('country_phone_codes.show')->with('countryPhoneCode', $countryPhoneCode);
    }

    /**
     * Show the form for editing the specified CountryPhoneCode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            Flash::error('Country Phone Code not found');

            return redirect(route('countryPhoneCodes.index'));
        }

        return view('country_phone_codes.edit')->with('countryPhoneCode', $countryPhoneCode);
    }

    /**
     * Update the specified CountryPhoneCode in storage.
     *
     * @param int $id
     * @param UpdateCountryPhoneCodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryPhoneCodeRequest $request)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            Flash::error('Country Phone Code not found');

            return redirect(route('countryPhoneCodes.index'));
        }

        $countryPhoneCode = $this->countryPhoneCodeRepository->update($request->all(), $id);

        Flash::success('Country Phone Code updated successfully.');

        return redirect(route('countryPhoneCodes.index'));
    }

    /**
     * Remove the specified CountryPhoneCode from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countryPhoneCode = $this->countryPhoneCodeRepository->find($id);

        if (empty($countryPhoneCode)) {
            Flash::error('Country Phone Code not found');

            return redirect(route('countryPhoneCodes.index'));
        }

        $this->countryPhoneCodeRepository->delete($id);

        Flash::success('Country Phone Code deleted successfully.');

        return redirect(route('countryPhoneCodes.index'));
    }
}
