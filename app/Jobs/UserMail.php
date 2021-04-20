<?php

namespace App\Jobs;

use App\Mail\UserEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class UserMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $content;

    /**
     * UserMail constructor.
     * @param $user
     * @param $content
     */
    public function __construct($user, $content)
    {
        $this->user = $user;
        $this->content = $content;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::to($this->user)->send(new UserEmailMailable($this->content));



    }
}
