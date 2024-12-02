<!-- resources/views/emails/order_confirmation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>
    <h1>Thank you for your order!</h1>
    <p>We’ve received your order and will process it soon. Here are your order details:</p>

    <h2>Shipping Address:</h2>
    <p>{{ $orderData['addressLine'] }}<br>
       {{ $orderData['city'] }}<br>
       {{ $orderData['zip'] }}<br>
       {{ $orderData['country'] }}
    </p>

    <h2>Order Summary:</h2>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderData['products'] as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>
                        {{$product['totalPrice']}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>If you have any questions, feel free to contact us!</p>
</body>
</html>


