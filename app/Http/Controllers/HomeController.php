<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Role::create (['guard_name' => 'roleadmin','name' => 'roleadmin']);
        //Role::create (['guard_name' => 'admin','name' => 'admin']);
        //Role::create (['guard_name' => 'teacher','name' => 'teacher']);
        //Role::create (['guard_name' => 'parent','name' => 'parent']);

        //$permission = Permission::create(['guard_name' => 'roleadmin','name' => 'setrole']);
        

        return view('home');
    }
}
