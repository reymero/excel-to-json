<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExcelDataMail extends Mailable
{
    use Queueable, SerializesModels;

    public $excelData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $excelData)
    {
        $this->excelData = $excelData; // <-- set the data
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Excel Data Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Excel Data Mail')
            ->html('<pre>' . htmlentities(json_encode($this->excelData, JSON_PRETTY_PRINT)) . '</pre>');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
