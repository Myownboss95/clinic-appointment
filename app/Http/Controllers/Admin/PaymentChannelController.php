<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentChannelRequest;
use App\Models\PaymentChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.payment_channel.index',
            [
                'paymentChannels' => PaymentChannel::latest()->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment_channel.create', [
            'paymentChannel' => new PaymentChannel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentChannelRequest $request)
    {
        PaymentChannel::create($request->validated());
        toastr()->addSuccess('Payment Channel Created successfully.');

        return redirect(roleBasedRoute('paymentChannels.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentChannel $paymentChannel)
    {
        return view('admin.payment_channel.show')->with('paymentChannel', $paymentChannel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentChannel $paymentChannel)
    {
        return view('admin.payment_channel.edit', [
            'paymentChannel' => $paymentChannel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentChannelRequest $request, PaymentChannel $paymentChannel)
    {
        $paymentChannel->update($request->validated());
        toastr()->addSuccess('Payment Channel updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, PaymentChannel $paymentChannel)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'current_password'],
        ]);

        if ($validator->fails()) {
            toastr()->addError('Incorrect Password');

            return redirect()->back();
        }

        $paymentChannel->delete();
        toastr()->addSuccess('Payment Channel deleted successfully.');

        return redirect(roleBasedRoute('paymentChannels.index'));
    }
}
