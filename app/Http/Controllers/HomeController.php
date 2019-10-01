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
        //$role = Role::create(['name'=>'admin']);
        //$role = Role::create(['name'=>'coordinador']);
        //$role = Role::create(['name'=>'usuario']);
        //$permission = Permission::create(['name'=> 'edit users']);
        //$permission = Permission::create(['name'=> 'create users']);
        //$permission = Permission::create(['name'=> 'delete users']);
        //auth()->user()->givePermissionTo('edit users');
        //auth()->user()->assignRole('admin');
    
        return view('home');
    }
}
