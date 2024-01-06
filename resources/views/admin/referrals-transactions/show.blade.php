@extends('layouts.app')

@section('content')
    <div>
        @php
            use App\Constants\TransactionTypes;
            use App\Constants\TransactionStatusTypes;

            $type = TransactionTypes::from($transaction->type);
            $status = TransactionStatusTypes::from($transaction->status);
        @endphp

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <x-bread-crumb title="Transaction" />
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="p-1">
                                                        @livewire('confirm-referral-transaction-status-selector', ['transactionId' => $transaction->ref])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mt-4 mt-xl-3">
                                            <h4>Trasaction status: {!! $status->labels() !!}
                                            </h4>
                                            <h5 class="mb-4">Amount : <b>{{ formatMoney($transaction->amount) }}</b>
                                            </h5>


                                            @if ($transaction->appointment->count()>0)
                                                <h5> <a href="{{ roleBasedRoute('appointments.show', $transaction->appointment?->first()?->id) }}"
                                                        class="btn btn-outline-info btn-sm">
                                                        View Appointment Paid For
                                                        <i class="fas fa-eye"></i> </a></h5>
                                            @endif


                                            <a href="{{ route('download.transaction', $transaction->ref) }}"
                                                class="btn btn-outline-secondary btn-sm"><i class="fas fa-download"></i>
                                                Download Receipt</a>

                                        </div>
                                    </div>
                                    <div class="col-xl 6">
                                        <div class="mt-4 mt-xl-3">

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="mt-5">
                                    <h5 class="mb-3">Details :</h5>

                                    <div class="table-responsive">
                                        <table class="table mb-0 table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 400px;">User </th>
                                                    <td>
                                                        <a href="{{ roleBasedRoute('users.show', $transaction->user?->id) }}"
                                                            class="btn btn-outline-link btn-md">
                                                            {{ $transaction->user?->last_name }}
                                                            {{ $transaction->user?->first_name }}
                                                              <i
                                                                class="fas fa-eye"></i>
                                                    </td>
                                                    </a>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 400px;">Confirmed By </th>
                                                    <td>
                                                        {{ $transaction->confirmedBy?->first_name . ' '. $transaction->confirmedBy?->last_name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>{{ $transaction->user?->email }}</td>
                                                </tr>
                                                @if ($transaction->appointment->count()>0)
                                                    <tr>
                                                        <th scope="row"><i
                                                            class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Service Paid</th>
                                                        <td>{{ upperCase($transaction->appointment?->first()?->subService?->first()?->name) }}
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th scope="row"><i
                                                            class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Trasaction
                                                        Type</th>
                                                    <td>{!! $type->labels() !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i
                                                            class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>Transaction
                                                        Date: </th>
                                                    <td>
                                                        <p class="text-muted"><span>{{ $transaction->created_at }}</span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i
                                                            class="bx bx-gear font-size-16 align-middle text-primary me-1"></i>Payment
                                                        Channel: </th>
                                                    <td>
                                                        <p class="text-muted">
                                                            <span>{{ $transaction->paymentChannel?->name }}</span>
                                                        </p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end Specifications -->


                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->


                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection
