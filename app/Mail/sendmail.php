<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;
    public $detailespdf;
    public  $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($detailespdf,$mailData)
    {
        $this->detailespdf = $detailespdf;
        $this->mailData = $mailData;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return $this->subject('OpenEyes Funfacts')->view('mail')->attachData($this->detailespdf->output(),''.$this->mailData['full_name'].''.'-fun facts.pdf');
       
    }
    
}