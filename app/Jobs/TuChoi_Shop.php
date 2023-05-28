<?php

namespace App\Jobs;

use App\Mail\Tc_Shop;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TuChoi_Shop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param User $user
     * @return void
     */
    public function __construct($email, User $user)
    {
        $this->email = $email;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new Tc_Shop($this->user));
    }
}
