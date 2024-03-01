<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCurrencyListRequest;
use App\Http\Requests\UpdateCurrencyListRequest;
use App\Repositories\CurrencyListRepository;
use Illuminate\Http\Request;
use Response;

class CurrencyListController extends AppBaseController
{
    /** @var CurrencyListRepository */
    private $currencyListRepository;

    public function __construct(CurrencyListRepository $currencyListRepo)
    {
        $this->currencyListRepository = $currencyListRepo;
    }

    /**
     * Display a listing of the CurrencyList.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $currencyLists = $this->currencyListRepository->all();

        return view('admin.currency_lists.index')
            ->with('currencyLists', $currencyLists);
    }

    /**
     * Show the form for creating a new CurrencyList.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.currency_lists.create');
    }

    /**
     * Store a newly created CurrencyList in storage.
     *
     *
     * @return Response
     */
    public function store(CreateCurrencyListRequest $request)
    {
        $input = $request->all();

        $currencyList = $this->currencyListRepository->create($input);
        toastr()->timeOut(10000)->addSuccess('Currency List saved successfully.');

        return redirect(roleBasedRoute('currencyLists.index'));
    }

    /**
     * Display the specified CurrencyList.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->timeOut(10000)->addError('Currency List not found');

            return redirect(roleBasedRoute('currencyLists.index'));
        }

        return view('admin.currency_lists.show')->with('currencyList', $currencyList);
    }

    /**
     * Show the form for editing the specified CurrencyList.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->timeOut(10000)->addError('Currency List not found');

            return redirect(roleBasedRoute('currencyLists.index'));
        }

        return view('admin.currency_lists.edit')->with('currencyList', $currencyList);
    }

    /**
     * Update the specified CurrencyList in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateCurrencyListRequest $request)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->timeOut(10000)->addError('Currency List not found');

            return redirect(roleBasedRoute('currencyLists.index'));
        }

        $currencyList = $this->currencyListRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('Currency List updated successfully.');

        return redirect(roleBasedRoute('currencyLists.index'));
    }

    /**
     * Remove the specified CurrencyList from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $currencyList = $this->currencyListRepository->find($id);

        if (empty($currencyList)) {
            toastr()->timeOut(10000)->addError('Currency List not found');

            return redirect(roleBasedRoute('currencyLists.index'));
        }

        $this->currencyListRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('Currency List deleted successfully.');

        return redirect(roleBasedRoute('currencyLists.index'));
    }
}
