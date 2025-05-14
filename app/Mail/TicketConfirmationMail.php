<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
        // Tạo nội dung PDF từ view
        $pdf = Pdf::loadView('pdf.ticket', [
            've' => $this->ve,
            'seatCodes' => $this->seatCodes,
            'chuyenxe' => $this->chuyenxe
        ]);

        // Tên file PDF
        $filename = 've_xe_' . time() . '.pdf';

        return $this->view('emails.ticket_confirmation_minimal') // email ngắn gọn
        ->subject($this->subject)
            ->with([
                've' => $this->ve,
                'chuyenxe' => $this->chuyenxe,
                'seatCodes' => $this->seatCodes,
            ])
            ->attachData($pdf->output(), $filename, [
                'mime' => 'application/pdf',
            ]);
    }
}


