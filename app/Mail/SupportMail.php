<?php

namespace App\Mail;

use App\Models\SupportRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $support;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SupportRequest $support)
    {
        $this->support = $support;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Support Request | Alyaman Vendors System')
        ->markdown('emails.support')
        ->with('support',$this->support);

    }
}
