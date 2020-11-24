<?php

namespace App\Listeners;

use App\Events\SupplierRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomSupplierMail;

class SendWelcomeMail
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
     * @param  SupplierRegistered  $event
     * @return void
     */
    public function handle(SupplierRegistered $event)
    {
        Mail::to($event->supplier->email)->send(new WelcomSupplierMail($event->supplier));
    }
}
