<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use Response;

class CityController extends AppBaseController
{
    /** @var CityRepository */
    private $cityRepository;

    public function __construct(CityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;
    }

    /**
     * Display a listing of the City.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cities = $this->cityRepository->all();

        return view('admin.cities.index')
            ->with('cities', $cities);
    }

    /**
     * Show the form for creating a new City.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created City in storage.
     *
     *
     * @return Response
     */
    public function store(CreateCityRequest $request)
    {
        $input = $request->all();

        $city = $this->cityRepository->create($input);
        toastr()->timeOut(10000)->addSuccess('City saved successfully.');

        return redirect(roleBasedRoute('cities.index'));
    }

    /**
     * Display the specified City.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            toastr()->timeOut(10000)->addError('City not found');

            return redirect(roleBasedRoute('cities.index'));
        }

        return view('admin.cities.show')->with('city', $city);
    }

    /**
     * Show the form for editing the specified City.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            toastr()->timeOut(10000)->addError('City not found');

            return redirect(roleBasedRoute('cities.index'));
        }

        return view('admin.cities.edit')->with('city', $city);
    }

    /**
     * Update the specified City in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateCityRequest $request)
    {
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            toastr()->timeOut(10000)->addError('City not found');

            return redirect(roleBasedRoute('cities.index'));
        }

        $city = $this->cityRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('City updated successfully.');

        return redirect(roleBasedRoute('cities.index'));
    }

    /**
     * Remove the specified City from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            toastr()->timeOut(10000)->addError('City not found');

            return redirect(roleBasedRoute('cities.index'));
        }

        $this->cityRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('City deleted successfully.');

        return redirect(roleBasedRoute('cities.index'));
    }
}
