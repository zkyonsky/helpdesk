<?php

namespace App\Http\Controllers;

use App\Models\Log_user;
use App\Models\User;
use Illuminate\Http\Request;

class LogUserController extends Controller
{
   /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:log_users.index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log_user::latest()->when(request()->q, function($logs) {
            $logs = $logs->where('log', 'like', '%'. request()->q . '%');
        })->paginate(10);

        $user = new User;

        return view('loguser.index', compact('logs', 'user'));
    }
}
