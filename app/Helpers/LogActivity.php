<?php


namespace App\Helpers;

use App\Models\Log_user;
use Request;


class LogActivity
{

    public static function addToLog($subject)
    {
    	$log = [];
    	$log['log'] = $subject;
    	$log['ip'] = Request::ip();
    	$log['browser'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	Log_user::create($log);
    }

}