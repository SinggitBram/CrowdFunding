<?php

namespace App\Listeners;

use App\Events\RegisterOtpEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\RegisterOtpMail;

class SendEmailOtp implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterOtpEvent  $event
     * @return void
     */
    public function handle(RegisterOtpEvent $event)
    {
        Mail::to($event->user)->send(new RegisterOtpMail($event->user));
        
    }
}
