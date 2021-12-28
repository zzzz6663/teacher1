<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class ForgetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $subject='  تیچر وان ';
    public function __construct($user)
    {
          $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usere=$this->user;
        $password=Crypt::decryptString($usere->password);
        return $this->view('home.section.forget_password',compact('password'))->subject('    بازیابی رمز عبور');
    }
}
