<?php

namespace App\Providers;

use App\Models\Log_user;
use App\Providers\LogActivity;
use Illuminate\Support\Facades\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class addToLog
{
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LogActivity  $event
     * @return void
     */
    public function handle(LogActivity $event)
    {
        $userinfo = $event->user;
        $subjectInfo = $event->subject;
        
        $saveHistory = Log_user::create([
            'log' => $subjectInfo, 
            'ip' => Request::ip(), 
            'browser' => Request::header('user-agent'), 
            'user_id' => $userinfo->id
        ]);

        return $saveHistory;
    }
}
