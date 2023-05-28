<?php

namespace App\Mail;

use App\Models\DichVuDat;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class D_Shop extends Mailable
{
    use Queueable, SerializesModels;

    protected $acc;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $acc)
    {
        $this->acc = $acc;
    }
    public function build()
    {
        return $this->view('Mail.duyet_shop')->with(['acc' => $this->acc])
            ->subject('THÔNG BÁO TỪ PETCARE');
    }
}
