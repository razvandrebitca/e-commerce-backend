<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
     /**
     * Handle the order data and send an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendOrderEmail(Request $request)
    {
        $orderData = $request->validate([
            'addressLine' => 'required|string',
            'city' => 'required|string',
            'country' => 'string',
            'email' => 'string',
            'products'=>'array',
            'zip' => 'string',
        ]);

        // Send the email to the customer or admin
        Mail::to($orderData['email'])->send(new OrderConfirmation($orderData));

        return response()->json(['message' => 'Order email sent successfully!'], 200);
    }
}
