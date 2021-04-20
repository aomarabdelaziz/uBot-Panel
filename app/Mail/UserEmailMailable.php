<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    private string $content;

    /**
     * UserEmailMailable constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('uBot-Service')->view('email' , ['content' => $this->content]);
    }
}
