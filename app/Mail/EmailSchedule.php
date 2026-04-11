<?php

namespace App\Mail;

use App\Models\VaxRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailSchedule extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public VaxRecord $vaxRecord;

    public function __construct(VaxRecord $vaxRecord)
    {
        $this->vaxRecord = $vaxRecord;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('reception@animalbiteclinic.com', 'Animal Bite Clinic Receptionist'),
            subject: 'Your Anti-rabies Vaccination Schedule',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $patientName = $this->vaxRecord->patient->fname;
        $scheduledDays = $this->vaxRecord->vaxSchedules
            ->map(fn($schedule) => date('F d, Y', strtotime($schedule->scheduled_date)))
            ->toArray();

        return new Content(
            view: 'mails.emailSchedule',
            with: [
                'patientName' => $patientName,
                'scheduledDays' => $scheduledDays
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
