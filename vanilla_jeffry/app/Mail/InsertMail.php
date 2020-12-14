<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InsertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $seller, $buyer, $properti, $tgl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller, $buyer, $properti, $tgl)
    {
        $this->seller = $seller;
        $this->buyer = $buyer;
        $this->properti = $properti;
        $this->tgl = $tgl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from("proyekFPW@gmail.com")
                    ->subject("TES EMAIL")
                    ->view("mail.insert_mail");
    }
}
