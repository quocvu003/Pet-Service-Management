<?php

namespace App\Jobs;

use App\Mail\Duyet;
use App\Mail\TuChoi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TuChoi_LichDat implements ShouldQueue
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
        Mail::to($this->email)->send(new TuChoi($this->lichdatdv));
    }
}
