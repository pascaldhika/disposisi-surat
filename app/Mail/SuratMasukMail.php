<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuratMasukMail extends Mailable
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
        $mail = $this->subject('Surat Masuk')->view('emails.surat-masuk')
                 ->with('data', $this->data);

        foreach ($this->images as $image) {
            $path = storage_path(
                'app/public/attachments/' . $image
            );

            if (file_exists($path)) {
                $mail->attach($path);
            } else {
                \Log::warning('Attachment tidak ditemukan: ' . $path);
            }
        }

        return $mail;
    }

}