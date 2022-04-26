<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class ThreeDaysUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'threedays:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user=User::all();
        foreach ($user as $all){
         Mail::raw('Hello You have a follow Up remainder !!',function ($message) use ($all) {
             $message->from('rakibtech9@gmail.com');
             $message->to($all->email)->subject('ItMedicus Welcome');
         });
            
        }
    }
}
