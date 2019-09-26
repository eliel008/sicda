<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required',
        ]);
  
        User::create($request->all());
   
        return redirect()->route('users.index')->with('success','El usuario se creo satisfactoriamente.');
        
        /* $users = new User();
 
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
 
        $users->save();
 
        return redirect()->route('users.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * Nombre Aplicacion  $users en param
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('users.index')->with('success','Usuario actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('users.index')->with('success','Usuario eliminado satisfactoriamente');
    }
}
