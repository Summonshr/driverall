<?php

namespace App\Listeners;

use App\Models\OTP;

class OTPRetrieved
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(public OTP $otp)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->otp->delete();
    }
}
