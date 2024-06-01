<?php

namespace App\Listeners;

use App\Events\NotifyAppointmentUser;
use App\Mail\SendEmailReminders;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentApproval implements ShouldQueue
{

    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NotifyAppointmentUser $event): void
    {
        Mail::send(new SendEmailReminders($event->appointment));
    }
}
