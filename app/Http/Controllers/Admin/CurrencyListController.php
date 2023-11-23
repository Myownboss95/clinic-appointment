<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCurrencyListRequest;
use App\Http\Requests\UpdateCurrencyListRequest;
use App\Repositories\CurrencyListRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CurrencyListController extends AppBaseController
{
    /** @var CurrencyListRepository $currencyListRepository*/
    private $currencyListRepository;

    public function __construct(CurrencyListRepository $currencyListRepo)
    {
        $this->currencyListRepository = $currencyListRepo;
    }

    /**
     * Display a listing of the CurrencyList.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $currencyLists = $this->currencyListRepository->all();

        return view('currency_lists.index')
            ->with('currencyLists', $currencyLists);
    }

    /**
     * Show the form for creating a new CurrencyList.
     *
     * @return Response
     */
    public function create()
    {
        return view('currency_lists.create');
    }

    /**
     * Store a newly created CurrencyList in storage.
     *
     * @param CreateCurrencyListRequest $request
     *
     * @return Response
     */
    public function store(CreateCurrencyListRequest $request)
    {
        $input = $request->all();

        $currencyList = $this->currencyListRepository->create($input);
        toastr()->addSuccess('Currency List saved successfully.');

        return redirect(route('currencyLists.index'));
    }

    /**
     * Display the specified CurrencyList.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->addError('Currency List not found');

            return redirect(route('currencyLists.index'));
        }

        return view('currency_lists.show')->with('currencyList', $currencyList);
    }

    /**
     * Show the form for editing the specified CurrencyList.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->addError('Currency List not found');

            return redirect(route('currencyLists.index'));
        }

        return view('currency_lists.edit')->with('currencyList', $currencyList);
    }

    /**
     * Update the specified CurrencyList in storage.
     *
     * @param int $id
     * @param UpdateCurrencyListRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurrencyListRequest $request)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->addError('Currency List not found');

            return redirect(route('currencyLists.index'));
        }

        $currencyList = $this->currencyListRepository->update($request->all(), $id);

        toastr()->addSuccess('Currency List updated successfully.');

        return redirect(route('currencyLists.index'));
    }

    /**
     * Remove the specified CurrencyList from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->addError('Currency List not found');

            return redirect(route('currencyLists.index'));
        }

        $this->currencyListRepository->delete($id);

        toastr()->addSuccess('Currency List deleted successfully.');

        return redirect(route('currencyLists.index'));
    }
}
