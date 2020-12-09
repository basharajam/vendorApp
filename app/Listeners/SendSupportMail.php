<?php

namespace App\Listeners;

use App\Events\SupportStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SupportMail;
use Illuminate\Mail\Mailable;

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
        Mail::to("sales@alyaman.com")->send(new SupportMail($event->support));
    }
}