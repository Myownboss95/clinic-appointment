<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Repositories\CountryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CountryController extends AppBaseController
{
    /** @var CountryRepository $countryRepository*/
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $countries = $this->countryRepository->all();

        return view('countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
     * @param CreateCountryRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        $country = $this->countryRepository->create($input);

        toastr()->addSuccess('Country saved successfully.');

        return redirect(roleBasedRoute('countries.index'));
    }

    /**
     * Display the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            toastr()->addError('Country not found');

            return redirect(roleBasedRoute('countries.index'));
        }

        return view('countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            toastr()->addError('Country not found');

            return redirect(roleBasedRoute('countries.index'));
        }

        return view('countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param int $id
     * @param UpdateCountryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryRequest $request)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            toastr()->addError('Country not found');

            return redirect(roleBasedRoute('countries.index'));
        }

        $country = $this->countryRepository->update($request->all(), $id);

        toastr()->addSuccess('Country updated successfully.');

        return redirect(roleBasedRoute('countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            toastr()->addError('Country not found');

            return redirect(roleBasedRoute('countries.index'));
        }

        $this->countryRepository->delete($id);

        toastr()->addSuccess('Country deleted successfully.');

        return redirect(roleBasedRoute('countries.index'));
    }
}
