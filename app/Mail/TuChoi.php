<?php

namespace App\Mail;

use App\Models\DichVuDat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TuChoi extends Mailable
{
    use Queueable, SerializesModels;

    protected $lichdatdv;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DichVuDat $lichdatdv)
    {
        $this->lichdatdv = $lichdatdv;
    }
    public function build()
    {
        return $this->view('Mail.tuchoi_lichdat')->with(['lichdatdv' => $this->lichdatdv])
            ->subject('THÔNG BÁO TỪ PETCARE');
    }
}
