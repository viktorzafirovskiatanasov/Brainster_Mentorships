<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SayHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:say-hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to say hello.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->error('Hey from my app moj-termin');
    }
}
