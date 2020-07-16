<?php

use App\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderSms
{
    use Queueable, SerializesModels;
    public $order;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order = Commande::find($order_id);
        
    }

    public function build()
    {
        
        
    }
}

//require __DIR__ . './vendor/autoload.php';
