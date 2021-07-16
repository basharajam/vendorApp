<?php

namespace App\Listeners;

use App\Events\SupportStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SupportMail;
use Illuminate\Mail\Mailable;
use Mail;

class SendSupportMail
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
     * @param  SupportStored  $event
     * @return void
     */
    public function handle(SupportStored $event)
    {
        Mail::to("vendor@alyaman.com")->send(new SupportMail($event->support));
    }
}
