<?php

namespace App\Mail;

use Informagenie\OrangeSDK;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Demande extends Mailable
{
    use Queueable, SerializesModels;
    public $nom;
    public $tel;
    public $detail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$tel,$detail)
    {
        $this->nom =$nom;
        $this->tel = $tel;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $credential = array(
            'client_id' => 'eOAXzDCXpmhe5lxfgLp29PIp4XhnobUw',
            'client_secret' => 'BACwJnW8kyDsWNDn'
        );
        
        $sms = new OrangeSDK($credential);
        $text="le client ".$this->nom." recherche un produi en particulier\nnumero : ".$this->tel."\ndetail: \n".$this->detail;
        try {
            $response = $sms->message($text)
            ->from(22588364403)
            ->as('Eblack')
            ->to(22588364403)
            ->send();
        } catch (\Throwable $th) {
            
        }

        return $this ->subject('Recherche de produit')
                     ->view('mail.demande');
    
    }
}
