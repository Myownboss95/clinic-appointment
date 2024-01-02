<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>
    <style>
        /* Reset base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }

        /* Receipt header */
        .receipt-header {
            background-color: #f5f5f5;
            padding: 20px 0;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .receipt-header h1 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 0;
        }

        /* User details */
        .user-details {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .user-details__info {
            flex: 1;
        }

        .user-details__info p {
            margin-bottom: 5px;
        }

        /* Transaction details */
        .transaction-details {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding: 20px;
        }

        .transaction-details__label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .transaction-details__value {
            color: #666;
        }

        /* Items table */
        .items-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .items-table th,
        .items-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .items-table th {
            text-align: left;
        }

        .items-table td.price {
            text-align: right;
        }

        /* Total */
        .total {
            font-weight: bold;
            margin-top: 20px;
        }

        /* Payment information */
        .payment-information {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding: 10px;
        }

        .payment-information__label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Footer */
        .receipt-footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body style="padding:30px">
    <div class="receipt-header">
        <h1>Transaction Receipt - {{config('app.name')}}</h1>
    </div>

    <div class="user-details">
        <div class="user-details__info">
            <p><strong>User:</strong> {{ $user->first_name .' '. $user->last_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <div class="user-details__info">
            <p><strong>Transaction Ref:</strong> {{ $transaction->ref }}</p>
            <p><strong>Date:</strong> {{ formatDateTime($transaction->created_at) }}</p>
        </div>
    </div>

    <div class="transaction-details">
        <p class="transaction-details__label">Payment Method:</p>
        <p class="transaction-details__value">{{ $transaction->paymentChannel->name }}</p>
        <p class="transaction-details__label">Bank:</p>
        <p class="transaction-details__value">{{ $transaction->paymentChannel->bank_name }}</p>
    </div>

    <table class="items-table">
                ... remaining code ...

        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $transaction->appointment?->first()?->subService?->first()?->name ?? ''}}</td>
                    <td class="price">N{!! number_format($transaction->amount, 2) !!}</td>
                </tr>
        </tbody>
    </table>

    <p class="total">Total: N{!! number_format($transaction->amount, 2) !!}</p>

    <div class="payment-information">
        <p class="payment-information__label">Transaction Reference:</p>
        <p class="payment-information__value">{{ $transaction->ref }}</p>
    </div>

    <div class="receipt-footer">
        <p>Thank you for your business!</p>
    </div>

</body>
</html>

                
