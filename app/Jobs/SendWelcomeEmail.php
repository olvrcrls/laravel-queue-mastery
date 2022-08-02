<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 10;
    public $maxExceptions = 2; // Maximum exceptions allowed.
    // public $tries = -1; // Unlimited try
    // public $backoff = 2; // Grace period between trying (in seconds)
    // public $backoff = [1, 10]; // This will wait for a second before attempting the 2nd attempt then 10 seconds for the 3rd attempt.

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(1);
        throw new \Exception("Error");
        info("Hello World");
        return $this->release(2);
    }

    // public function retryUntil() {
    //     return now()->addMinute();
    // }
}
