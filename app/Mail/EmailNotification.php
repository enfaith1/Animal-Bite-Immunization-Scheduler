<?php

namespace App\Mail;

use App\Models\VaxSchedule;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public String $dose_number;

    public function __construct(String $dose_number)
    {
        $this->dose_number = $dose_number;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('reception@animalbiteclinic.com', 'Animal Bite Clinic Receptionist'),
            subject: 'Antirabies Schedule Reminder'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $today = Carbon::now()->toDateString();
        return new Content(
            view: 'mails.emailNotification',
            with:[
                'dose_number' => $this->dose_number,
                'today' =>  date('F d, Y', strtotime($today))
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
