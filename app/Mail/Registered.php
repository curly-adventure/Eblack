<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Shop;

class Registered extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*return $this->from($this->shop->email, $this->shop->name)
                    ->subject('Bienvenue !')
                    ->view('mail.registered', ['user' => auth()->user()]);*/
        return $this->subject('Bienvenu sur Eblack !')
                    ->view('mail.registered', ['user' => auth()->user()]);       
    }
}