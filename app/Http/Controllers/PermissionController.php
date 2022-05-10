<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions.index', ['only' => ['index']]);
    }
    /**
    * function index
    *
    * @return void
    */
    public function index()
    {
        $permissions = Permission::latest()->when(request()->q,
        function($permissions) {
        $permissions = $permissions->where('name', 'like', '%'. request()->q
        . '%');
    })->paginate(5);
        return view('permissions.index', compact('permissions'));
    }
}
