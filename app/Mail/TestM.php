<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestM extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

   
    public function __construct($details)
    {
        $this->details = $details;
    }

 
    public function build()
    {
        return $this->subject("Mot de passe de réinitialisation La Colombe")->view('view_users');
    }
}
