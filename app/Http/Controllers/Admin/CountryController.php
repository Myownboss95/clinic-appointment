<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use Response;

class CountryController extends AppBaseController
{
    /** @var CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $countries = $this->countryRepository->all();

        return view('admin.countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            toastr()->addError('Country not found');

            return redirect(roleBasedRoute('countries.index'));
        }

        return view('admin.countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            toastr()->addError('Country not found');

            return redirect(roleBasedRoute('countries.index'));
        }

        return view('admin.countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
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
