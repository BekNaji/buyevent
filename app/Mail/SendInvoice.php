<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $totalPrice;
    public $customer;
    public $orders;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($totalPrice,$customer,$orders)
    {
        $this->totalPrice = $totalPrice;
        $this->customer = $customer;
        $this->orders = $orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Inoice Demo')->view('emails.invoice');
    }
}
