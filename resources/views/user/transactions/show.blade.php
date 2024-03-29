@extends('layouts.app')

@section('content')
    <div>
        @php
            use App\Constants\TransactionTypes;

            $type = TransactionTypes::from($transaction->type);
        @endphp

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <x-bread-crumb title="Transaction" :url = "route('user.transactions.index')"/>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="mt-4 mt-xl-3">
                                            <h4>Trasaction status: <span
                                                    class="btn btn-sm btn-danger text-uppercase">{{ $transaction->status }}</span>
                                            </h4>
                                            <h5 class="mb-4">Amount : <b>{{ formatMoney($transaction->amount) }}</b>

                                            </h5>
                                            <h6>Payment Reason:</h6>
                                            <p class="text-muted mb-4">{{ $transaction?->reason }}</p>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div>
                                                        <p class="text-muted"><i
                                                                class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Trasaction
                                                            Type: <span>
                                                                {!! $type->labels() !!}
                                                            </span></p>
                                                        <p class="text-muted"><i
                                                                class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>Transaction
                                                            Date: <span
                                                                class="btn btn-primary btn-sm">{{ $transaction->created_at }}</span>
                                                        </p>
                                                        <p class="text-muted"><i
                                                                class="bx bx-money font-size-16 align-middle text-primary me-1"></i>Payment
                                                            Type: {{ $transaction->payment_channel?->name }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ route('download.transaction', $transaction->ref) }}"
                                                class="btn btn-outline-secondary btn-sm"><i
                                                    class="fas fa-download"></i> Download Reciept</a>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="mt-5">
                                    <h5 class="mb-3">User Details :</h5>

                                    <div class="table-responsive">
                                        <table class="table mb-0 table-bordered">
                                            <tbody>
                                                @if ($transaction->appointment)
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
