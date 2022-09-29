<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationNote extends Mailable
{
    use Queueable, SerializesModels;
    public $dataNote;
    public $userPublic;
    public $dataGrupo;
    public $dataImage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($note, $user, $grupo, $image)
    {
        //
        $this->dataNote = $note;
        $this->userPublic = $user;
        $this->dataGrupo = $grupo;
        $this->dataImage = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.notificationEmail');
    }
}
