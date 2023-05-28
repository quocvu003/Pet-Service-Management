<?php

namespace App\Jobs;

use App\Mail\Duyet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Duyet_LichDat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $lichdatdv;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param mixed $lichdatdv
     * @return void
     */
    public function __construct($email, $lichdatdv)
    {
        $this->email = $email;
        $this->lichdatdv = $lichdatdv;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new Duyet($this->lichdatdv));
    }
}
