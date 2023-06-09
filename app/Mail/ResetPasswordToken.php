<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ResetPasswordToken extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password Akun Aplikasi Stok Barang')
            ->view('emails.reset-password-token')
            ->with([
                'user' => $this->user,
                'token' => $this->token,
                'url' => url('/').'/reset-password'
            ]);
    }
}
