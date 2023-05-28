<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Tc_Shop extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Tạo một instance của class message.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('Mail.tuchoi_shop')->with(['user' => $this->user])
            ->subject('THÔNG BÁO TỪ PETCARE');
    }
}
