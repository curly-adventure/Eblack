<?php

namespace App\Mail;

use App\Models\Produit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProduitAlert extends Mailable
{
    use Queueable, SerializesModels;
    public $produit;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produit)
    {
        $this->produit =Produit::findOrFail($produit);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("virtus225one@gmail.com", "Eblack")
        ->subject('Alerte produit')
        ->view('mail.produitalert');
    }
}
