<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #000987;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            margin: 0;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h2 {
            color: #000987;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table thead th {
            background-color: #000987;
            color: white;
            padding: 10px;
            text-align: left;
        }
        table tbody th, table tbody td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        table tbody th {
            text-align: left;
        }
        table tbody td {
            text-align: right;
        }
        .summary-row th {
            text-align: right;
        }
        .email-footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }
        .email-footer a {
            color: #000987;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Thanks for your order!</h1>
        </div>
        <div class="email-body">
            <h2>Your Order ID: #{{ $mailData['order']->id }}</h2>
            <h2>Shipping Adresse</h2>
                <strong>
                    {{$mailData['order']->address}},
                    <br />{{$mailData['order']->apartment}},
                    <br />{{$mailData['order']->city}} {{$mailData['order']->zip}},
                    <br />{{$mailData['order']->state}}.
                </strong>
            <h2>Order Summary</h2>
            <table>
                <thead>
                    <tr class="text-center">
                        <th>Product</th>
                        <th width="100">Price</th>
                        <th width="100">Qty</th>
                        <th width="100">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mailData['order']->items as $item)
                        <tr>
                            <th>{{ $item->name }}</th>
                            <td>{{ number_format($item->price, 0) }} MAD</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ number_format($item->total, 0) }} MAD</td>
                        </tr>
                    @endforeach
                    <tr class="summary-row">
                        <th colspan="3">Subtotal:</th>
                        <td>{{ number_format($mailData['order']->subtotal, 0) }} MAD</td>
                    </tr>
                    <tr class="summary-row">
                        <th colspan="3">Discount:</th>
                        <td>- {{ number_format($mailData['order']->discount, 0) }} MAD</td>
                    </tr>
                    <tr class="summary-row">
                        <th colspan="3">Shipping:</th>
                        <td>{{ number_format($mailData['order']->shipping, 0) }} MAD</td>
                    </tr>
                    <tr class="summary-row">
                        <th colspan="3"><strong>Grand Total:</strong></th>
                        <td><strong>{{ number_format($mailData['order']->grand_total, 0) }} MAD</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="email-footer">
            <p>If you have any questions, feel free to <a href="mailto:nextGen@example.com">contact us</a>.</p>
            <p>&copy; 2024 nextGen. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
