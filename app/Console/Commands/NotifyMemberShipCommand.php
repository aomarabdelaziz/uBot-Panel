<?php

namespace App\Console\Commands;

use App\Notifications\UserNotifications;
use App\Services\LicenseNotifyService;
use App\User;
use App\UserProject;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use \Illuminate\Support\Carbon;
class NotifyMemberShipCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::with(['projects' => function($query)
        {
            return $query->whereBetween('end_license' , [Carbon::now() , Carbon::now()->addDays(7)])
                ->orWhere('end_license'  , '<=' , date('y-m-d'));

        }])->where('role','premium')->get();




       // Notification::send($users , new NotifyUser('success' , 'your membership will end'));

        (new LicenseNotifyService($users))->handle();


    }
}
