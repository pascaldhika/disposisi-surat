<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DisposisiMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $data;
    public $images;

    public function __construct($data, $images)
    {
        $this->data = $data;
        $this->images = $images;
    }

    public function build()
    {
        $mail = $this->subject('Disposisi Surat')->view('emails.disposisi')
                 ->with('data', $this->data);

        foreach ($this->images as $image) {
            if (file_exists($image)) {
                $mail->attach($image);
            }
        }

        return $mail;
    }

}