<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ve;
    public $seatCodes;
    public $chuyenxe;
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($ve, $seatCodes, $chuyenxe)
    {
        $this->ve = $ve;
        $this->seatCodes = $seatCodes;
        $this->chuyenxe = $chuyenxe;
        $this->subject = $chuyenxe->startLocation . ' → ' . $chuyenxe->endLocation; // Set the subject dynamically
    }

    public function build()
    {
        return $this->view('emails.ticket_confirmation')
            ->subject($this->subject) // Set the subject for the email
            ->with([
                've' => $this->ve,
                'seatCodes' => $this->seatCodes,
                'chuyenxe' => $this->chuyenxe,
                'subject' => $this->subject, // Pass the subject to the view
            ]);
    }
}


