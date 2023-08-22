<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RegisterMailUser extends Mailable
{
    use Queueable, SerializesModels;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public $dynamicData;
    public function __construct($data)
    {
        $this->dynamicData = $data;

    }
    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        Log::info('Building email content');
    
        $dynamicData = $this->dynamicData ;
        return $this->subject('Welcome to YourApp')
            ->view('emails.loginUser',compact('dynamicData'));
            // ->with('dynamicData', $this->dynamicData);   
         }
    }


