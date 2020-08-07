<?php

namespace App\Mail;

use App\Ville;
use App\Adresse;
use App\Commune;
use App\Commande;
use App\AchatProduit;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Tarif_livraisons;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCancelled extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $adresse;
    public $ville;
    public $commune;
  
    public $tarif;
    public $soustotal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id, $adresse_id,$ville_id, $commune_id,$sousT)
    {
       
        $this->order = Commande::find($order_id);
        $this->adresse = Adresse::find($adresse_id);
        $this->ville = Ville::find($ville_id);
        $this->commune = Commune::find($commune_id);
        $this->tarif=Tarif_livraisons::frais($commune_id);
        $this->soustotal=$sousT;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from("virtus225one@gmail.com", "Eblack")
                    ->subject('Commande annulée')
                    ->view('mail.ordercancelled', ['user' => auth()->user()]);
    }
}
