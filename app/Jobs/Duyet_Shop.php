<?php

namespace App\Jobs;

use App\Mail\D_Shop;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Duyet_Shop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $acc;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param mixed $acc
     * @return void
     */
    public function __construct($email, $acc)
    {
        $this->email = $email;
        $this->acc = $acc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new D_Shop($this->acc));
    }
}
