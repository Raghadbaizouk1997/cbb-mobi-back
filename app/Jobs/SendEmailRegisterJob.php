<?php
namespace App\Jobs;

use App\Mail\RegisterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailRegisterJob implements ShouldQueue
{
use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
public $details;
/**
* Create a new job instance.
*
* @return void
*/
public $dynamicData;
public function __construct($dynamicData , $details)
{
    $this->dynamicData = $dynamicData;
    $this->details = $details ;
}
/**
* Execute the job.
*
* @return void
*/
public function handle()
{
// $email = new RegisterMail($data);
// Mail::to($this->details['email'])->send($email);
// $email = new RegisterMail($this->dynamicData);
// Mail::to($this->details['email'])->send($email);

try {
    // ... your existing code ...

    Log::info('Email sending started');

    Mail::to($this->details['email'])->send(new RegisterMail($this->dynamicData));

    Log::info('Email sending successful');
} catch (\Exception $e) {
    Log::error($e->getMessage());
}

}
}