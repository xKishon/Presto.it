<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserRevisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make user revisor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user=User::where('email',$this->argument('email'))->first();
        if(!$user){
            $this->error('User not found');
            return;
        }
        $user->is_revisor=true;
        $user->save();
        $this->info("The user {$user->name} is now a Revisor");
    }
}
