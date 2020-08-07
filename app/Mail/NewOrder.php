<?php

namespace App\Mail;

use App\Commande;
use Twilio\Rest\Client;
use App\Sms\NewOrderSms;
use Informagenie\OrangeSDK;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $account_sid;
    public $auth_token;
    public $twilio_number;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order = Commande::find($order_id);
        // Your Account SID and Auth Token from twilio.com/console
        $this->account_sid = 'ACadb67aed017d7ae119527b1212bc18d9';
        $this->auth_token = '23767bdc9b7d52c829daa02f5219ef06';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        $this->twilio_number = "+12512921365";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       /* $client = new Client($this->account_sid, $this->auth_token);
        $text="Nouvelle commande du client ".auth()->user()->nom."\n commande n°".$this->order->num_achat;
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            '+22564309435',
            array(
                'from' => $this->twilio_number,
                'body' => $text
            )
        );*/
        $credential = array(
            'client_id' => 'eOAXzDCXpmhe5lxfgLp29PIp4XhnobUw',
            'client_secret' => 'BACwJnW8kyDsWNDn'
        );
        
        $sms = new OrangeSDK($credential);
        $text="Nouvelle commande du client ".auth()->user()->nom."\ncommande n°".$this->order->num_achat."\nmontant :".$this->order->montant." Fcfa";
        try {
            $response = $sms->message($text)
            ->from(22588364403)
            ->as('Eblack')
            ->to(22588364403)
            ->send();
        } catch (\Throwable $th) {
            
        }

        return $this ->subject('Nouvelle commande')
                     ->view('mail.neworder', ['user' => auth()->user()]);
    }
}
