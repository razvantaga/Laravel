<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function build()
    {
        $info = $this->data;
        return $this->from('razvantaga97@gmail.com')->view('mail.invoice', compact('info'))->subject('Product Buy Successfully');
    }
}
