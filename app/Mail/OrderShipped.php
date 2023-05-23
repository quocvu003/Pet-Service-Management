<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $ten;

    public function __construct($ten)
    {
        $this->ten = $ten;
    }
    public function build()
    {
        return $this->view('Mail.duyet', compact('ten'))
            ->subject('THÔNG BÁO TỪ PETCARE');
    }
}
