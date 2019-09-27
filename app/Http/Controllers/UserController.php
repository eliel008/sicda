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
        $users = User::latest()->paginate(5); /** ordenBy('id', 'ASC');*/
        return view('users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }                            /** with('$users')*/

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
        $users = new User;
 
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
 
        $users->save();
 
        return redirect()->route('users.index');

    }

       /* return redirect()->route('users');

*---

$users->save();
 
        return redirect()->route('users.index');
        
        $user = new User($request=>all());
        $user => password = $request=>password;
        $user => save();

        *---
  
        User::create($request->all());
   
        return redirect()->route('users.index')->with('success','El usuario se creo satisfactoriamente.');
        
         $users = new User();
 
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
 
        $users->save();
 
        return redirect()->route('users.index');*/
    

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show(User $user)
    {
        dd($id); //*return view('users.show',compact('users')); *
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        $user = User::find($id);
        return view('users.edit')->with('users', $user);
    }

    /**
     * Update the specified resource in storage.
     * Nombre Aplicacion  $users en param
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user ->name = $request->name;
        $user ->name = $request->email;
        $user ->save();

        Flash::warning('El usuario ' . $user->name . ' ha sido actualizado satisfactoriamente');
  
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error('El usuario ' . $user->name . 'ha sido eliminado de forma exitosa');

        return redirect()->route('users.index');
    }
}
