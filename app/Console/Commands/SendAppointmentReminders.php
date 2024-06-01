<?php

namespace App\Console\Commands;

use App\Mail\SendEmailReminders;
use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moj-termin:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send appointment reminders to patients';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appointments = Appointment::query()
            ->whereBetween('appointment_date',
                [
                    now()->addDay()->format('Y-m-d 09:00:00'),
                    now()->addDay()->format('Y-m-d 16:00:00')]
            )
            ->with('patient')
            ->get();

        $this->line('Sending Emails ....');

        $bar = $this->output->createProgressBar($appointments->count());

        $bar->start();
        $appointments->each(function($appointment) use (&$bar) {
            Mail::queue(new SendEmailReminders($appointment));
            $bar->advance();
//            sleep(3);
        } );

        $bar->finish();
        $this->newLine(2);
    }
}
