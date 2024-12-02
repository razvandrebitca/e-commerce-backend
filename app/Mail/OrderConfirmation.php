<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use SerializesModels;

    public $orderData;

    /**
     * Create a new message instance.
     *
     * @param array $orderData
     * @return void
     */
    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_confirmation')
                    ->subject('Order Confirmation')
                    ->with([
                        'order' => $this->orderData
                    ]);
    }
}
