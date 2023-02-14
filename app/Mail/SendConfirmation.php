<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

    class SendConfirmation extends Mailable
    {
        use Queueable, SerializesModels;

        public $reservation;

        /**
        * Create a new message instance.
        *
        * @return void
        */
        public function __construct($reservation)
        {
            $this->reservation = $reservation;
        }

        /**
        * Build the message.
        *
        * @return $this
        */
        public function build()
        {
            return $this->from('padelreserve@padelenergy.es')
            ->subject('Confirmación de reserva de pista de pádel')
            ->view('emails.confirmationreserve')
            ->with([
            'reservation' => $this->reservation,
            ]);

        }
    }
