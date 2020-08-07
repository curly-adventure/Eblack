<?php

namespace App\Mail;

use App\Ville;
use App\Adresse;
use App\Commune;
use App\Commande;
use App\AchatProduit;
use App\Models\Clients;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Tarif_livraisons;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderEtatChange extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $client;
    public $idstatus;
    public $adresse;
    public $ville;
    public $commune;
    public $articles;
    public $tarif;
    public $soustotal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($idstatus,$order_id, $adresse_id,$ville_id, $commune_id,$sousT)
    {
       
        $this->order = Commande::find($order_id);
        $this->idstatus=$idstatus;
        $this->adresse = Adresse::find($adresse_id);
        $this->ville = Ville::find($ville_id);
        $this->client =Clients::find($this->order->client->id);
        $this->commune = Commune::find($commune_id);
        $this->tarif=Tarif_livraisons::frais($commune_id);
        $this->soustotal=$sousT;
        //$this->$articles = AchatProduit::all()->where('achat_id', $this.$order);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->idstatus) {
            case 2:
                return $this ->subject('Commande en traitement')
                     ->view('mail.traitement', ['user' => $this->client]);
                break;
            case 3:
                    return $this->from("virtus225one@gmail.com", "Eblack")
                        ->subject('Commande Livrer')
                        ->view('mail.livrer', ['user' => $this->client]);
            case 4:
                return $this->from("virtus225one@gmail.com", "Eblack")
                    ->subject('Commande annulée')
                    ->view('mail.ordercancelled', ['user' => $this->client]);
            default:
                break;
        }
        
    }
}
