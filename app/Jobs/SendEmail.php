<?php

namespace App\Jobs;

use App\Mail\NotificationNote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailUser;
    public $dataNote;
    public $userPublic;
    public $dataGrupo;
    public $dataImage;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailUser, $note, $user, $grupo ,$image)
    {
        //
        $this->emailUser = $emailUser;
        $this->dataNote = $note;
        $this->userPublic = $user;
        $this->dataGrupo = $grupo;
        $this->dataImage = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new NotificationNote($this->dataNote, $this->userPublic, $this->dataGrupo, $this->dataImage);
        Mail::to($this->userPublic->email)->cc($this->emailUser)->send($email);
    }
}
