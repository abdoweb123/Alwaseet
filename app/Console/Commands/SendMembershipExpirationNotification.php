<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Functions\WhatsApp;

class SendMembershipExpirationNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:send-membership-expiration-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send whatsap message when the user end mempership expiered';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users=User::where('end_memebership',"<=",Carbon::now()->toDateString())->get();
        foreach($users as $user){
            WhatsApp::SendWhatsApp($user->phone,"your membership expierd please contact use to  renew it");
        }
    }
}
